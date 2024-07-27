@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Mon Dossier Médical</h1>

    @if($medicalRecords->isEmpty())
        <p>Aucun dossier médical trouvé.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date de Naissance</th>
                    <th>Historique Médical</th>
                    <th>Médicaments Actuels</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicalRecords as $record)
                    <tr>
                        <td>{{ $record->date_of_birth->format('d/m/Y') }}</td>
                        <td>{{ $record->medical_history }}</td>
                        <td>{{ $record->current_medications }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
