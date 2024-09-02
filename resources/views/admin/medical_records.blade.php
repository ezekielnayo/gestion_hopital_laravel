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
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }

        .container {
            width: 100%;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            background-color: aliceblue;
            border-collapse: collapse;
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

        .details {
            display: none;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .details-form {
            display: flex;
            flex-wrap: wrap;
        }

        .details-form div {
            flex: 1 1 45%;
            margin: 10px;
        }

        .details-form label {
            font-weight: bold;
        }

        .details-btn {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn-dossier {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-modifier {
            background-color: #ffc107;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-supprimer {
            background-color: #dc3545;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .info-header {
            margin-bottom: 20px;
            padding: 20px;
            background-color: aliceblue;
            border: 2px solid #007bff;
            border-radius: 50px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-header h2 {
            margin: 0;
            padding-bottom: 10px;
        }

        .info-header ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .info-header li {
            margin: 5px 15px;
            font-size: 16px;
        }

        .filter-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .filter-container label {
            margin-right: 10px;
        }

        .filter-container input,
        .filter-container select {
            padding: 5px;
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
    </style>
</head>

<body>
    <div class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt=""
                    style="width: 60px; height: 60px; border-radius:50%;">
            </li>
            <li class="zone-recherche">
                <form id="search-form">
                    <input type="search" id="search-input" placeholder="Rechercher...">
                </form>
            </li>
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
            div>

        </div>
        <div class="container">
            <!-- Section d'en-tête avec les informations fournies par les patients -->
            <div class="info-header">
                <h2>Liste des dossiers médicaux:</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!-- Filtres -->
            <div class="filter-container">
                <form id="filter-form">
                    <label for="status-filter">Statut:</label>
                    <select id="status-filter">
                        <option value="">Tous les statuts</option>
                        <option value="en_cours">en cours</option>
                        <option value="complete">Terminées</option>
                        <!-- Ajoutez d'autres options si nécessaire -->
                    </select>

                    <label for="another-filter"></label>
                    <input type="text" id="another-filter" placeholder="">
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Date de consultation</th>
                            <th>Raison</th>
                            <th>Statut</th> <!-- Exemple de colonne de statut -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $consultation)
                            <tr>
                                <td>{{ $consultation->first_name }}</td>
                                <td>{{ $consultation->last_name }}</td>
                                <td>{{ $consultation->phone }}</td>
                                <td>{{ $consultation->consultation_date }}</td>
                                <td>{{ $consultation->consultation_reason }}</td>
                                <td class="status">{{ $consultation->status }}</td>
                                <!-- Exemple de colonne de statut -->

                                <td>
                                    <div class="actions">

                                        <a href="{{ route('consultations.edit', $consultation->id) }}"
                                            class="btn-modifier">Modifier</a>
                                        <form action="{{ route('consultations.destroy', $consultation->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-supprimer">Supprimer</button>
                                        </form>
                                        <a href="{{ route('consultation.pdf', ['id' => $consultation->id]) }}">Télécharger
                                            le PDF</a>
                                    </div>
                                    <div class="details">
                                        <div class="details-form">
                                            <div>
                                                <label for="first_name">Prénom:</label>
                                                <span>{{ $consultation->first_name }}</span>
                                            </div>
                                            <div>
                                                <label for="last_name">Nom:</label>
                                                <span>{{ $consultation->last_name }}</span>
                                            </div>
                                            <div>
                                                <label for="phone">Téléphone:</label>
                                                <span>{{ $consultation->phone }}</span>
                                            </div>
                                            <div>
                                                <label for="consultation_date">Date de consultation:</label>
                                                <span>{{ $consultation->consultation_date }}</span>
                                            </div>
                                            <div>
                                                <label for="consultation_reason">Raison:</label>
                                                <span>{{ $consultation->consultation_reason }}</span>
                                            </div>
                                            <div>
                                                <label for="status">Statut:</label>
                                                <span>{{ $consultation->status }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function toggleDetails(button) {
            const details = button.closest('tr').querySelector('.details');
            details.style.display = details.style.display === 'none' || details.style.display === '' ? 'block' : 'none';
        }

        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(
                    searchTerm));
                row.style.display = match ? '' : 'none';
            });
        });

        document.getElementById('filter-form').addEventListener('input', function() {
            const statusFilter = document.getElementById('status-filter').value.toLowerCase();
            const anotherFilter = document.getElementById('another-filter').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const statusCell = row.querySelector(
                    'td.status'); // Assurez-vous que la colonne de statut a la classe 'status'
                const anotherCell = row.querySelector(
                    'td.another'); // Assurez-vous que la colonne pour l'autre critère a la classe 'another'
                let match = true;

                if (statusFilter && statusCell) {
                    match = statusCell.textContent.toLowerCase().includes(statusFilter);
                }

                if (match && anotherFilter && anotherCell) {
                    match = anotherCell.textContent.toLowerCase().includes(anotherFilter);
                }

                row.style.display = match ? '' : 'none';
            });
        });
    </script>
</body>

</html>
