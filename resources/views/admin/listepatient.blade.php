<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Patients</title>
    <style>
        * {
            font-weight: normal;
        }

        .sidebar .titre1 h3 {
            font-size: 18px;
            margin: 12px 0;
        }

        .sidebar .titre1 a {
            text-decoration: none;
            color: #fff;
        }

        .sidebar .titreP {
            font-size: 20px;
        }

        .sidebar .titre1 {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .sidebar .titre1 a:hover h3 {
            color: #007bff;
        }

        .ml-2 {
            margin-left: auto;
        }

        .error-message {
            display: none;
            color: red;
            margin: 10px 0;
        }

        .btn-add {
            margin-bottom: 20px;
            float: right;
        }

        .floating {
            display: flex;
            width: 1200px;
            justify-content: space-between;
            box-sizing: border-box;
            padding-right: 70px;
            column-gap: 20px;
            align-items: center;
        }

        .floating #search {
            background-color: rgba(60, 60, 250, 1);
            color: white;
        }

        /* Style pour la section avec défilement */
        .contenu {
            max-height: 600px;
            /* Limite la hauteur du contenu */
            overflow-y: auto;
            /* Ajoute le défilement si nécessaire */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt=""
                    style="width: 60px; height: 60px; border-radius: 60%;">
            </li>
            <div class='floating'>
                <form class="form-inline my-2 my-lg-0 ml-auto" action="{{ route('patients.index') }}" method="GET">
                    <input class="form-control mr-sm-4" type="search" name="query"
                        placeholder="Rechercher par prénom ou nom" aria-label="Rechercher">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="search"
                        type="submit">Rechercher</button>
                </form>
                <li class="compte">
                    <form method="POST" action="{{ route('logout') }}" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger ml-2" style="background-color: #ff0000;
margin-left: 1  00px">Se déconnecter</button>
                    </form>
                </li>
            </div>
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
                    <h3><i class="fas fa-home"></i> Accueil</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('admin.listepatient') }}">
                    <h3><i class="fas fa-user-injured"></i> Liste des patients</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('admin.listerdv') }}">
                    <h3><i class="fas fa-calendar-alt"></i> Les rendez-vous</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('consultations.index') }}">
                    <h3><i class="fas fa-file-medical"></i> Dossiers médicaux</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('admin.consulter') }}">
                    <h3><i class="fas fa-stethoscope"></i> Consultation</h3>
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
            div>
            <!-- Autres liens du menu -->
        </div>

        <div class="contenu">
            <div class="error-message" id="error-message"></div>
            <a href="{{ route('patients.pdf') }}" class="btn btn-success">Télécharger la liste en PDF</a>
            <a href="{{ route('patients.create') }}" class="btn btn-primary btn-add">Ajouter un Patient</a>

            @if ($patients->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Aucun patient trouvé.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->last_name }}</td>
                                    <td>{{ $patient->first_name }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ ucfirst($patient->gender) }}</td>
                                    <td>
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
