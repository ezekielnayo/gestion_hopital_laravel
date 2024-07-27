// resources/views/medical-records/edit.blade.php

@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Éditer le Dossier Médical de {{ $medicalRecord->patient->first_name }} {{ $medicalRecord->patient->last_name }}</h1>
    <form action="{{ route('medical-records.update', $medicalRecord) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date_of_birth">Date de Naissance</label>
            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ $medicalRecord->date_of_birth }}" required>
        </div>
        <div class="form-group">
            <label for="medical_history">Antécédents Médicaux</label>
            <textarea name="medical_history" class="form-control" id="medical_history" required>{{ $medicalRecord->medical_history }}</textarea>
        </div>
        <div class="form-group">
            <label for="current_medications">Médicaments Actuels</label>
            <textarea name="current_medications" class="form-control" id="current_medications" required>{{ $medicalRecord->current_medications }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
@endsection
