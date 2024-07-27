@extends('app')

@section('content')
    <div class="container">
        <h1>Liste des Medecins </h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Ajouter un employé</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>

                    <th>speciality</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->speciality }}</td>
                        <td>
                            <!-- Lien pour afficher un employé spécifique -->
                            <a href="{{ route('employees.show', ['employee' => $employee->id]) }}" class="btn btn-info btn-sm">Afficher</a>

                            <!-- Lien pour éditer un employé -->
                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Formulaire pour supprimer un employé -->
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
