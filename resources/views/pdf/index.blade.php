<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste des Patients</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            width: 100%;
            height: 100%;
            background-image: url('{{ public_path('images/log.jpg') }}');
            background-size: 180%;
            background-position: center;
            background-repeat: no-repeat;
            -webkit-print-color-adjust: exact;
        }

        .content {
            position: relative;
            z-index: 1;
            padding: 30px 50px; /* Ajustement du padding pour rapprocher le contenu du bord */
            background-color: rgba(255, 255, 255, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0px; /* Réduction de la marge supérieure pour rapprocher le tableau du titre */
            background-color: rgba(249, 249, 349, 0.3);
        }

        table,
        th,
        td {
            border: 2px solid rgba(221, 221, 221, 0.5);
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgba(0, 123, 255, 0.4);
            color: white;
        }

        tr:nth-child(even) {
            background-color: rgba(242, 242, 242, 0.3);
        }

        td {
            color: #000;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px; /* Réduction de la marge inférieure du titre pour rapprocher le tableau */
            text-decoration: underline;
            color: #000;
        }

        .footer {
            position: absolute;
            bottom: 80px;
            right: 50px;
            font-size: 0.85rem;
            color: #555;
            text-align: right;
        }

        .signature-section {
            position: absolute;
            bottom: 30px;
            right: 50px;
            font-size: 0.85rem;
            text-align: right;
        }

        .signature-section .signature {
            display: inline-block;
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>LISTE DES PATIENTS</h1>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>TELEPHONE</th>
                    <th>EMAIL</th>
                    <th>SEXE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->last_name }}</td>
                        <td>{{ $patient->first_name }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ ucfirst($patient->gender) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Fait à Lomé, le : {{ $currentDate }}</p>
    </div>
    <div class="signature-section">
        <div>Cachet et signature du médecin</div>
        <div class="signature"></div>
    </div>
</body>

</html>
