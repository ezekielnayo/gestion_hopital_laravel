<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impression du Décès</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
        }
        .btn-back {
            margin-bottom: 20px;
        }
        .details-card {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
        }
        .details-info {
            flex: 1;
            padding-right: 20px;
        }
        .identity-photo {
            flex-shrink: 0;
            width: 150px;
            height: 150px;
            background-color: #ddd;
            border-radius: 5px;
            text-align: center;
        }
        .identity-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('deaths.index') }}" class="btn btn-secondary btn-back">Retour à la Liste</a>
        <h1 class="mb-4">Détails du Décès</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="details-card">
            <!-- Détails du décès -->
            <div class="details-info">
                <h5 class="card-title">Informations sur le Décès</h5>
                <p><strong>Nom du Patient :</strong> {{ $death->user ? $death->user->last_name : 'Inconnu' }}</p>
                <p><strong>Prénom du Patient :</strong> {{ $death->user ? $death->user->first_name : 'Inconnu' }}</p>
                <p><strong>Date du Décès :</strong> {{ \Carbon\Carbon::parse($death->death_date)->format('d/m/Y') }}</p>
                <p><strong>Heure du Décès :</strong> {{ $death->death_time ? \Carbon\Carbon::parse($death->death_time)->format('H:i') : 'Non spécifiée' }}</p>
                <p><strong>Lieu du Décès :</strong> {{ $death->place_of_death }}</p>
                <p><strong>Cause du Décès :</strong> {{ $death->cause_of_death ? $death->cause_of_death : 'Non spécifiée' }}</p>
                <p><strong>Nom du Médecin :</strong> {{ $death->doctor_name }}</p>
                <p><strong>Date de Certification :</strong> {{ $death->certification_date ? \Carbon\Carbon::parse($death->certification_date)->format('d/m/Y') : 'Non spécifiée' }}</p>
                <!-- Buttons for actions -->
                <a href="{{ route('deaths.edit', $death->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('deaths.destroy', $death->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('deaths.print', $death->id) }}" class="btn btn-info">Imprimer</a>
            </div>
            <!-- Photo du patient à droite -->
            <div class="identity-photo">
                <img src="{{ asset('storage/passport_photos/' . $death->user->passport_photo) }}" alt="Photo de {{ $death->user->first_name }}">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
