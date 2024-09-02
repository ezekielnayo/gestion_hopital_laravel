<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Décès</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
            margin-top: 20px;
        }

        .img-thumbnail {
            max-width: 200px;
            height: auto;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('deaths.index') }}" class="btn btn-secondary mb-4">Retour à la Liste</a>
        <h1 class="mb-4">Modifier le Décès</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($death))
            <form action="{{ route('deaths.update', $death->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="user_id">Patient</label>
                    <select name="user_id" id="user_id" class="form-control" required onchange="updatePatientPhoto()">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $death->user_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->first_name }} {{ $patient->last_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Photo du Patient</label><br>
                    <img id="patient-photo"
                        src="{{ $death->user_id ? asset('storage/passport_photos/' . urlencode($patients->firstWhere('id', $death->user_id)->passport_photo)) : '' }}"
                        alt="Photo du Patient" class="img-thumbnail">
                </div>

                <div class="form-group">
                    <label for="death_date">Date du Décès</label>
                    <input type="date" name="death_date" id="death_date" class="form-control"
                        value="{{ $death->death_date }}" required>
                    @error('death_date')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="death_time">Heure du Décès</label>
                    <input type="time" name="death_time" id="death_time" class="form-control"
                        value="{{ $death->death_time ? date('H:i', strtotime($death->death_time)) : '' }}">
                    @error('death_time')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="place_of_death">Lieu du Décès</label>
                    <input type="text" name="place_of_death" id="place_of_death" class="form-control"
                        value="{{ $death->place_of_death }}" required>
                    @error('place_of_death')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cause_of_death">Cause du Décès</label>
                    <input type="text" name="cause_of_death" id="cause_of_death" class="form-control"
                        value="{{ $death->cause_of_death }}">
                    @error('cause_of_death')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="doctor_name">Nom du Médecin</label>
                    <input type="text" name="doctor_name" id="doctor_name" class="form-control"
                        value="{{ $death->doctor_name }}">
                    @error('doctor_name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="certification_date">Date de Certification</label>
                    <input type="date" name="certification_date" id="certification_date" class="form-control"
                        value="{{ $death->certification_date }}">
                    @error('certification_date')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                </div>
            </form>
        @else
            <div class="alert alert-danger">
                La donnée du décès n'est pas disponible.
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updatePatientPhoto() {
            const userId = document.getElementById('user_id').value;
            if (userId) {
                fetch(`/get-patient-photo/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('patient-photo').src = data.photoUrl;
                    });
            } else {
                document.getElementById('patient-photo').src = '';
            }
        }
    </script>
</body>

</html>
