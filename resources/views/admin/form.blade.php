<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Créer un Rendez-vous</h1>

        <form method="POST" action="{{ route('rendezvous.store') }}">
            @csrf
            <div class="form-group">
                <label for="patient_id">Sélectionnez un patient</label>
                <select id="patient_id" name="patient_id" class="form-control" required>
                    <option value="">Choisir un patient</option>
                    <!-- Boucle pour afficher les patients disponibles -->
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="appointment_date">Date du Rendez-vous</label>
                <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date"
                    required>
            </div>
            <div class="form-group">
                <label for="motif">Motif</label>
                <input type="text" class="form-control" id="motif" name="motif">
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>






    </div>
</body>

</html>
