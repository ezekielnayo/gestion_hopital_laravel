<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visite Médicale</title>
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

        .contact-info {
            position: absolute;
            top: 20px;
            left: 200px;
            font-size: 12px;
            line-height: 1.4;
        }

        .container {
            margin-top: 200px;
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


    <!-- Informations de contact -->
    <div class="contact-info">
        <h2>Port Autonome de Lomé (PAL)</h2>
        <p>TEL : (+228) 22 27 26 27 / 22 23 78 00 / 22 27 47 42</p>
        <p>Email: togoport@togoport.tg</p>
        <p>Site web: www.togo-port.net</p>
    </div>

    <div class="container">
        <h1> VISITE  MEDICALE</h1>
        
        <div class="info">
            <label>Nom du Patient:</label>
            <span>{{ $visit->user->last_name }}</span>
        </div>
        <div class="info">
            <label>Prénom du Patient:</label>
            <span>{{ $visit->user->first_name }}</span>
        </div>
        <div class="info">
            <label>Email du Patient:</label>
            <span>{{ $visit->user->email }}</span>
        </div>
        <div class="info">
            <label>Motif:</label>
            <span>{{ $visit->reason }}</span>
        </div>
        <div class="info">
            <label>Date de la Visite:</label>
            <span>{{ \Carbon\Carbon::parse($visit->visit_date)->format('d/m/Y') }}</span>

        </div>
        <div class="info">
            <label>Observations:</label>
            <span>{{ $visit->observations }}</span>
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
