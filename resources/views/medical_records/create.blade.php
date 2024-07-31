@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Créer Dossier Médical') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('medical_records.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="date_of_birth">Date de Naissance</label>
                            <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" required>
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Groupe Sanguin:</label>
                            <select name="blood_group" id="blood_group" class="form-control" required>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Avez-vous des antécédents médicaux?</label>
                            <div>
                                <label>
                                    <input type="radio" name="medical_history" value="1"> Oui
                                </label>
                                <label>
                                    <input type="radio" name="medical_history" value="0"> Non
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Utilisez-vous actuellement des médicaments?</label>
                            <div>
                                <label>
                                    <input type="radio" name="current_medications" value="1"> Oui
                                </label>
                                <label>
                                    <input type="radio" name="current_medications" value="0"> Non
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Avez-vous des allergies?</label>
                            <div>
                                <label>
                                    <input type="radio" name="allergies" value="1"> Oui
                                </label>
                                <label>
                                    <input type="radio" name="allergies" value="0"> Non
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_consult">Date de Dernières Consultations</label>
                            <input id="date_consult" type="date" class="form-control" name="date_consult" required>
                        </div>

                        <div class="form-group mb-0 btn_style">
                            <button type="submit" class="btn_create">Créer</button>
                            <a href="{{ route('medical_records.index') }}" class="btn_return">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
