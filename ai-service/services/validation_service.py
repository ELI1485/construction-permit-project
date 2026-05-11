required_docs = {

    "house": {

        "mandatory": [
            "cin",
            "architectural_plan",
            "land_title",
            "site_plan",
            "application_form"
        ],

        "optional": [
            "topographic_survey"
        ]
    },

    "commercial": {

        "mandatory": [
            "cin",
            "architectural_plan",
            "land_title",
            "site_plan",
            "commercial_register",
            "tax_receipt"
        ],

        "optional": [
            "fire_safety_certificate",
            "environmental_study"
        ]
    },

    "renovation": {

        "mandatory": [
            "cin",
            "existing_plan",
            "renovation_plan",
            "authorization_request"
        ],

        "optional": [
            "structural_study"
        ]
    }
}


def check_missing_documents(
    permit_type,
    uploaded_docs
):

    permit_rules = required_docs.get(
        permit_type,
        {}
    )

    mandatory_docs = permit_rules.get(
        "mandatory",
        []
    )

    optional_docs = permit_rules.get(
        "optional",
        []
    )

    missing_mandatory = [

        doc

        for doc in mandatory_docs

        if doc not in uploaded_docs
    ]

    missing_optional = [

        doc

        for doc in optional_docs

        if doc not in uploaded_docs
    ]

    return {
        "missing_mandatory": missing_mandatory,
        "missing_optional": missing_optional
    }


def validate_surface(surface):

    if surface <= 0:
        return False

    return True


def detect_anomalies(surface):

    anomalies = []

    if surface > 1000:

        anomalies.append(
            "Very large construction project"
        )

    if surface < 20:

        anomalies.append(
            "Surface unusually small"
        )

    return anomalies