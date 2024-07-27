@extends('app')

@section('content')
<div class="container">
    <h1>Détails de l'employé</h1>
    <p><strong>Nom :</strong> {{ $employee->last_name }}</p>
    <p><strong>Prénom :</strong> {{ $employee->first_name }}</p>
    <p><strong>Email :</strong> {{ $employee->email }}</p>
    <p><strong>Téléphone :</strong> {{ $employee->phone }}</p>
    <p><strong>Spécialité :</strong> {{ $employee->speciality }}</p>
    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
