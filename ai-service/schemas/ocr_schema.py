"""
Pydantic schemas for OCR requests and responses.
"""

from pydantic import BaseModel
from typing import List, Optional


class OCRAnalysis(BaseModel):
    """OCR document analysis result."""
    is_valid: bool = False
    document_type_detected: Optional[str] = None
    alerts: List[str] = []
    confidence_score: float = 0.0
    moroccan_indicators: List[str] = []


class OCRResponse(BaseModel):
    """Schema for OCR processing response."""
    filename: str
    extracted_text: str
    word_count: int
    analysis: OCRAnalysis
