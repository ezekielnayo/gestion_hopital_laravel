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

        .search-container {
            margin-bottom: 1rem;
        }

        .floating {
            display: flex;
            justify-content: end;
            align-items: center;
            margin-top: 10px;
            width: 950px;
        }

        /* Ajuster la section de contenu pour permettre le défilement */
        .contenu {
            max-height: 600px;
            /* Ajustez cette valeur en fonction de vos besoins */
            overflow-y: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .btn-danger {
            background-color: #ff0000;
            border: none;
            width: 130px;
            height: 38px;
            margin-right: 65px;
            color: #fff;
            font-size: 15px;
            border-radius: 5px;
        }

    .btn-primary {
        margin-top: 20px; /* Espace au-dessus du bouton */
        margin-right: 10px; /* Espace à droite du bouton */
    }

        #search_btn {
            margin-left: 20px;
            width: 140px;
            margin-top: 6px;
            height: 38px;
            margin-right: -70px;
            border-radius: 5px;
            color: #fff;
            border: none;
            background-color: rgba(60, 60, 250, 1);
            font-size: 15px;
        }

        .btn-primary {
            margin-top: 20px; /* Ajoute une marge supérieure pour éloigner le bouton du contenu au-dessus */
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

            <div class="floating">
                <form action="{{ route('rdv.index') }}" method="GET"
                    class="form-inline my-2 my-lg-0 search-container">
                    <input type="search" id="search-input" name="query" class="form-control mr-sm-2"
                        placeholder="Rechercher par prénom ou nom" aria-label="Rechercher">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="search_btn"
                        type="submit">Rechercher</button>
                </form>
            </div>
            <div class="mt-3">
                @if ($appointments->isEmpty())
                    <p>Aucun patient trouvé.</p>
                @else
                    <ul class="list-group">
                        @foreach ($appointments as $appointment)
                            <li class="list-group-item">
                                {{ $appointment->first_name }} {{ $appointment->last_name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
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
        </div>

        <div class="contenu">
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('rendezvous.create') }}'">
                    Ajouter Rendez-vous
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Date et heure</th>
                        <th>Motif</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="appointments-table">
                    @foreach ($appointments as $appointment)
                        <tr class="status-{{ $appointment->status }}">
                            <td>{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</td>
                            <td>{{ $appointment->user->phone }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->motif }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <form action="{{ route('admin.updateRdvStatus', $appointment->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="pending"
                                            {{ $appointment->status == 'pending' ? 'selected' : '' }}>En attente
                                        </option>
                                        <option value="accepted"
                                            {{ $appointment->status == 'accepted' ? 'selected' : '' }}>Accepté</option>
                                        <option value="refused"
                                            {{ $appointment->status == 'refused' ? 'selected' : '' }}>Refusé</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('search-input').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#appointments-table tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let match = false;
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(searchValue)) {
                        match = true;
                    }
                });
                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
