@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dossier Médical') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('medical_records.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour à la Liste
                        </a>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Nom</th>
                            <td>{{ $user->last_name ?? 'Non disponible' }}</td>
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td>{{ $user->first_name ?? 'Non disponible' }}</td>
                        </tr>
                        <tr>
                            <th>Groupe Sanguin</th>
                            <td>{{ $medicalRecord->blood_group ?? 'Non disponible' }}</td>
                        </tr>
                        <tr>
                            <th>Allergies</th>
                            <td>{{ $medicalRecord->allergies ? 'Oui' : 'Non' }}</td>
                        </tr>
                        <tr>
                            <th>Date de Naissance</th>
                            <td>{{ \Carbon\Carbon::parse($medicalRecord->date_of_birth)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Antécédents Médicaux</th>
                            <td>{{ $medicalRecord->medical_history ? 'Oui' : 'Non' }}</td>
                        </tr>
                        <tr>
                            <th>Médicaments Actuels</th>
                            <td>{{ $medicalRecord->current_medications ? 'Oui' : 'Non' }}</td>
                        </tr>
                        <tr>
                            <th>Date de Dernières Consultations</th>
                            <td>{{ \Carbon\Carbon::parse($medicalRecord->date_consult)->format('d/m/Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
