@extends('app')

@section('content')


<!-- Section Parallax -->
<div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/slider-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-contant">
                    <h2>
                        <span class="center"><span class="icon"><img src="images/icon-logo.png" alt="#" /></span></span>
                        <a href="" class="typewrite" data-period="2000" data-type='[ "Bienvenue au Centre Medico-social", "Nous prenons soin de votre santé", "Nous sommes des experts !" ]'>
                        <span class="wrap"></span>
                        </a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jumbotron -->
<div class="jumbotron text-center">
    @if (isset($user))
        <h2>Bienvenue, {{ $user->first_name }} {{ $user->last_name }} au Centre Médico-Social du Port</h2>
    @else
        <h2>Bienvenue au Centre Médico-Social du Port</h2>
    @endif
    <p class="lead">Nous sommes là pour répondre à vos besoins de santé et de bien-être.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Découvrir</a>
</div>

<!-- Section Horaire -->
<div id="time-table" class="time-table-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="service-time one" style="background:#2895f1;">
                    <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
                    <h3>Cas d'urgence</h3>
                    <p>En cas d'urgence médicale, veuillez contacter immédiatement les services de secours en composant le 112.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="service-time middle" style="background:#0071d1;">
                    <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <h3>Horaires du CMS</h3>
                    <ul>
                        <li><span class="left">Lundi - Vendredi</span><span class="right">8h00 – 18h00</span></li>
                        <li><span class="left">Samedi</span><span class="right">8h00 – 16h00</span></li>
                        <li><span class="left">Dimanche</span><span class="right">8h00 – 13h00</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="service-time three" style="background:#0060b1;">
                    <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                    <h3>Heures d'ouverture</h3>
                    <p>Pour des soins de qualité, notre équipe médicale vous accueille du lundi au vendredi de 9h00 à 17h00. Les consultations du samedi se font uniquement sur rendez-vous, de 9h00 à 13h00. La clinique est fermée le dimanche.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Informations Supplémentaires -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Patients</h3>
                    <p class="card-text">Ajoutez, modifiez ou supprimez des informations sur les patients.</p>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary">Voir les patients</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Employés</h3>
                    <p class="card-text">Gérez les informations de vos employés et leur emploi du temps.</p>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary">Voir les employés</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Rendez-vous</h3>
                    <p class="card-text">Planifiez et gérez les rendez-vous des patients.</p>
                    <a href="{{ route('appointments.index') }}" class="btn btn-primary">Voir les rendez-vous</a>
                </div>
            </div>
        </div>
    </div>
</div>

@auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>
@endauth
@endsection
