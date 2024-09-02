<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard Admin</title>
    <style>
        /* Début du CSS */

        * {
            font-weight: normal;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: white;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        .nav {
            position: fixed;
            top: 0;
            background: rgb(0, 0, 0);
            width: 100%;
            height: 100px;
            margin-bottom: 100px;
        }

        .items {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul li {
            list-style: none;
        }

        li a {
            text-decoration: none !important;
        }

        .links {
            display: flex;
            justify-content: space-between;
            align-items: center !important;
        }

        .logout {
            padding: 8px;
            background: #5c0b0bbc;
            color: white !important;
            border-radius: 5px;
            margin: 6px;
        }

        .menu {
            display: none !important;
        }

        .fav-menu {
            background: #fff;
            color: black !important;
            border: none !important;
            outline: none !important;
            padding: 10px;
            margin-right: 8px;
            border-radius: 4px;
        }

        .logout:hover {
            color: #fff !important;
            background-color: #3498db !important;
            transition: 1.9s;
        }

        .zone-image {
            background-color: white;
            border-radius: 50%;
            height: 60px;
            width: 60px;
        }

        .containerP {
            margin-left: 15%;
            margin-top: 100px;
            padding: 20px;
            background-color: aliceblue;
            height: 100vh;
            width: calc(100% - 15%);
        }

        .sidebar {
            top: 0;
            left: 0;
            position: fixed;
            height: 100vh;
            background-color: black;
            height: 100%;
            width: 15%;
            flex: 1;

            color: white;
            margin-top: 100px;
            overflow: auto;
            transition: all 0.3s ease;
        }

        .titreP {
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgb(21, 123, 211);
            text-decoration: underline;
        }

        .titre1 {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .titre1 a:hover {
            color: rgb(21, 123, 211);
        }

        .titre1 a {
            text-decoration: none;
            color: #fff;
        }

        .contenu {
            top: 0;
            height: 100%;
            width: 100%;
            justify-content: center;
        }

        .ctn {
            display: grid;
            align-items: center;
            justify-items: center;
            grid-template-columns: repeat(4, 1fr);
            height: 50%;
            gap: 5px;
        }

        .ctn1 {
            border: 1px solid white;
            width: 250px;
            height: 240px;
            background-color: aliceblue color: white;
            border-radius: 10px;
        }

        .ctn1-title {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: underline;
        }

        .icon-text {
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
        }

        .icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .icon-item i {
            font-size: 24px;
            color: #3498db;
            margin-bottom: 5px;
        }

        .nbr {
            height: 20px;
            width: 20px;
            border: 2px solid gray;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
            font-size: 22px;
        }

        .consulte_btn {
            background-color: #3498db;
            height: 200px;
            width: 820px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            justify-content: space-between;
            justify-content: space-around;
            position: relative;
        }

        .consulte_btn button {
            outline: none;
            width: 185px;
            height: 45px;
            word-spacing: 3px;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 15px;
            border: 2px solid #fff;
            font-size: 0.9rem;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .consulte_btn button:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        /* Couleurs pour chaque .ctn1 */
        .ctn1-patients {
            background-color: #1abc9c;
            /* Couleur pour le nombre de patients */
        }

        .ctn1-treatments {
            background-color: #e67e22;
            /* Couleur pour les traitements */
        }

        .ctn1-appointments {
            background-color: #f39c12;
            /* Couleur pour les rendez-vous */
        }

        .ctn1-appointment {
            background-color: yellow;
            /* Couleur pour les rendez-vous */
        }

        .ctn1-appointmen {
            background-color: #b2beb5;
            /* Couleur pour les rendez-vous */
        }

    .ctn1-medical-visits {
            background-color: #000000;
            color: white;
            /* Couleur pour les rendez-vous */
        }

        .ctn1-records {
            background-color: #9b59b6;
            /* Couleur pour les dossiers médicaux */
        }

        .ctn1-mortalities {
            background-color: #3498db;
            /* Couleur pour les mortalités */
        }





        /* Responsive Design */
        @media (max-width: 768px) {
            .containerP {
                margin-left: 0;
                margin-top: 40px;
                padding: 0;
                width: 100%;
                align-items: center;
                justify-content: center;
            }

            .contenu {
                margin-top: 125px;
            }

            .menu {
                display: block !important;
            }

            .compte {
                display: none;
            }

            .sidebar {
                left: -256px;
                width: 0%;
            }

            .ctn {
                grid-template-columns: 1fr;
                width: 100%;
            }
        }

        .menu {
            padding-right: 20px;
        }

        .logout-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex: 1;
        }

        .btn-danger {
            padding: 12px 20px;
            background-color: #ff0000;
            margin-left: 950px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #cc0000;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <nav class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt="" srcset=""
                    style="width: 60px; height: 60px; border-radius:60%;">
            </li>
            <li class="logout-container">
                <ul class="links">
                    <form method="POST" action="{{ route('logout') }}" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Se déconnecter</button>
                    </form>
                </ul>
            </li>
            <li class="menu">
                <button class="fav-menu">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
    </nav>

    <div class="containerP">
        <aside class="sidebar">
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
        </aside>

        <main class="contenu">
            <div class="ctn">
                <div class="ctn1 ctn1-patients">
                    <div class="ctn1-title">
                        <h2>Nombre de patients</h2>
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

                <div class="ctn1 ctn1-treatments">
                    <div class="ctn1-title">
                        <h2>Traitements</h2>
                    </div>
                    <div class="icon-text">
                        <div class="icon-item">
                            <i class="fas fa-heartbeat"></i>
                            <span>En cours</span>
                            <div class="nbr">{{ $ongoingConsultations }}</div>
                        </div>
                        <div class="icon-item">
                            <i class="fas fa-check"></i>
                            <span>Terminés</span>
                            <div class="nbr">{{ $completedConsultations }}</div>
                        </div>
                    </div>
                </div>

                <div class="ctn1 ctn1-appointments">
                    <div class="ctn1-title">
                        <h2>Rendez-vous</h2>
                    </div>
                    <div class="icon-text">
                        <div class="icon-item">
                            <i class="fas fa-calendar-check"></i>
                            <span>Acceptés</span>
                            <div class="nbr">{{ $acceptedAppointments }}</div>
                        </div>
                        <div class="icon-item">
                            <i class="fas fa-calendar-times"></i>
                            <span>Rejetés</span>
                            <div class="nbr">{{ $rejectedAppointments }}</div>
                        </div>
                    </div>
                </div>

                <div class="ctn1 ctn1-records">
                    <div class="ctn1-title">
                        <h2>Dossiers médicaux</h2>
                    </div>
                    <div class="icon-text">
                        <div class="icon-item">
                            <i class="fas fa-folder-open"></i>
                            <span>Créés des patients</span>
                            <div class="nbr">{{ $medicalRecordsCreated }}</div>
                        </div>
                    </div>
                </div>
                <div class="ctn1 ctn1-mortalities">
                    <div class="ctn1-title">
                        <h2>Mortalités</h2>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-skull-crossbones"></i>
                        <div>Totals</div>
                        <div class="nbr">{{ $totalDeaths }}</div>

                    </div>
                </div>
                <div class="ctn1 ctn1-appointment">
                    <div class="ctn1-title">
                        <h2>Nombres d'attentes</h2>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-hourglass-half"></i>
                        <span>En attente</span>
                        <div class="nbr">{{ $pendingAppointments }}</div>
                    </div>
                </div>
                <div class="ctn1 ctn1-appointmen">
                    <div class="ctn1-title">
                        <h2>Total des rendez-vous </h2>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>totals</span>
                        <div class="nbr">{{ $totalAppointments }}</div>
                    </div>
                </div>
                <div class="ctn1 ctn1-medical-visits">
                    <div class="ctn1-title">
                        <h2>Visites Médicales</h2>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-stethoscope"></i>
                        <span>Total</span>
                        <div class="nbr">{{ $totalMedicalVisits }}</div>
                    </div>
                </div>


            </div>
    </div>
    </main>
    </div>
</body>

</html>
