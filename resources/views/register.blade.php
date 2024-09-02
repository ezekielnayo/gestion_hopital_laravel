@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Logo Section -->
                <div class="text-center mb-4">
                    <img src="{{ asset('images/log.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tel">Phone</label>
                                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                    name="tel" value="{{ old('tel') }}" required>
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input id="adresse" type="text"
                                    class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                                    value="{{ old('adresse') }}" required>
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="passport_photo">Photo de Passeport</label>
                                <input id="passport_photo" type="file"
                                    class="form-control @error('passport_photo') is-invalid @enderror" name="passport_photo"
                                    accept="image/jpeg, image/png, image/jpg">
                                @error('passport_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>













                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- resources/views/auth/register.blade.php -->

                            <div class="form-group">
                                <label for="gender">Genre</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Sélectionner votre genre</option>
                                    <option value="male" @selected(old('gender') == 'male')>Homme</option>
                                    <option value="female" @selected(old('gender') == 'female')>Femme</option>
                                    <option value="other" @selected(old('gender') == 'other')>Autre</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-sm text-muted">Déjà inscrit ? <a href="{{ route('login') }}"
                                    class="text-primary">Connectez-vous ici</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
