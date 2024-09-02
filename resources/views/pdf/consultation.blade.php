<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            margin: 0;
            position: relative;
            min-height: 100vh;
            font-size: 14px;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 150px;
            height: auto;
        }
        .passport-photo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 5px;
            object-fit: cover;
        }
        .container {
            margin-top: 120px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.75rem;
        }
        .info {
            margin-bottom: 15px;
        }
        .info label {
            font-weight: bold;
            display: inline-block;
            width: 180px;
        }
        .footer {
            margin-top: 40px;
            font-size: 0.85rem;
            color: #555;
            text-align: right;
        }
        .signature-section {
            margin-top: 50px;
            font-size: 0.85rem;
            text-align: right;
        }
        .signature-section .signature {
            display: inline-block;
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Logo à gauche -->
    <img src="{{ public_path('images/tg.png') }}" alt="Company Logo" class="logo">

    <!-- Photo de passeport à droite -->
    <img src="{{ asset($consultation->passport_photo) }}" alt="Photo de Passeport" class="passport-photo">

    <div class="container">
        <h1>Details de Consultation de {{ $consultation->first_name }}</h1>
        
        <div class="info">
            <label>First Name:</label>
            <span>{{ $consultation->first_name }}</span>
        </div>
        <div class="info">
            <label>Last Name:</label>
            <span>{{ $consultation->last_name }}</span>
        </div>
        <div class="info">
            <label>Consultation Date:</label>
            <span>{{ $consultation->consultation_date }}</span>
        </div>
        <div class="info">
            <label>Weight:</label>
            <span>{{ $consultation->weight }} kg</span>
        </div>
        <div class="info">
            <label>Temperature:</label>
            <span>{{ $consultation->temperature }} °C</span>
        </div>
        <div class="info">
            <label>Height:</label>
            <span>{{ $consultation->height }} cm</span>
        </div>
        <div class="info">
            <label>Blood Pressure:</label>
            <span>{{ $consultation->blood_pressure }}</span>
        </div>
        <div class="info">
            <label>Consultation Reason:</label>
            <span>{{ $consultation->consultation_reason }}</span>
        </div>
        <div class="info">
            <label>Symptoms:</label>
            <span>{{ $consultation->symptoms }}</span>
        </div>
        <div class="info">
            <label>Preliminary Diagnosis:</label>
            <span>{{ $consultation->preliminary_diagnosis }}</span>
        </div>
        <div class="info">
            <label>Medical History:</label>
            <span>{{ $consultation->medical_history }}</span>
        </div>
        <div class="info">
            <label>Chronic Diseases:</label>
            <span>{{ $consultation->chronic_diseases }}</span>
        </div>
        <div class="info">
            <label>Current Medications:</label>
            <span>{{ $consultation->current_medications }}</span>
        </div>
        <div class="info">
            <label>Dosage:</label>
            <span>{{ $consultation->dosage }}</span>
        </div>
        <div class="info">
            <label>Laboratory Tests:</label>
            <span>{{ $consultation->laboratory_tests }}</span>
        </div>
        <div class="info">
            <label>Test Results:</label>
            <span>{{ $consultation->test_results }}</span>
        </div>
        <div class="info">
            <label>Treatment Plan:</label>
            <span>{{ $consultation->treatment_plan }}</span>
        </div>
        <div class="info">
            <label>Follow Up:</label>
            <span>{{ $consultation->follow_up }}</span>
        </div>
        <div class="info">
            <label>Comments:</label>
            <span>{{ $consultation->comments }}</span>
        </div>
        <div class="info">
            <label>Phone:</label>
            <span>{{ $consultation->phone }}</span>
        </div>
    </div>

    <div class="footer">
        <p>Fait à Lomé, le : {{ $currentDate }}</p>
    </div>
    <div class="signature-section">
        <div>Cachet et signature du médecin</div>
        <div class="signature"></div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
