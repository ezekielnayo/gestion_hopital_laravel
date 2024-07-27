<!-- resources/views/employee/dashboard.blade.php -->

@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Tableau de bord de l'employé</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Gérer les Patients</h3>
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Créer un Dossier Médical</a>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Gérer les Rendez-vous</h3>
            <a href="{{ route('appointments.index') }}" class="btn btn-primary">Voir les Rendez-vous</a>
        </div>
    </div>

    <h2>Patients</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Rendez-vous</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Patient</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                <td>
                    <!-- Actions comme voir, éditer, supprimer -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
