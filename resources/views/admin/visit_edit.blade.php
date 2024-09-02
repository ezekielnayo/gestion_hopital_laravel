<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la visite médicale</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Modifier la visite médicale</h2>
        <form action="{{ route('medical_visits.update', $visit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="reason">Motif</label>
                <input type="text" id="reason" name="reason" class="form-control" value="{{ $visit->reason }}"
                    required>
            </div>
            <div class="form-group">
                <label for="visit_date">Date de la Visite</label>
                <!-- Assurez-vous que la chaîne de caractères est au format 'Y-m-d' -->
                <input type="date" id="visit_date" name="visit_date" class="form-control"
                    value="{{ date('Y-m-d', strtotime($visit->visit_date)) }}" required>
            </div>

            <div class="form-group">
                <label for="observations">Observations</label>
                <textarea id="observations" name="observations" class="form-control">{{ $visit->observations }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('medical_visits.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
