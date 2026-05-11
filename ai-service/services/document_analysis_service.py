def analyze_document(text):

    alerts = []

    text = text.lower()

    if len(text) < 20:

        alerts.append(
            "Document unreadable"
        )

    if "royaume du maroc" not in text:

        alerts.append(
            "Official Moroccan header not detected"
        )

    if "cin" not in text and "carte" not in text:

        alerts.append(
            "Identity indicators not detected"
        )

    is_valid = len(alerts) == 0

    return {

        "is_valid": is_valid,

        "alerts": alerts
    }