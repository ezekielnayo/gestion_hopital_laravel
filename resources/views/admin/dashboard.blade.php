<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard Admin</title>
</head>

<body>
    <div class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt="" srcset=""
                    style="width: 60px; height: 60px; border-radius:60%;">
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
        <div class="contenu">
            <div class="ctn">
                <div class="ctn1">
                    <div class="ctn1-title">
                        <h3>Nombre de patients</h3>
                    </div>
                    <div class="icon-text">
                        <div class="icon-item">
                            <i class="fas fa-mars"></i>
                            <span>Hommes</span>
                            <div class="nbr">{{ $malePatients }}</div>
                        </div>
                        <div class="icon-item">
                            <i class="fas fa-venus"></i>
                            <span>Femmes</span>
                            <div class="nbr">{{ $femalePatients }}</div>
                        </div>
                        <div class="icon-item">
                            <i class="fas fa-users"></i>
                            <span>Total</span>
                            <div class="nbr">{{ $totalPatients }}</div>
                        </div>
                    </div>
                </div>
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
                <div class="ctn1">
                    <div class="ctn1-title">
                        <h3>Dossiers medicaux</h3>
                    </div>
                </div>
                <div class="ctn1">
                    <div class="ctn1-title">
                        <h3>consultation</h3>
                    </div>
                </div>
                <!-- Ajouter plus de sections si nécessaire -->
            </div>
        </div>
    </div>
</body>

</html>
