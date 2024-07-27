<!-- resources/views/medical-records/index.blade.php -->

@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Mon Dossier Médical</h1>
    @if($medicalRecord)
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Dossier Médical de {{ Auth::user()->name }}</h3>
                <p><strong>Date de Naissance:</strong> {{ $medicalRecord->date_of_birth }}</p>
                <p><strong>Antécédents Médicaux:</strong> {{ $medicalRecord->medical_history }}</p>
                <p><strong>Médicaments Actuels:</strong> {{ $medicalRecord->current_medications }}</p>
                <!-- Ajoutez plus de détails si nécessaire -->
            </div>
        </div>
    @else
        <p>Votre dossier médical n'a pas encore été complété.</p>
    @endif
</div>
@endsection
