from fastapi import APIRouter
from fastapi import UploadFile
from fastapi import File

import shutil

from services.ocr_service import (
    extract_text
)

from services.document_analysis_service import (
    analyze_document
)

router = APIRouter()


@router.post("/ocr")
def process_ocr(
    file: UploadFile = File(...)
):

    temp_path = f"temp/{file.filename}"

    with open(
        temp_path,
        "wb"
    ) as buffer:

        shutil.copyfileobj(
            file.file,
            buffer
        )

    extracted_text = extract_text(
        temp_path
    )

    analysis = analyze_document(
        extracted_text
    )

    return {

        "filename": file.filename,

        "extracted_text": extracted_text,

        "analysis": analysis
    }