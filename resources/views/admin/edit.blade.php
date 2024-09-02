<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier Consultation</title>
</head>
<style>
    .sidebar .titre1 h3 {
        font-size: 18px;
        /* Réduit la taille de la police */
        margin: 12px 0;
        /* Ajuste l'espacement autour des liens */
    }

    .sidebar .titre1 a {
        font-size: 12px;
        /* Réduit la taille de la police des liens */
        font-family: 'Arial', sans-serif;
        /* Définit la police des liens */
        text-decoration: none;
        /* Supprime le soulignement par défaut */
        color: white;
        /* Définit la couleur des liens */
        margin: 0 5px;
        /* Ajoute un espace horizontal de 5



    }
    

    .sidebar .titreP {
        font-size: 20px;
    }

    .sidebar .titre1 a:hover h3 {
        color: #007bff;
        /* Couleur du texte au survol */
    }

    .compte .form-inlinef {
        margin-left: auto;
    }

    .contenu {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        max-height: 5230vh;
        /* Ajustez selon vos besoins */
        overflow-y: auto;
    }
</style>

<body>
    <div class="nav">
        <ul class="items">
            <li class="zone-image">
                <img src="{{ asset('images/log.jpg') }}" alt=""
                    style="width: 60px; height: 60px; border-radius: 60%;">
            </li>
            <li class="compte">
                <form method="POST" action="{{ route('logout') }}" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger ml-2">Se déconnecter</button>
                </form>
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('consultations.update', $consultation->id) }}" method="POST" class="row">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="consultation_date">Date de consultation</label>
                        <input type="date" class="form-control" id="consultation_date" name="consultation_date"
                            value="{{ $consultation->consultation_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="weight">Poids</label>
                        <input type="number" class="form-control" id="weight" name="weight"
                            value="{{ $consultation->weight }}" required>
                    </div>
                    <div class="form-group">
                        <label for="temperature">Température</label>
                        <input type="number" class="form-control" id="temperature" name="temperature"
                            value="{{ $consultation->temperature }}" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Taille</label>
                        <input type="number" class="form-control" id="height" name="height"
                            value="{{ $consultation->height }}" required>
                    </div>
                    <div class="form-group">
                        <label for="blood_pressure">Tension artérielle</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure"
                            value="{{ $consultation->blood_pressure }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="consultation_reason">Raison de consultation</label>
                        <input type="text" class="form-control" id="consultation_reason" name="consultation_reason"
                            value="{{ $consultation->consultation_reason }}" required>
                    </div>
                    <div class="form-group">
                        <label for="symptoms">Symptômes</label>
                        <input type="text" class="form-control" id="symptoms" name="symptoms"
                            value="{{ $consultation->symptoms }}" required>
                    </div>
                    <div class="form-group">
                        <label for="preliminary_diagnosis">Diagnostic préliminaire</label>
                        <input type="text" class="form-control" id="preliminary_diagnosis"
                            name="preliminary_diagnosis" value="{{ $consultation->preliminary_diagnosis }}" required>
                    </div>
                    <div class="form-group">
                        <label for="follow_up">Suivi</label>
                        <input type="text" class="form-control" id="follow_up" name="follow_up"
                            value="{{ $consultation->follow_up }}" required>
                    </div>
                    <div class="form-group">
                        <label for="comments">Commentaires</label>
                        <input type="text" class="form-control" id="comments" name="comments"
                            value="{{ $consultation->comments }}">
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
