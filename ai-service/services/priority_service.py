def calculate_priority(
    surface,
    permit_type
):

    if permit_type == "commercial":

        if surface > 500:
            return "Very High"

        return "High"

    if surface > 300:
        return "High"

    elif surface >= 100:
        return "Medium"

    return "Low"