@extends('app')

@section('content')
    <div class="container">
        <h1>Détails du patient</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">{{ $patient->first_name }} {{ $patient->last_name }}</h3>
                <p class="card-text"><strong>Email :</strong> {{ $patient->email }}</p>
                <!-- Ajouter d'autres détails ici si nécessaire -->
                <a href="{{ route('patients.index') }}" class="btn btn-primary">Retour à la liste des patients</a>
                <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
