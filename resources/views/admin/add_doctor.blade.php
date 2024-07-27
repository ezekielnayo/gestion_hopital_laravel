<!-- resources/views/admin/add_doctor.blade.php -->
@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Ajouter un Médecin</h1>
    <form action="" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Spécialité</label>
            <input type="text" class="form-control" id="speciality" name="speciality" required>
        </div>
        <button  class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
