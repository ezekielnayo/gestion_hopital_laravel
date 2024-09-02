@extends('app')

@section('content')

<!-- Section Découverte du CMS -->
<div class="container my-5">
    <h1 class="text-center mb-4">Découvrez le Centre Médico-Social du Port Autonome de Lomé</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h3 class="card-title text-primary">Port en Eau Profonde</h3>
                    <p class="card-text">
                        Avec une profondeur de 16,60 mètres, le Port Autonome de Lomé est le seul port en eau profonde de la côte ouest africaine. Cette caractéristique stratégique permet d'accueillir des navires de 3ème génération, assurant un accès optimal pour les services du CMS, et facilitant la livraison rapide de matériel médical et de fournitures.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <h3 class="card-title text-success">Sécurité Optimale des Biens</h3>
                    <p class="card-text">
                        Le Port Autonome de Lomé a mis en place un système avancé de télésurveillance des installations portuaires. Cette vigilance se reflète au CMS, garantissant la sécurité des dossiers médicaux et des informations personnelles des patients, tout en assurant un environnement de soins sécurisé pour les visiteurs et le personnel.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h3 class="card-title text-info">Position Stratégique</h3>
                    <p class="card-text">
                        Le Port du Togo est le seul port sur la côte ouest africaine permettant d'atteindre plusieurs capitales en une journée. Cette position stratégique bénéficie également au CMS, facilitant l'accès rapide aux services médicaux pour les employés du port, les familles des travailleurs, et les visiteurs du centre.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-dark mb-3">
                <div class="card-body">
                    <h3 class="card-title text-dark">Rapidité des Opérations</h3>
                    <p class="card-text">
                        L'efficacité des formalités administratives au Port Autonome de Lomé se traduit par une gestion rapide et fluide au CMS. Nous avons optimisé nos processus pour garantir un accès rapide aux soins médicaux, réduire les temps d'attente, et améliorer l'expérience des patients.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center my-4">À propos du Centre Médico-Social (CMS)</h2>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-secondary mb-3">
                <div class="card-body">
                    <h3 class="card-title text-secondary">Nos Services Médicaux</h3>
                    <p class="card-text">
                        Le CMS offre une large gamme de services médicaux, y compris des consultations spécialisées, des soins d'urgence, des examens de routine et des services de santé préventive. Notre équipe de médecins et de professionnels de santé est dédiée à fournir des soins de haute qualité et personnalisés.
                    </p>
                    <a href="{{ route('servicees.index') }}" class="btn btn-secondary">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h3 class="card-title text-primary">Horaires d'Ouverture</h3>
                    <ul class="list-unstyled">
                        <li><strong>Lundi - Vendredi :</strong> 8h00 – 18h00</li>
                        <li><strong>Samedi :</strong> 8h00 – 16h00</li>
                        <li><strong>Dimanche :</strong> 8h00 – 13h00</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <h3 class="card-title text-success">Prendre Rendez-vous</h3>
                    <p class="card-text">
                        Pour prendre rendez-vous avec nos médecins, vous pouvez utiliser notre plateforme en ligne ou nous contacter directement. Nous nous engageons à répondre rapidement à toutes vos demandes de rendez-vous pour assurer un suivi personnalisé.
                    </p>
                    <a href="{{ route('discover') }}" class="btn btn-success">Prendre Rendez-vous</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-dark mb-3">
                <div class="card-body">
                    <h3 class="card-title text-dark">Consulter Dossier Médical</h3>
                    <p class="card-text">
                        Accédez à votre dossier médical en ligne pour consulter vos informations de santé, résultats d'examen, et autres documents importants. Nous assurons la sécurité et la confidentialité de vos données.
                    </p>
                    <a href="{{ route('medical_records.index') }}" class="btn btn-dark">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h3 class="card-title text-info">Contact et Informations</h3>
                    <p class="card-text">
                        Pour toute question ou demande d'informations supplémentaires, n'hésitez pas à nous contacter. Nous sommes là pour vous aider et vous fournir toutes les informations dont vous avez besoin pour accéder à nos services.
                    </p>
                    <a href="{{ route('contact.index') }}" class="btn btn-info">Nous Contacter</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
