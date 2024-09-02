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
                    <div class="card-header bg-primary text-white">{{ __('Modifier Profil') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name">Prénom</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}" required autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Nom</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name', $user->last_name) }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone', $user->phone) }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address', $user->address) }}" required>
                                @error('address')
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
                                @if ($user->passport_photo)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/passport_photos/' . $user->passport_photo) }}"
                                            alt="Photo de Passeport" style="max-width: 100px;">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">Genre</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Sélectionner votre genre</option>
                                    <option value="male" @selected(old('gender', $user->gender) == 'male')>Homme</option>
                                    <option value="female" @selected(old('gender', $user->gender) == 'female')>Femme</option>
                                    <option value="other" @selected(old('gender', $user->gender) == 'other')>Autre</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Nouveau Mot de Passe (Laissez vide si vous ne voulez pas
                                    changer)</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmer le Mot de Passe</label>
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Mettre à jour
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-sm text-muted">Vous pouvez revenir à <a href="{{ route('home') }}"
                                    class="text-primary">l'accueil</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
