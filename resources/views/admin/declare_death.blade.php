<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclaration de Décès</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Déclaration de Décès</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('deaths.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Patient</label>
                <div class="d-flex">
                    <input type="text" id="patient-search" class="form-control" placeholder="Rechercher un patient...">
                    <button type="button" class="btn btn-secondary btn-search ml-2">Rechercher</button>
                </div>
                <select name="user_id" id="user_id" class="form-control mt-2" required>
                    <option value="">Sélectionnez un patient</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="death_date">Date du Décès</label>
                <input type="date" name="death_date" id="death_date" class="form-control" required>
                @error('death_date')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="death_time">Heure du Décès</label>
                <input type="time" name="death_time" id="death_time" class="form-control">
                @error('death_time')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="place_of_death">Lieu du Décès</label>
                <input type="text" name="place_of_death" id="place_of_death" class="form-control" required>
                @error('place_of_death')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cause_of_death">Cause du Décès</label>
                <input type="text" name="cause_of_death" id="cause_of_death" class="form-control">
                @error('cause_of_death')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="doctor_name">Nom du Declarant </label>
                <input type="text" name="doctor_name" id="doctor_name" class="form-control" required>
                @error('doctor_name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="certification_date">Date de Certification</label>
                <input type="date" name="certification_date" id="certification_date" class="form-control">
                @error('certification_date')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Déclarer le Décès</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Retour</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Script pour filtrer la liste des patients
        document.getElementById('patient-search').addEventListener('input', function() {
            var filter = this.value.toLowerCase();
            var options = document.querySelectorAll('#user_id option');
            options.forEach(function(option) {
                var text = option.textContent.toLowerCase();
                option.style.display = text.includes(filter) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
