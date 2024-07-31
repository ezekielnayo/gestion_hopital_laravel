@extends('app')

@section('content')
    @if($appointments->isNotEmpty())
	<div class="container">
        <h1>Liste des rendez-vous</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
       
        <div class="card mb-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Motif</th>
                           
                            <th>Date et Heure</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->motif }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                              
                                <td>
                                    <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ route('appointments.edit', ["appointment"=>$appointment->id]) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');">
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
        </div>
    </div>
    @else
	Pas de rendez-vous
    @endif
@endsection