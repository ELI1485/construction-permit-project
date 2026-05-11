<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Create Permit</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 p-10">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

        <h1 class="text-3xl font-bold mb-6">
            Construction Permit Request
        </h1>

        <form id="permitForm">

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Permit Type
                </label>

                <select
                    name="permit_type"
                    class="w-full border p-3 rounded"
                >

                    <option value="house">
                        House
                    </option>

                    <option value="commercial">
                        Commercial
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Surface
                </label>

                <input
                    type="number"
                    name="surface"
                    class="w-full border p-3 rounded"
                    placeholder="Surface in m²"
                >

            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded"
            >
                Submit Permit
            </button>

        </form>

        <div
            id="result"
            class="mt-8"
        ></div>

    </div>

    <script>

        document
            .getElementById('permitForm')
            .addEventListener(
                'submit',
                async function(e) {

                    e.preventDefault();

                    const formData =
                        new FormData(this);

                    const payload = {

                        permit_type:
                            formData.get(
                                'permit_type'
                            ),

                        surface:
                            Number(
                                formData.get(
                                    'surface'
                                )
                            )
                    };

                    const response = await fetch(
                        '/permits',
                        {

                            method: 'POST',

                            headers: {

                                'Content-Type':
                                    'application/json'
                            },

                            body: JSON.stringify(
                                payload
                            )
                        }
                    );

                    const data =
                        await response.json();

                    document
                        .getElementById(
                            'result'
                        )
                        .innerHTML = `

                        <div class="border rounded p-6 bg-gray-50">

                            <h2 class="text-2xl font-bold mb-4">
                                AI Analysis
                            </h2>

                            <p>
                                <strong>Risk Level:</strong>
                                ${data.permit.risk_level}
                            </p>

                            <p>
                                <strong>Priority:</strong>
                                ${data.permit.ai_priority}
                            </p>

                            <p>
                                <strong>Risk Score:</strong>
                                ${data.permit.risk_score}
                            </p>

                            <p>
                                <strong>Technical Review:</strong>
                                ${data.permit.technical_review_required}
                            </p>

                            <h3 class="text-xl font-semibold mt-6 mb-2">
                                Recommendations
                            </h3>

                            <ul class="list-disc ml-6">

                                ${data.permit.ai_recommendations
                                    .map(
                                        item =>
                                        `<li>${item}</li>`
                                    )
                                    .join('')}
                            </ul>

                        </div>
                    `;
                }
            );

    </script>

</body>

</html>