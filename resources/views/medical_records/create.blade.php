// resources/views/medical-records/create.blade.php

@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Créer un Dossier Médical pour {{ $patient->first_name }} {{ $patient->last_name }}</h1>
    <form action="{{ route('medical-records.store', $patient) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date_of_birth">Date de Naissance</label>
            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required>
        </div>
        <div class="form-group">
            <label for="medical_history">Antécédents Médicaux</label>
            <textarea name="medical_history" class="form-control" id="medical_history" required></textarea>
        </div>
        <div class="form-group">
            <label for="current_medications">Médicaments Actuels</label>
            <textarea name="current_medications" class="form-control" id="current_medications" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
