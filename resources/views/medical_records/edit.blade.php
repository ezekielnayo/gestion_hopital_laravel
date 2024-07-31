@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Modifier Dossier Médical') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('medical_records.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour à la Liste
                        </a>
                    </div>

                    <form method="POST" action="{{ route('medical_records.update', $medicalRecord->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="date_of_birth">Date de Naissance</label>
                            <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $medicalRecord->date_of_birth) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Groupe Sanguin:</label>
                            <select name="blood_group" id="blood_group" class="form-control" required>
                                <option value="A+" {{ $medicalRecord->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ $medicalRecord->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="AB+" {{ $medicalRecord->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ $medicalRecord->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="B+" {{ $medicalRecord->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ $medicalRecord->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="O+" {{ $medicalRecord->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ $medicalRecord->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Avez-vous des antécédents médicaux?</label>
                            <div>
                                <label>
                                    <input type="radio" name="medical_history" value="1" {{ $medicalRecord->medical_history == '1' ? 'checked' : '' }}> Oui
                                </label>
                                <label>
                                    <input type="radio" name="medical_history" value="0" {{ $medicalRecord->medical_history == '0' ? 'checked' : '' }}> Non
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Utilisez-vous actuellement des médicaments?</label>
                            <div>
                                <label>
                                    <input type="radio" name="current_medications" value="1" {{ $medicalRecord->current_medications == '1' ? 'checked' : '' }}> Oui
                                </label>
                                <label>
                                    <input type="radio" name="current_medications" value="0" {{ $medicalRecord->current_medications == '0' ? 'checked' : '' }}> Non
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Avez-vous des allergies?</label>
                            <div>
                                <label>
                                    <input type="radio" name="allergies" value="1" {{ $medicalRecord->allergies == '1' ? 'checked' : '' }}> Oui
                                </label>
                                <label>
                                    <input type="radio" name="allergies" value="0" {{ $medicalRecord->allergies == '0' ? 'checked' : '' }}> Non
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_consult">Date de dernières consultations</label>
                            <input id="date_consult" type="date" class="form-control" name="date_consult" value="{{ old('date_consult', $medicalRecord->date_consult) }}" required>
                        </div>

                        <div class="form-group mb-0 btn_style">
                            <button type="submit" class="btn_create">Enregistrer les modifications</button>
                            <a href="{{ route('medical_records.index') }}" class="btn_return">Retour</a>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
