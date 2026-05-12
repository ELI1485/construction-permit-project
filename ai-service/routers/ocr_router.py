"""
OCR Router - Document text extraction endpoint.
"""

from fastapi import APIRouter, UploadFile, File, HTTPException
from schemas.ocr_schema import OCRResponse
from services.ocr_service import extract_text_from_image, analyze_extracted_text

router = APIRouter()


@router.post("/ocr", response_model=OCRResponse)
async def process_ocr(file: UploadFile = File(...)):
    """
    Extract text from an uploaded document image and analyze it.

    Accepts: PDF, PNG, JPG images
    Returns: Extracted text, document type detection, validation flags
    """
    # Validate file type
    allowed_types = ["image/png", "image/jpeg", "image/jpg", "application/pdf"]
    if file.content_type not in allowed_types:
        raise HTTPException(
            status_code=400,
            detail=f"Type de fichier non supporté: {file.content_type}. Formats acceptés: PNG, JPG, PDF"
        )

    # Validate file size (max 10MB)
    contents = await file.read()
    if len(contents) > 10 * 1024 * 1024:
        raise HTTPException(
            status_code=400,
            detail="Fichier trop volumineux. Taille maximale: 10 MB"
        )

    try:
        # Extract text using OCR
        extracted_text = extract_text_from_image(contents)

        # Analyze the extracted text
        analysis = analyze_extracted_text(extracted_text, file.filename or "unknown")

        return OCRResponse(
            filename=file.filename or "unknown",
            extracted_text=extracted_text[:5000],  # Limit response size
            word_count=len(extracted_text.split()),
            analysis=analysis,
        )
    except Exception as e:
        raise HTTPException(
            status_code=500,
            detail=f"Erreur OCR: {str(e)}"
        )
