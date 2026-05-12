"""
FastAPI AI Microservice - Plateforme Intelligente de Gestion des Permis de Construire
Provides AI validation, risk scoring, and OCR capabilities.
"""

from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from routers import validation_router, ocr_router

app = FastAPI(
    title="PermisConstruct AI Service",
    description="Microservice d'analyse IA et OCR pour la gestion des permis de construire",
    version="1.0.0",
)

# CORS configuration
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Register routers
app.include_router(validation_router.router, tags=["Validation IA"])
app.include_router(ocr_router.router, tags=["OCR"])


@app.get("/")
def root():
    return {
        "service": "PermisConstruct AI Microservice",
        "version": "1.0.0",
        "endpoints": ["/validate", "/ocr"],
        "status": "running",
    }


@app.get("/health")
def health_check():
    return {"status": "healthy"}
