from fastapi import APIRouter

from services.validation_service import (
    check_missing_documents,
    validate_surface,
    detect_anomalies
)

from services.priority_service import (
    calculate_priority
)

from services.rules_service import (
    technical_review_required
)

from services.scoring_service import (
    calculate_risk_score,
    determine_risk_level
)

from services.recommendation_service import (
    generate_recommendations
)

router = APIRouter()


@router.post("/validate")
def validate_permit(data: dict):

    surface = data.get("surface", 0)

    permit_type = data.get(
        "permit_type",
        "house"
    )

    uploaded_docs = data.get(
        "uploaded_docs",
        []
    )

    if not validate_surface(surface):

        return {
            "status": "error",
            "message": "Invalid surface value"
        }

    priority = calculate_priority(
        surface,
        permit_type
    )

    documents_analysis = check_missing_documents(
        permit_type,
        uploaded_docs
    )

    anomalies = detect_anomalies(surface)

    technical_review = technical_review_required(
        surface,
        permit_type
    )

    risk_score = calculate_risk_score(

        len(
            documents_analysis[
                "missing_mandatory"
            ]
        ),

        len(
            documents_analysis[
                "missing_optional"
            ]
        ),

        technical_review,

        len(anomalies),

        permit_type
    )

    risk_level = determine_risk_level(
        risk_score
    )

    recommendations = generate_recommendations(

        documents_analysis,

        technical_review,

        anomalies,

        permit_type
    )

    return {

        "status": "success",

        "permit_type": permit_type,

        "surface": surface,

        "priority": priority,

        "missing_documents": documents_analysis,

        "technical_review_required": technical_review,

        "anomalies": anomalies,

        "risk_score": risk_score,

        "risk_level": risk_level,

        "recommendations": recommendations
    }