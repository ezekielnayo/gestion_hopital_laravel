<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Créer une Visite Médicale</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Créer une Visite Médicale</h2>

            <!-- Message de succès -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Formulaire -->
            <form method="POST" action="{{ route('medical_visits.store') }}">
                @csrf

                <!-- Sélection du patient -->
                <div class="form-group">
                    <label for="patient_id">Sélectionner un patient :</label>
                    <select class="form-control" id="patient_id" name="patient_id" required>
                        <option value="" disabled selected>Choisir un patient</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Motif de la visite -->
                <div class="form-group">
                    <label for="reason">Motif de la visite :</label>
                    <input type="text" class="form-control" id="reason" name="reason"
                        placeholder="Saisir le motif" required>
                </div>

                <!-- Date de la visite -->
                <!-- Date de la visite -->
                <div class="form-group">
                    <label for="visit_date">Date de la visite :</label>
                    <input type="date" class="form-control" id="visit_date" name="visit_date" required>
                </div>






                <!-- Observations -->
                <div class="form-group">
                    <label for="observations">Observations :</label>
                    <textarea class="form-control" id="observations" name="observations" rows="4"></textarea>
                </div>

                <!-- Boutons -->
                <div class="btn-container">
                    <!-- Bouton de retour -->
                    <a href="{{ route('medical_visits.index') }}" class="btn btn-secondary">Retour</a>
                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-primary">Enregistrer la visite médicale</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
