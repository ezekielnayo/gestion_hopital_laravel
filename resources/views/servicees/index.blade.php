<!-- resources/views/services/index.blade.php -->

@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Nos Services</h1>
    <p>Découvrez l'éventail complet de services médicaux et sociaux que nous proposons pour répondre à tous vos besoins en matière de santé et de bien-être.</p>

    <div class="row">
        <!-- Consultations Médicales -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-primary">Consultations Médicales</h3>
                    <p class="card-text">Nos médecins spécialistes offrent des consultations dans divers domaines de la médecine. Prenez rendez-vous pour des examens et des conseils personnalisés.</p>
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary text-white">Prendre Rendez-vous</a>
                </div>
            </div>
        </div>
        <!-- Soins d'Urgence -->
        <div class="col-md-4 mb-4">
            <div class="card border-danger shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-danger">Soins d'Urgence</h3>
                    <p class="card-text">Nos services d'urgence sont ouverts 24/7 pour traiter les situations critiques. Notre équipe est formée pour répondre rapidement à vos besoins.</p>
                    <a href="#" class="btn btn-danger text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Thérapies et Réhabilitation -->
        <div class="col-md-4 mb-4">
            <div class="card border-success shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-success">Thérapies et Réhabilitation</h3>
                    <p class="card-text">Nous offrons des thérapies et services de réhabilitation pour aider nos patients à retrouver leur bien-être après des blessures ou des maladies.</p>
                    <a href="#" class="btn btn-success text-white">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Médecine Préventive -->
        <div class="col-md-4 mb-4">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-info">Médecine Préventive</h3>
                    <p class="card-text">Nous proposons des examens réguliers, des vaccinations et des conseils pour maintenir votre santé optimale.</p>
                    <a href="#" class="btn btn-info text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Consultations Psychologiques -->
        <div class="col-md-4 mb-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-warning">Consultations Psychologiques</h3>
                    <p class="card-text">Nos psychologues offrent des consultations pour aider à gérer le stress, l'anxiété, et d'autres aspects de la santé mentale.</p>
                    <a href="#" class="btn btn-warning text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Services Sociaux -->
        <div class="col-md-4 mb-4">
            <div class="card border-secondary shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-secondary">Services Sociaux</h3>
                    <p class="card-text">Nous offrons un soutien social pour aider nos patients à naviguer dans les défis liés à la santé, y compris le soutien financier et les conseils.</p>
                    <a href="#" class="btn btn-secondary text-white">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Médecine du Travail -->
        <div class="col-md-4 mb-4">
            <div class="card border-dark shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-dark">Médecine du Travail</h3>
                    <p class="card-text">Nous offrons des consultations en médecine du travail pour évaluer et promouvoir la santé des employés en milieu professionnel.</p>
                    <a href="#" class="btn btn-dark text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Diététique et Nutrition -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-primary">Diététique et Nutrition</h3>
                    <p class="card-text">Nos nutritionnistes vous aident à élaborer des plans alimentaires adaptés à vos besoins pour maintenir une bonne santé.</p>
                    <a href="#" class="btn btn-primary text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Soins Palliatifs -->
        <div class="col-md-4 mb-4">
            <div class="card border-danger shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-danger">Soins Palliatifs</h3>
                    <p class="card-text">Nous proposons des soins palliatifs pour améliorer la qualité de vie des patients souffrant de maladies graves ou terminales.</p>
                    <a href="#" class="btn btn-danger text-white">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Radiologie -->
        <div class="col-md-4 mb-4">
            <div class="card border-success shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-success">Radiologie</h3>
                    <p class="card-text">Nous offrons des services de radiologie pour le diagnostic et le suivi de diverses conditions médicales.</p>
                    <a href="#" class="btn btn-success text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Physiothérapie -->
        <div class="col-md-4 mb-4">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-info">Physiothérapie</h3>
                    <p class="card-text">Nos physiothérapeutes vous aideront à récupérer des blessures et à améliorer votre mobilité.</p>
                    <a href="#" class="btn btn-info text-white">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Médecine Gériatrique -->
        <div class="col-md-4 mb-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-warning">Médecine Gériatrique</h3>
                    <p class="card-text">Nous offrons des soins spécialisés pour les personnes âgées, incluant la gestion des maladies chroniques et des conseils pour un vieillissement en bonne santé.</p>
                    <a href="#" class="btn btn-warning text-white">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
