<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Formulaire de Consultation</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control, .form-control-plaintext {
            border-radius: 0.25rem;
            padding: 0.5rem;
        }

        .form-row {
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        textarea.form-control {
            resize: none;
        }

        .btn-primary {
            border-radius: 0.25rem;
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        h3 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            text-align: center;
            color: #343a40;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-back {
            background-color: #6c757d;
            border: none;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

    </style>
</head>

<body>
    <div class="container">
        <section>
            <h3>Formulaire de Consultation</h3>

            <!-- Bouton de retour -->
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-back"><i class="fas fa-arrow-left"></i> Retour</a>
            </div>

            <form method="POST" action="{{ route('consultation.submit') }}" class="needs-validation" novalidate>
                @csrf

                <!-- Informations de l'Utilisateur -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name" class="section-title">Prénom :</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name" class="section-title">Nom :</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="section-title">Téléphone :</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <!-- Détails de la Consultation -->
                <div class="form-group">
                    <label for="consultation_date" class="section-title">Date de Consultation :</label>
                    <input type="date" class="form-control" id="consultation_date" name="consultation_date" required>
                </div>

                <!-- Examen Physique -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="weight" class="section-title">Poids (kg) :</label>
                        <input type="text" class="form-control" id="weight" name="weight">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="temperature" class="section-title">Température :</label>
                        <input type="text" class="form-control" id="temperature" name="temperature">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="height" class="section-title">Taille (cm) :</label>
                        <input type="text" class="form-control" id="height" name="height">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blood_pressure" class="section-title">Pression Artérielle :</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure">
                    </div>
                </div>

                <!-- Motif de la Consultation et Symptômes -->
                <div class="form-group">
                    <label for="consultation_reason" class="section-title">Motif de la Consultation :</label>
                    <textarea class="form-control" id="consultation_reason" name="consultation_reason" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="symptoms" class="section-title">Symptômes :</label>
                    <textarea class="form-control" id="symptoms" name="symptoms" rows="2"></textarea>
                </div>

                <!-- Diagnostic Préliminaire et Antécédents Médicaux -->
                <div class="form-group">
                    <label for="preliminary_diagnosis" class="section-title">Diagnostic Préliminaire :</label>
                    <textarea class="form-control" id="preliminary_diagnosis" name="preliminary_diagnosis" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="medical_history" class="section-title">Antécédents Médicaux :</label>
                    <textarea class="form-control" id="medical_history" name="medical_history" rows="2"></textarea>
                </div>

                <!-- Maladies Chroniques et Médicaments -->
                <div class="form-group">
                    <label for="chronic_diseases" class="section-title">Maladies Chroniques :</label>
                    <textarea class="form-control" id="chronic_diseases" name="chronic_diseases" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="current_medications" class="section-title">Médicaments Actuels :</label>
                    <textarea class="form-control" id="current_medications" name="current_medications" rows="2"></textarea>
                </div>

                <!-- Posologie et Tests de Laboratoire -->
                <div class="form-group">
                    <label for="dosage" class="section-title">Posologie :</label>
                    <textarea class="form-control" id="dosage" name="dosage" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="laboratory_tests" class="section-title">Tests de Laboratoire :</label>
                    <textarea class="form-control" id="laboratory_tests" name="laboratory_tests" rows="2"></textarea>
                </div>

                <!-- Résultats et Plan de Traitement -->
                <div class="form-group">
                    <label for="test_results" class="section-title">Résultats :</label>
                    <textarea class="form-control" id="test_results" name="test_results" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="treatment_plan" class="section-title">Plan de Traitement :</label>
                    <textarea class="form-control" id="treatment_plan" name="treatment_plan" rows="2"></textarea>
                </div>

                <!-- Suivi et Commentaires -->
                <div class="form-group">
                    <label for="follow_up" class="section-title">Suivi :</label>
                    <textarea class="form-control" id="follow_up" name="follow_up" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="comments" class="section-title">Commentaires :</label>
                    <textarea class="form-control" id="comments" name="comments" rows="2"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
            </form>
        </section>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
