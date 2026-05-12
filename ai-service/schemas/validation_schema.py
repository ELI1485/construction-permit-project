"""
Pydantic schemas for permit validation requests and responses.
"""

from pydantic import BaseModel, Field
from typing import List, Optional


class PermitValidationRequest(BaseModel):
    """Schema for incoming permit validation request from Laravel."""
    permit_type: str = Field(..., description="Type of construction permit")
    surface: float = Field(..., ge=0, description="Surface area in m²")
    location: Optional[str] = Field(None, description="Project location/district")
    uploaded_docs: List[str] = Field(default_factory=list, description="List of uploaded document filenames")
    owner_type: Optional[str] = Field(None, description="Type of owner (individual/company)")


class MissingDocuments(BaseModel):
    """Missing documents breakdown."""
    missing_mandatory: List[str] = []
    missing_optional: List[str] = []


class PermitValidationResponse(BaseModel):
    """Schema for AI validation response."""
    status: str = "success"
    permit_type: str
    surface: float
    priority: str
    missing_documents: MissingDocuments
    technical_review_required: bool
    anomalies: List[str]
    risk_score: int = Field(ge=0, le=100)
    risk_level: str
    recommendations: List[str]
