@extends('app')

@section('content')
    <div class="container">
        <h1>Modifier le rendez-vous</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-body">
                @if($appointment->status === 'pending')
                    <form action="{{ route('appointments.update', ['appointment' => $appointment->id]) }}" method="POST">
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
                @else
                    <div class="alert alert-info">
                        Ce rendez-vous ne peut plus être modifié car il a deja été {{ $appointment->status }}.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
