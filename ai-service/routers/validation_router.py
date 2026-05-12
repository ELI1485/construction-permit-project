"""
Validation Router - AI permit analysis endpoint.
"""

from fastapi import APIRouter, HTTPException
from schemas.validation_schema import PermitValidationRequest, PermitValidationResponse
from services.ai_analysis_service import analyze_permit

router = APIRouter()


@router.post("/validate", response_model=PermitValidationResponse)
async def validate_permit(request: PermitValidationRequest):
    """
    Analyze a construction permit request.

    Receives permit data from Laravel and returns:
    - Risk score and level
    - Priority classification
    - Missing documents
    - Anomalies detected
    - Recommendations
    - Technical review requirement
    """
    try:
        result = analyze_permit(request)
        return result
    except Exception as e:
        raise HTTPException(
            status_code=500,
            detail=f"Erreur lors de l'analyse: {str(e)}"
        )
