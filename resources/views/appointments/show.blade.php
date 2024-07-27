@extends('app')

@section('content')
    <div class="container">
        <h1>Détails du rendez-vous</h1>
        <div class="card mb-4">
            <div class="card-body">
            
                
                <p class="card-text"><strong>Date et Heure :</strong> {{ $appointment->appointment_date }}</p>
                <a href="{{ route('appointments.index') }}" class="btn btn-primary">Retour à la liste des rendez-vous</a>
                <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
