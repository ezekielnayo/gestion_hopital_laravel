@extends('app')

@section('content')
    <div class="container">
        <h1>Liste des patients</h1>
        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Ajouter un patient</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->last_name }}</td>
                        <td>{{ $patient->first_name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
