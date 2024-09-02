@extends('app')

@section('content')
    <style>
        body {
            background-image: url('{{ asset('images/ookk.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 110vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Légère transparence avec fond blanc */
            border-radius: 25px;
            max-width: 600px; /* Largeur maximale du conteneur */
            box-shadow: 1 9px 16px rgba(0, 0, 0, 0.2); /* Ombre pour plus de relief */
        }

        input.form-control-lg {
            background-color: rgba(255, 255, 255, 0.5); /* Fond transparent des champs */
            border-radius: 10px; /* Légèrement arrondi */
            height: 50px; /* Augmentation de la hauteur des champs */
            padding-left: 20px; /* Espacement interne */
            font-size: 16px; /* Taille de police légèrement augmentée */
            width: 100%; /* Champs allongés pour occuper toute la largeur */
        }

        input.form-control-lg:focus {
            background-color: rgba(255, 255, 255, 0.8); /* Changement du fond sur focus */
            border-color: #0056b3; /* Changement de couleur de la bordure sur focus */
            box-shadow: none; /* Suppression de l'effet ombré par défaut de Bootstrap */
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-light shadow-sm">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/log.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Connexion</button>
                    </form>

                    <p class="text-center mt-3">
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection