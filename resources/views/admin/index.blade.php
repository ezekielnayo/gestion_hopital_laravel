<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Décès</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 1000px;
            margin-top: 20px;
        }
        .table thead th {
            background-color: #007bff;
            color: #fff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .btn-return, .btn-action {
            margin-bottom: 20px;
        }
        .identity-card {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
            margin-left: 10px;
        }
        .identity-card img {
            max-width: 100px;
            border-radius: 5px;
        }
        .identity-card h5 {
            margin: 0;
            font-size: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-return">Retour au Tableau de Bord</a>
        <h1 class="mb-4">Liste des Décès</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date du Décès</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deaths as $death)
                    <tr>
                        <td>{{ $death->user ? $death->user->last_name : 'Inconnu' }}</td>
                        <td>{{ $death->user ? $death->user->first_name : 'Inconnu' }}</td>
                        <td>{{ \Carbon\Carbon::parse($death->death_date)->format('d/m/Y') }}</td>
                       
                       
                       
                       
                       
                       
                       
                        <td>
                            <a href="{{ route('deaths.show', $death->id) }}" class="btn btn-info btn-action">Voir</a>
                            <form action="{{ route('deaths.destroy', $death->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce décès ?')">Supprimer</button>
                            </form>
                            <a href="{{ route('deaths.print', $death->id) }}" class="btn btn-warning btn-action">Imprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
