@extends('app')

@section('content')
    <div class="container">
        <h1>Modifier le rendez-vous</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('appointments.update', ["appointment" =>$appointment->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="appointment_date">Date et Heure</label>
                        <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="motif">Motif</label>
                        <input type="text" name="motif" id="motif" class="form-control" value="{{ old('motif', $appointment->motif) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
@endsection
