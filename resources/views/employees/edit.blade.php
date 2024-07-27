@extends('app')

@section('content')
<div class="container">
    <h1>Modifier l'employé</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
        </div>
        <div class="form-group">
            <label for="speciality">Spécialité</label>
            <input type="text" name="speciality" class="form-control" value="{{ $employee->speciality }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Annuler</a>
</div>
@endsection
