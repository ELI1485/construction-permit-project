"""
OCR Service - Text extraction and document analysis using Tesseract.
Detects Moroccan administrative document indicators.
"""

import re
from typing import List, Optional
from schemas.ocr_schema import OCRAnalysis

# Moroccan administrative document indicators
MOROCCAN_INDICATORS = {
    "cin": [
        r"royaume du maroc",
        r"المملكة المغربية",
        r"carte.*nationale",
        r"بطاقة.*وطنية",
        r"carte d'identité",
        r"\b[A-Z]{1,2}\d{5,7}\b",  # CIN format
    ],
    "land_title": [
        r"titre foncier",
        r"conservation foncière",
        r"المحافظة العقارية",
        r"عقاري",
        r"immatriculation",
    ],
    "tax_receipt": [
        r"quittance",
        r"direction.*impôts",
        r"المديرية العامة للضرائب",
        r"taxe",
        r"reçu fiscal",
    ],
    "architectural_plan": [
        r"architecte",
        r"plan.*arch",
        r"échelle",
        r"niveau",
        r"coupe",
        r"façade",
    ],
    "commercial_register": [
        r"registre.*commerce",
        r"السجل التجاري",
        r"tribunal.*commerce",
        r"المحكمة التجارية",
        r"rc\s*n",
    ],
}


def analyze_extracted_text(text: str, filename: str) -> OCRAnalysis:
    """
    Analyze extracted text to detect document type and validate content.
    Uses pattern matching for Moroccan administrative indicators.
    """
    text_lower = text.lower()
    alerts: List[str] = []
    moroccan_indicators: List[str] = []
    detected_type: Optional[str] = None
    confidence = 0.0

    # Check for emptiness
    if len(text.strip()) < 10:
        alerts.append("Document vide ou illisible - texte insuffisant extrait")
        return OCRAnalysis(
            is_valid=False,
            alerts=alerts,
            confidence_score=0.0,
        )

    # Detect document type by matching indicators
    best_score = 0
    for doc_type, patterns in MOROCCAN_INDICATORS.items():
        matches = 0
        for pattern in patterns:
            if re.search(pattern, text_lower):
                matches += 1
                moroccan_indicators.append(f"{doc_type}: {pattern}")
        if matches > best_score:
            best_score = matches
            detected_type = doc_type

    # Calculate confidence
    if detected_type and best_score > 0:
        total_patterns = len(MOROCCAN_INDICATORS.get(detected_type, []))
        confidence = min((best_score / max(total_patterns, 1)) * 100, 100.0)

    # Validation checks
    is_valid = True

    if confidence < 30:
        alerts.append("Faible confiance dans la détection du type de document")
        is_valid = False

    if len(text.strip()) < 50:
        alerts.append("Contenu textuel insuffisant pour une validation fiable")
        is_valid = False

    # Check for potential tampering indicators
    if re.search(r"(modifié|falsifié|copie non conforme)", text_lower):
        alerts.append("Indicateurs de modification détectés")
        is_valid = False

    # Check document appears official
    has_official_header = any(
        re.search(pattern, text_lower)
        for pattern in [r"royaume du maroc", r"المملكة المغربية", r"ministère"]
    )
    if detected_type in ["cin", "land_title", "tax_receipt"] and not has_official_header:
        alerts.append("En-tête officiel non détecté pour ce type de document")

    return OCRAnalysis(
        is_valid=is_valid,
        document_type_detected=detected_type,
        alerts=alerts,
        confidence_score=round(confidence, 2),
        moroccan_indicators=moroccan_indicators[:5],  # Limit to top 5
    )


def extract_text_from_image(image_bytes: bytes) -> str:
    """
    Extract text from image bytes using Tesseract OCR.
    Supports French and Arabic text (common in Moroccan documents).
    """
    try:
        from PIL import Image
        import pytesseract
        import io

        image = Image.open(io.BytesIO(image_bytes))

        # Preprocess: convert to RGB if necessary
        if image.mode != "RGB":
            image = image.convert("RGB")

        # Extract text with French + Arabic support
        text = pytesseract.image_to_string(image, lang="fra+ara")

        return text.strip()
    except ImportError:
        # Fallback if Tesseract not installed
        return "[OCR_UNAVAILABLE] Tesseract non installé sur ce serveur"
    except Exception as e:
        return f"[OCR_ERROR] Erreur lors de l'extraction: {str(e)}"
