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
    </style>
</head>

<body>
    <div class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt=""
                    style="width: 60px; height: 60px; border-radius:50%;">
            </li>
            <li class="zone-recherche"><input type="search" placeholder="Rechercher.."></li>
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
                    <h3>Dossiers Médicaux</h3>
                </a>
            </div>
            <div class="titre1">
                <a href="{{ route('admin.consulter') }}">
                    <h3>Consultation</h3>
                </a>
            </div>
        </div>

        <div class="contenu">
            <div class="ctn">
                <div class="ctn1">
                    <div class="ctn1-title">
                        <h3>Nombre de rendez-vous</h3>
                    </div>
                    <div class="icon-text">
                        <div class="icon-item">
                            <i class="fas fa-calendar-check"></i>
                            <span>Total</span>
                            <div class="nbr">{{ $totalAppointments }}</div>
                        </div>
                    </div>
                </div>
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
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="status-{{ $appointment->status }}">
                            <td>{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</td>
                            <td>{{ $appointment->user->phone }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->motif }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                    method="POST" style="display:inline;">
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
</body>

</html>
