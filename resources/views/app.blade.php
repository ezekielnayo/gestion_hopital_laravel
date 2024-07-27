<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Portuaire</title>
    <!-- Inclure AOS CSS dans la balise <head> -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href={{ asset ('css/slide.css')}} >

    <!-- Inclure AOS JS avant la balise de fermeture </body> -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
    
        .navbar-custom {
            background-color: #0056b3;
            transition: background-color 0.5s ease;
            padding: 1rem 2rem; /* Augmenter la hauteur de la barre de navigation */
        }
        .navbar-custom:hover {
            background-color: #004494;
        }
        .navbar-brand {
            font-size: 1.8em; /* Agrandir la taille du texte de la marque */
        }
        .navbar-brand img {
            max-height: 50px; /* Ajuster la taille de l'image */
            margin-right: 10px; /* Espacer l'image du texte */
        }
        .nav-link, .btn {
            transition: color 0.5s ease, background-color 0.5s ease;
            font-size: 1.2em; /* Agrandir la taille du texte des liens et des boutons */
        }
        .nav-link:hover, .btn:hover {
            color: #ffcc00;
            background-color: #003366;
        }
        .btn-primary, .btn-secondary {
            font-size: 1.1em; /* Agrandir la taille du texte des boutons */
            padding: 0.5rem 1rem; /* Agrandir le padding des boutons */
        }
        .navbar-nav.ml-auto {
            margin-left: auto;
        }
        .nav-item {
            margin-left: 1rem; /* Espacer les éléments de la barre de navigation */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            <img src="{{ asset('images/log.jpg') }}" alt="Logo">
            CMS-PAL
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('servicees.index') }}">Nos Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('news.index') }}">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('contact.index') }}">Nous Contacter</a>
                </li>
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="form-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger ml-2">Se déconnecter</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>
   
   
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com:aos@2.3.1/dist/aos.js"></script>

    <script>
    $(document).ready(function(){
        // Initialize AOS library
        AOS.init();
    });
</script>
</body>
</html>
