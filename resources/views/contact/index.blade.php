@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Nous Contacter</h1>
    <p>Contactez-nous pour plus d'informations ou pour prendre rendez-vous.</p>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Direction Générale</h3>
            <p><strong>Port Autonome de Lomé,</strong></p>
            <p>Lome Port Authority</p>
            <p><strong>Code Postal:</strong> 01 BP 1225 Lomé 01 Togo</p>
            <p><strong>E-mail:</strong> togoport@togoport.tg</p>
            <p><strong>Facebook:</strong> #portdelomeofficiel</p>
            <p><strong>Horaires:</strong></p>
            <ul>
                <li><strong>Lundi - Vendredi:</strong> 7h à 17h30</li>
                <li><strong>Samedi:</strong> 7h à 15h</li>
                <li><strong>Dimanche:</strong> Fermé</li>
            </ul>
            <p><strong>N° Vert:</strong> 80 00 18 18 / 80 00 00 18</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Nous Appeler</h3>
            <p><strong>N° Tél 1:</strong> +228 22 23 77 00</p>
            <p><strong>N° Tél 2:</strong> +228 22 23 77 77</p>
            <p><strong>N° Tél 3:</strong> +228 22 23 78 00</p>
            <p><strong>N° Tél 4:</strong> +228 22 27 47 42</p>
            <p><strong>Fax 1:</strong> +228 22 22 27 26</p>
            <p><strong>Fax 2:</strong> +228 22 27 02 48</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Formulaire de Contact</h3>
            <p>Pour toute information, veuillez nous envoyer un message.</p>
            <form>
                <div class="form-group">
                    <label for="name">Votre nom (requis)</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email (requis)</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text" class="form-control" id="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Direction Commerciale</h3>
            <p><strong>Tél:</strong> +228 22 27 02 96</p>
            <p><strong>Fax:</strong> +228 22 27 02 96 / 22 27 26 27</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Terminal du Sahel</h3>
            <p><strong>Tél:</strong> +228 22 50 20 84 / 22 25 20 76</p>
            <p><strong>Fax:</strong> +228 22 27 26 27</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Capitainerie du Port</h3>
            <p><strong>Tél:</strong> +228 22 27 04 57</p>
            <p><strong>Fax:</strong> +228 22 27 41 69</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Représentations</h3>
            <p><strong>Burkina Faso:</strong> Tél: +226 50 50 56 60 / 50 30 16 47, Mob: +226 79 03 06 55, Fax: +226 50 30 17 47</p>
            <p><strong>Niger:</strong> BP 1038 Niamey Niger, Tél: +227 20 74 03 26 / 21 79 48 73, Mob: +227 96 96 48 73, Fax: +227 20 74 03 27</p>
            <p><strong>Mali:</strong> Tél: +223 65 68 76 311, Fax: +223 20 22 85 23</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Communauté Portuaire</h3>
            <p><strong>A2PL:</strong> Alliance pour la Promotion du Port de Lomé, Tél: +228 22 27 47 42</p>
            <p><strong>Manutentionnaires:</strong></p>
            <p><strong>Togo Terminal:</strong> Tél: +228 22 23 73 50, Fax: +228 22 27 86 52 / 22 27 01 34</p>
            <p><strong>Lome Container Terminal:</strong> Tél: +228 22 53 70 25 / 22 53 70 06</p>
            <p><strong>TCL:</strong> Terminaux Conventionnels de Lomé, Tél: +228 22 27 93 59, Fax: +228 22 27 93 06</p>
            <p><strong>LMT:</strong> Lomé Multipurpose Terminal, Tél: +228 22 23 73 86, Fax: +228 22 23 73 77</p>
            <p><strong>Bolouda:</strong> Tél: +228 22 71 75 36</p>
            <p><strong>Necotrans:</strong> Tél: +228 22 27 93 84 / 22 27 93 59</p>
            <p><strong>OtoCI:</strong> Tél: +228 22 71 75 76 / 22 71 41 24, Fax: +228 22 71 75 97</p>
            <p><strong>Uniport:</strong> Tél: +228 22 20 23 27, Fax: +228 22 22 30 46</p>
            <p><strong>Expo Auto:</strong> Tél: +228 22 27 04 75, Fax: +228 22 27 04 76</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Guichet Unique du Commerce Extérieur</h3>
            <p><strong>SEGUCE:</strong> Société d’Exploitation du Guichet Unique du Commerce Extérieur, Tél: +228 22 23 90 00 / 22 20 69 20, Email: support@segucetogo.tg, www.segucetogo.tg</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Haut Conseil pour la Mer</h3>
            <p><strong>Tél:</strong> +228 22 27 88 27 / 22 23 41 35</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Représentations des Pays du Sahel au Togo</h3>
            <p><strong>CBC:</strong> Conseil Burkinabé des Chargeurs, Tél: +228 22 27 62 70, Fax: +228 22 27 02 79</p>
            <p><strong>CCI-BF:</strong> Chambre de Commerce et d’Industrie du Burkina Faso, Tél: +228 22 27 32 06, Fax: +228 22 27 01 57</p>
            <p><strong>CNUT:</strong> Conseil Nigérien des Utilisateurs des Transports Publics, Tél: +228 22 27 56 60, Fax: +228 22 27 00 58</p>
            <p><strong>NITRA:</strong> La Nigérienne de Transit, Tél: +228 22 27 05 69, Fax: +228 22 27 67 51</p>
            <p><strong>EMATO:</strong> Entrepôts Maliens au Togo, Tél: +228 22 27 48 40 / 22 23 77 00 Poste 45 41, Fax: +228 22 27 48 40</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Autres Partenaires</h3>
            <p><strong>Abinet Inros Lackner AG:</strong> Bureau de Lomé, Tél: +228 22 27 06 92 / +228 22 23 77 00 Poste 45 11</p>
            <p><strong>Cotecna:</strong> Société d’Administration du Scanner, Tél: +228 22 27 46 26, Fax: +228 22 71 31 89</p>
            <p><strong>CCIT:</strong> Chambre de Commerce et d’Industrie du Togo, Tél: +228 22 21 70 65, Fax: +228 22 21 47 30</p>
            <p><strong>Bureau des Douanes du PAL:</strong> Tél: +228 22 27 24 34 / 22 27 24 35 / 22 27 24 36, Fax: +228 22 27 02 48</p>
            <p><strong>Gendarmerie du Port:</strong> Tél: +228 22 23 77 00 Poste 42 16 / 42 17 / +228 22 27 31 60</p>
            <p><strong>Brigade Maritime:</strong> Tél: +228 22 23 77 00 Poste 42 05 ou 42 04 / +228 22 71 29 07</p>
            <p><strong>Commissariat de Police:</strong> Commissariat de Police du Port, Tél: +228 22 27 31 89</p>
            <p><strong>UNATROT:</strong> Union Nationale des Transporteurs Routiers du Togo, Tél: +228 22 23 77 43 / 22 27 47 42 Poste 45 43</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Médias Sociaux</h3>
            <p><strong>Suivez-nous sur les réseaux sociaux</strong></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Port en Eau Profonde</h3>
            <p><strong>N°1 en Afrique de l'ouest</strong> | Infrastructures et équipements modernes | Profondeur atteignant 16,60 mètres | Accueil des navires de 3ème génération</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Pourquoi Choisir le Port de Lomé</h3>
            <p><strong>Situation géographique stratégique</strong> | Rapidité des opérations | Port ouvert 24h/24 | Excellente connectivité avec les pays limitrophes</p>
        </div>
    </div>
</div>
@endsection
