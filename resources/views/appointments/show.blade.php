@extends('app')

@section('content')
    <div class="container">
        <h1>Détails du rendez-vous</h1>
        <p>Motif: {{ $appointment->motif }}</p>
        <p>Date et Heure: {{ $appointment->appointment_date }}</p>
        <p>État: 
            @if($appointment->status === 'accepted')
                Accepté
            @elseif($appointment->status === 'refused')
                Refusé
            @else
                En attente
            @endif
        </p>
        <a href="{{ route('appointments.index') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
@endsection
