def generate_recommendations(

    missing_documents,

    technical_review_required,

    anomalies,

    permit_type

):

    recommendations = []

    mandatory_docs = missing_documents.get(
        "missing_mandatory",
        []
    )

    optional_docs = missing_documents.get(
        "missing_optional",
        []
    )

    for doc in mandatory_docs:

        recommendations.append(
            f"Upload mandatory document: {doc}"
        )

    for doc in optional_docs:

        recommendations.append(
            f"Optional recommended document: {doc}"
        )

    if technical_review_required:

        recommendations.append(
            "Technical review by municipality required"
        )

    for anomaly in anomalies:

        recommendations.append(
            f"Investigate anomaly: {anomaly}"
        )

    if permit_type == "commercial":

        recommendations.append(
            "Commercial safety compliance verification recommended"
        )

    if len(recommendations) == 0:

        recommendations.append(
            "Permit dossier appears complete"
        )

    return recommendations