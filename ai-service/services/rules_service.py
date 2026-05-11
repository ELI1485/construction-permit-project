def technical_review_required(
    surface,
    permit_type
):

    if surface > 500:
        return True

    if permit_type == "commercial":
        return True

    return False