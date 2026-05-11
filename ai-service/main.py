from fastapi import FastAPI

from routes.validation_routes import (
    router as validation_router
)

from routes.ocr_routes import (
    router as ocr_router
)

app = FastAPI(
    title="Construction Permit AI Service",
    version="1.0.0"
)

app.include_router(validation_router)

app.include_router(ocr_router)


@app.get("/")
def home():

    return {
        "message": "AI Service Running"
    }