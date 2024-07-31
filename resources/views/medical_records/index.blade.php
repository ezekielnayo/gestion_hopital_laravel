@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dossiers Médicaux') }}</div>

                <div class="card-body">
                    <a href="{{ route('medical_records.create') }}" class="btn btn-success mb-3">
                        <i class="fas fa-plus"></i> Créer Nouveau Dossier Médical
                    </a>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Groupe Sanguin</th>
                                <th>Allergies</th>
                                <th>Date de Naissance</th>
                                <th>Antécédents Médicaux</th>
                                <th>Médicaments Actuels</th>
                                <th>Date de dernières consultations</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medicalRecords as $record)
                                <tr>
                                    <td>{{ $record->user->last_name }}</td>
                                    <td>{{ $record->user->first_name }}</td>
                                    <td>{{ $record->blood_group }}</td>
                                    <td>{{ $record->allergies }}</td>
                                    <td>{{ $record->date_of_birth }}</td>
                                    <td>{{ $record->medical_history }}</td>
                                    <td>{{ $record->current_medications }}</td>
                                    <td>{{ $record->date_consult }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-eye"></i> voir
                                        </a>
                                        <a href="{{ route('medical_records.edit', $record->id) }}" class="btn btn-warning btn-sm mr-1">
                                            <i class="fas fa-edit"></i> edit
                                        </a>
                                        <form action="{{ route('medical_records.destroy', $record->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Aucun dossier médical trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
