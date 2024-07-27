@extends('app')

@section('content')

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/bg1.png') }}" class="d-block w-100" alt="First slide">
              <h3>Un Accueil Chaleureux</h3>
            <p>Découvrez notre centre médical où chaque patient est accueilli avec chaleur et professionnalisme. Nous mettons tout en œuvre pour vous offrir des soins de qualité.</p>
    
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/clinic_03.jpg') }}" class="d-block w-100" alt="Second slide">
            <h3>Des Soins Personnalisés</h3>
            <p>Nos équipes médicales vous offrent des soins personnalisés adaptés à vos besoins spécifiques. Votre santé est notre priorité.</p>
    
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/clinic_01.jpg') }}" class="d-block w-100" alt="Third slide">
            
            <h3>Un Engagement envers l'Excellence</h3>
            <p>Nous nous engageons à fournir des services médicaux d'excellence. Grâce à nos installations modernes et à notre personnel qualifié, nous visons à améliorer votre bien-être.</p>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Jumbotron d'accueil -->
<div class="jumbotron text-center bg-info text-white mb-4" style="padding: 4rem 2rem; border-radius: 0.5rem;">
    @if (isset($user))
        <h2 class="display-4">Bienvenue, {{ $user->first_name }} {{ $user->last_name }} au Centre Médico-Social du Port</h2>
    @else
        <h2 class="display-4">Bienvenue au Centre Médico-Social du Port</h2>
    @endif
    <p class="lead text-warning">Nous sommes là pour répondre à vos besoins de santé et de bien-être.</p>
    <a class="btn btn-light btn-lg" href="{{ route('discover') }}" role="button">Découvrir</a>
</div>

<!-- Sections de gestion -->
<div class="container">
    <div class="row mb-4">
        <!-- Cas d'urgence -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-primary">Cas d'urgence</h3>
                    <p class="card-text text-danger">En cas d'urgence médicale, veuillez contacter immédiatement les services de secours en composant le 112.</p>
                </div>
            </div>
        </div>
        <!-- Horaires du CMS -->
        <div class="col-md-4 mb-4">
            <div class="card border-success shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-success">Horaires du CMS</h3>
                    <ul class="list-unstyled">
                        <li><strong>Lundi - Vendredi :</strong> <span class="text-secondary">8h00 – 18h00</span></li>
                        <li><strong>Samedi :</strong> <span class="text-secondary">8h00 – 16h00</span></li>
                        <li><strong>Dimanche :</strong> <span class="text-secondary">8h00 – 13h00</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Heures d'ouverture -->
        <div class="col-md-4 mb-4">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-info">Heures d'ouverture</h3>
                    <p class="card-text text-secondary">Pour des soins de qualité, notre équipe médicale vous accueille du lundi au vendredi de 9h00 à 17h00. Les consultations du samedi se font uniquement sur rendez-vous, de 9h00 à 13h00. La clinique est fermée le dimanche.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sections de gestion -->
    @auth
        <div class="row mb-4">
            <!-- Prendre Rendez-vous -->
            <div class="col-md-6 mb-4">
                <div class="card border-dark shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title text-dark">Prendre Rendez-vous</h3>
                        <p class="card-text text-secondary">Prenez rendez-vous avec nos médecins pour un suivi personnalisé.</p>
                        <a href="{{ route('appointments.create') }}" class="btn btn-dark text-white">Prendre Rendez-vous</a>
                    </div>
                </div>
            </div>
            <!-- Consulter Dossier Médical -->
            <div class="col-md-6 mb-4">
                <div class="card border-primary shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary">Consulter Dossier Médical</h3>
                        <p class="card-text text-secondary">Accédez à votre dossier médical pour consulter vos informations et résultats.</p>
                        <a href="{{ route('medical.records') }}" class="btn btn-primary text-white">Consulter</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <!-- Sections supplémentaires -->
    <div class="row mb-4">
        <!-- Nos Services -->
        <div class="col-md-4 mb-4">
            <div class="card border-dark shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-dark">Nos Services</h3>
                    <p class="card-text text-secondary">Découvrez nos services médicaux et sociaux.</p>
                    <a href="{{ route('servicees.index') }}" class="btn btn-dark text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Actualités -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-primary">Actualités</h3>
                    <p class="card-text text-secondary">Les dernières nouvelles de notre centre.</p>
                    <a href="{{ route('news.index') }}" class="btn btn-primary text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Nous Contacter -->
        <div class="col-md-4 mb-4">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-info">Nous Contacter</h3>
                    <p class="card-text text-secondary">Contactez-nous pour plus d'informations ou pour prendre rendez-vous.</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-info text-white">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>

























@endsection
