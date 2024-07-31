<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard Admin</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
    }

    .container {
        background-color: #fff;
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
    }

    th,
    td {
        text-align: center;
        vertical-align: middle;
    }

    thead th {
        background-color: #007bff;
        color: #fff;
    }
</style>
</head>
<div class="nav">
    <ul class="items">
        <li class="zone-image">
            <img src="{{ asset('images/log.jpg') }}" alt=""
                style="width: 60px; height: 60px; border-radius:50%;">
        </li>
        <li class="zone-recherhce"><input type="search" placeholder="Rechercher.."></li>
        <li class="compte">
            <ul class="links">
                <form method="POST" action="{{ route('logout') }}" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger ml-2">Se déconnecter</button>
                </form>
            </ul>
        </li>
        <li class="menu">
            <button class="fav-menu">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>
<div class="containerP">
    <div class="sidebar">
        <div class="titreP">
            <h1>Dashboard</h1>
        </div>
        <div class="titre1">
            <a href="{{ route('admin.dashboard') }}">
                <h3>Home</h3>
            </a>
        </div>
        <div class="titre1">
            <a href="{{ route('admin.listepatient') }}">
                <h3>Liste des patients</h3>
            </a>
        </div>
        <div class="titre1">
            <a href="{{ route('admin.listerdv') }}">
                <h3>Liste des rendez-vous</h3>
            </a>
        </div>
        <div class="titre1">
            <a href="{{ route('consultations.index') }}">
                <h3>dossiers medicaux</h3>
            </a>
        </div>
        <div class="titre1">
            <a href="{{ route('admin.consulter') }}">
                <h3>consultation</h3>
            </a>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center mb-4">Liste des dossiers médicaux</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Date de consultation</th>
                        <th>Poids</th>
                        <th>Température</th>
                        <th>Taille</th>
                        <th>Tension artérielle</th>
                        <th>Raison</th>
                        <th>Symptômes</th>
                        <th>Diagnostic préliminaire</th>
                        <th>Suivi</th>
                        <th>Commentaires</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultations as $consultation)
                        <tr>
                            <td>{{ $consultation->first_name }}</td>
                            <td>{{ $consultation->last_name }}</td>
                            <td>{{ $consultation->phone }}</td>
                            <td>{{ $consultation->consultation_date }}</td>
                            <td>{{ $consultation->weight }}</td>
                            <td>{{ $consultation->temperature }}</td>
                            <td>{{ $consultation->height }}</td>
                            <td>{{ $consultation->blood_pressure }}</td>
                            <td>{{ $consultation->consultation_reason }}</td>
                            <td>{{ $consultation->symptoms }}</td>
                            <td>{{ $consultation->preliminary_diagnosis }}</td>
                            <td>{{ $consultation->follow_up }}</td>
                            <td>{{ $consultation->comments }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>
