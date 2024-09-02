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
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="blood_group">Groupe Sanguin:</label>
                                <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" required>
                                    <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>
                                @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Avez-vous des antécédents médicaux?</label>
                                <div>
                                    <label>
                                        <input type="radio" name="medical_history" value="1" {{ old('medical_history') == '1' ? 'checked' : '' }}> Oui
                                    </label>
                                    <label>
                                        <input type="radio" name="medical_history" value="0" {{ old('medical_history') == '0' ? 'checked' : '' }}> Non
                                    </label>
                                </div>
                                @error('medical_history')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Utilisez-vous actuellement des médicaments?</label>
                                <div>
                                    <label>
                                        <input type="radio" name="current_medications" value="1" {{ old('current_medications') == '1' ? 'checked' : '' }}> Oui
                                    </label>
                                    <label>
                                        <input type="radio" name="current_medications" value="0" {{ old('current_medications') == '0' ? 'checked' : '' }}> Non
                                    </label>
                                </div>
                                @error('current_medications')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Avez-vous des allergies?</label>
                                <div>
                                    <label>
                                        <input type="radio" name="allergies" value="1" {{ old('allergies') == '1' ? 'checked' : '' }}> Oui
                                    </label>
                                    <label>
                                        <input type="radio" name="allergies" value="0" {{ old('allergies') == '0' ? 'checked' : '' }}> Non
                                    </label>
                                </div>
                                @error('allergies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date_consult">Date de Dernières Consultations</label>
                                <input id="date_consult" type="date" class="form-control @error('date_consult') is-invalid @enderror" name="date_consult" value="{{ old('date_consult') }}">
                                @error('date_consult')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
