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

        .form-control,
        .form-control-plaintext {
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
             <h1>Créer une Consultation pour {{ $recordData->first_name }} {{ $recordData->last_name }}</h1>
            <form action="{{ route('consultation.submit') }}" method="POST">
                @csrf
                <!-- Champ pour l'ID de l'utilisateur -->
                <input type="hidden" name="user_id" value="{{ $recordData->id }}">

                <div class="form-row">
                    <!-- Champs préremplis pour le nom et le prénom (readonly) -->
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $recordData->first_name }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $recordData->last_name }}" readonly>
                    </div>
                </div>

                <!-- Autres champs de votre formulaire -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="consultation_date">Consultation Date</label>
                        <input type="date" class="form-control" id="consultation_date" name="consultation_date"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" id="weight" name="weight">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="temperature">Temperature</label>
                        <input type="text" class="form-control" id="temperature" name="temperature">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="height">Height</label>
                        <input type="text" class="form-control" id="height" name="height">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blood_pressure">Blood Pressure</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="consultation_reason">Consultation Reason</label>
                        <input type="text" class="form-control" id="consultation_reason" name="consultation_reason"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="symptoms">Symptoms</label>
                    <input type="text" class="form-control" id="symptoms" name="symptoms">
                </div>
                <div class="form-group">
                    <label for="preliminary_diagnosis">Preliminary Diagnosis</label>
                    <input type="text" class="form-control" id="preliminary_diagnosis" name="preliminary_diagnosis">
                </div>
                <div class="form-group">
                    <label for="medical_history">Medical History</label>
                    <input type="text" class="form-control" id="medical_history" name="medical_history">
                </div>
                <div class="form-group">
                    <label for="chronic_diseases">Chronic Diseases</label>
                    <input type="text" class="form-control" id="chronic_diseases" name="chronic_diseases">
                </div>
                <div class="form-group">
                    <label for="current_medications">Current Medications</label>
                    <input type="text" class="form-control" id="current_medications" name="current_medications">
                </div>
                <div class="form-group">
                    <label for="dosage">Dosage</label>
                    <input type="text" class="form-control" id="dosage" name="dosage">
                </div>
                <div class="form-group">
                    <label for="laboratory_tests">Laboratory Tests</label>
                    <input type="text" class="form-control" id="laboratory_tests" name="laboratory_tests">
                </div>
                <div class="form-group">
                    <label for="test_results">Test Results</label>
                    <input type="text" class="form-control" id="test_results" name="test_results">
                </div>
                <div class="form-group">
                    <label for="treatment_plan">Treatment Plan</label>
                    <input type="text" class="form-control" id="treatment_plan" name="treatment_plan">
                </div>
                <div class="form-group">
                    <label for="follow_up">Follow Up</label>
                    <input type="text" class="form-control" id="follow_up" name="follow_up">
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <input type="text" class="form-control" id="comments" name="comments">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ $recordData->phone }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="en_cours">en cours</option>
                        <option value="complete">Terminées</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Enregistrer la Consultation</button>
            </form>
        </section>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
