def calculate_risk_score(

    missing_mandatory_count,

    missing_optional_count,

    technical_review_required,

    anomalies_count,

    permit_type

):

    score = 100

    score -= missing_mandatory_count * 20

    score -= missing_optional_count * 5

    score -= anomalies_count * 10

    if technical_review_required:

        score -= 15

    if permit_type == "commercial":

        score -= 10

    if score < 0:
        score = 0

    return score


def determine_risk_level(score):

    if score >= 80:
        return "Low"

    elif score >= 50:
        return "Medium"

    return "High"