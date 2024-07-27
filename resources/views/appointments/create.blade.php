@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Créer un Rendez-vous</h1>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="form-group">
            <label for="appointment_date">Date du Rendez-vous</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" required min="{{ date('Y-m-d') }}">
            @error('appointment_date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="motif">Motif</label>
            <input type="text" class="form-control" id="motif" name="motif" value="{{ old('motif') }}" >
            @error('motif')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button  class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
