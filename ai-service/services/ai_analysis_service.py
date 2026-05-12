"""
AI Analysis Service - Core logic for permit risk assessment.
Implements rule-based AI for document validation and risk scoring.
"""

from typing import List, Dict, Tuple
from schemas.validation_schema import (
    PermitValidationRequest,
    PermitValidationResponse,
    MissingDocuments,
)

# Document requirements by permit type (Moroccan regulations - rokhas.ma logic)
MANDATORY_DOCS = {
    "construction": ["cin", "architectural_plan", "land_title", "site_plan", "tax_receipt"],
    "demolition": ["cin", "land_title", "site_plan", "tax_receipt"],
    "renovation": ["cin", "architectural_plan", "land_title", "tax_receipt"],
    "commercial": ["cin", "architectural_plan", "land_title", "site_plan", "tax_receipt", "commercial_register"],
    "industrial": ["cin", "architectural_plan", "land_title", "site_plan", "tax_receipt", "topographic_survey"],
    "extension": ["cin", "architectural_plan", "land_title", "site_plan"],
}

OPTIONAL_DOCS = {
    "construction": ["topographic_survey", "commercial_register"],
    "demolition": ["topographic_survey"],
    "renovation": ["topographic_survey", "site_plan"],
    "commercial": ["topographic_survey"],
    "industrial": ["commercial_register"],
    "extension": ["topographic_survey", "tax_receipt"],
}

# Risk thresholds
SURFACE_THRESHOLDS = {
    "construction": {"medium": 200, "high": 500, "critical": 1000},
    "commercial": {"medium": 150, "high": 400, "critical": 800},
    "industrial": {"medium": 500, "high": 1000, "critical": 2000},
    "demolition": {"medium": 100, "high": 300, "critical": 600},
    "renovation": {"medium": 150, "high": 400, "critical": 800},
    "extension": {"medium": 100, "high": 250, "critical": 500},
}


def analyze_permit(request: PermitValidationRequest) -> PermitValidationResponse:
    """
    Main analysis function. Evaluates permit request and generates:
    - Risk score (0-100)
    - Risk level (Low/Medium/High/Critical)
    - Priority classification
    - Missing documents detection
    - Anomaly detection
    - Recommendations
    """
    risk_score = 0
    anomalies: List[str] = []
    recommendations: List[str] = []

    permit_type = request.permit_type.lower()
    surface = request.surface
    uploaded = [doc.lower() for doc in request.uploaded_docs]

    # 1. Check missing documents
    missing_mandatory, missing_optional = _check_documents(permit_type, uploaded)

    # 2. Calculate risk from missing docs
    if missing_mandatory:
        risk_score += len(missing_mandatory) * 15
        anomalies.append(f"{len(missing_mandatory)} document(s) obligatoire(s) manquant(s)")
        for doc in missing_mandatory:
            recommendations.append(f"Veuillez fournir le document: {_doc_label(doc)}")

    if missing_optional:
        risk_score += len(missing_optional) * 5

    # 3. Surface-based risk assessment
    thresholds = SURFACE_THRESHOLDS.get(permit_type, SURFACE_THRESHOLDS["construction"])
    if surface >= thresholds["critical"]:
        risk_score += 30
        anomalies.append(f"Surface très élevée ({surface} m²) pour un permis de type {permit_type}")
        recommendations.append("Une étude d'impact environnemental est recommandée")
    elif surface >= thresholds["high"]:
        risk_score += 20
        recommendations.append("Vérification approfondie de la conformité urbanistique recommandée")
    elif surface >= thresholds["medium"]:
        risk_score += 10

    # 4. Permit type-specific risks
    if permit_type == "commercial" and surface > 300:
        risk_score += 15
        anomalies.append("Projet commercial de grande envergure")
        recommendations.append("Étude de circulation et stationnement requise")

    if permit_type == "industrial":
        risk_score += 10
        recommendations.append("Vérification des normes environnementales obligatoire")

    if permit_type == "demolition" and surface > 200:
        risk_score += 10
        recommendations.append("Plan de gestion des déchets de démolition requis")

    # 5. Technical review requirement
    technical_review = (
        risk_score >= 40
        or surface >= thresholds.get("high", 500)
        or permit_type in ["industrial", "commercial"]
        or len(missing_mandatory) > 2
    )

    if technical_review:
        recommendations.append("Révision technique obligatoire avant approbation")

    # 6. Cap risk score at 100
    risk_score = min(risk_score, 100)

    # 7. Determine risk level
    risk_level = _get_risk_level(risk_score)

    # 8. Determine priority
    priority = _get_priority(risk_score, permit_type, surface)

    return PermitValidationResponse(
        status="success",
        permit_type=request.permit_type,
        surface=surface,
        priority=priority,
        missing_documents=MissingDocuments(
            missing_mandatory=missing_mandatory,
            missing_optional=missing_optional,
        ),
        technical_review_required=technical_review,
        anomalies=anomalies,
        risk_score=risk_score,
        risk_level=risk_level,
        recommendations=recommendations,
    )


def _check_documents(permit_type: str, uploaded: List[str]) -> Tuple[List[str], List[str]]:
    """Check for missing mandatory and optional documents."""
    mandatory = MANDATORY_DOCS.get(permit_type, MANDATORY_DOCS["construction"])
    optional = OPTIONAL_DOCS.get(permit_type, [])

    missing_mandatory = [doc for doc in mandatory if doc not in uploaded]
    missing_optional = [doc for doc in optional if doc not in uploaded]

    return missing_mandatory, missing_optional


def _get_risk_level(score: int) -> str:
    """Determine risk level from score."""
    if score >= 70:
        return "Critical"
    elif score >= 50:
        return "High"
    elif score >= 30:
        return "Medium"
    return "Low"


def _get_priority(score: int, permit_type: str, surface: float) -> str:
    """Determine processing priority."""
    if score >= 70:
        return "Very High"
    elif score >= 50:
        return "High"
    elif score >= 30 or permit_type in ["commercial", "industrial"]:
        return "Medium"
    elif surface > 200:
        return "Normal"
    return "Low"


def _doc_label(doc_key: str) -> str:
    """Human-readable document labels."""
    labels = {
        "cin": "Carte d'Identité Nationale (CIN)",
        "architectural_plan": "Plan Architectural",
        "land_title": "Titre Foncier",
        "site_plan": "Plan de Situation",
        "tax_receipt": "Quittance Fiscale",
        "commercial_register": "Registre de Commerce",
        "topographic_survey": "Levé Topographique",
    }
    return labels.get(doc_key, doc_key)
