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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .status-pending {
            background-color: #fff3cd;
        }

        .status-accepted {
            background-color: #d4edda;
        }

        .status-refused {
            background-color: #f8d7da;
        }

        .btn-container {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .btn-container a {
            text-decoration: none;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-cons {
            background-color: #007bff; /* Couleur de fond du bouton */
        }

        .btn-create {
            background-color: #28a745;
            color: white;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt=""
                    style="width: 60px; height: 60px; border-radius:50%;">
            </li>
            <div class="zone-recherche">
                <form action="{{ route('medical_records.search') }}" method="GET">
                    <input type="search" name="search" placeholder="Rechercher..">
                    <button type="submit">Rechercher</button>
                </form>
            </div>
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
                    <h3>Acceuil</h3>
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
                    <h3>Dossiers Médicaux</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('admin.consulter') }}">
                    <h3>Consultation</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('deaths.create') }}">
                    <h3><i class="fas fa-file-medical"></i> Déclarations</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('deaths.index') }}">
                    <h3><i class="fas fa-cross"></i> Liste necrologique</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('medical_visits.index') }}">
                    <h3><i class="fas fa-stethoscope"></i> Visites Médicales</h3>
                </a>
            </div>
        </div>

        <div class="contenu">

            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Groupe Sanguin</th>
                        <th>Antécédents Médicaux</th>
                        <th>Médicaments Actuels</th>
                        <th>Allergies</th>
                        <th>Date de Naissance</th>
                        <th>Date de Dernière Consultation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalRecords as $record)
                        <tr>
                            <td>{{ $record->user->last_name }}</td>
                            <td>{{ $record->user->first_name }}</td>
                            <td>{{ $record->blood_group }}</td>
                            <td>{{ $record->medical_history ? 'Oui' : 'Non' }}</td>
                            <td>{{ $record->current_medications ? 'Oui' : 'Non' }}</td>
                            <td>{{ $record->allergies ? 'Oui' : 'Non' }}</td>
                            <td>{{ $record->date_of_birth }}</td>
                            <td>{{ $record->date_consult }}</td>
                            <td>
                            
                                <a href="{{ route('consultations.create', $record->user_id) }}"
                                    class="btn btn-cons">Consulter</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
