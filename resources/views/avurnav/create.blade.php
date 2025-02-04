<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVURNAV Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Formulaire AVURNAV</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/avurnav/store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="avurnav_local" class="form-label">AVURNAV LOCAL MADAGASCAR :</label>
            <input type="text" name="avurnav_local" id="avurnav_local" class="form-control">
        </div>
        <div class="mb-3">
            <label for="ile" class="form-label">ILE DE MADAGASCAR :</label>
            <input type="text" name="ile" id="ile" class="form-control">
        </div>
        <div class="mb-3">
            <label for="vous_signale" class="form-label">VOUS SIGNALE :</label>
            <input type="text" name="vous_signale" id="vous_signale" class="form-control">
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">1- Position :</label>
            <input type="text" name="position" id="position" class="form-control">
        </div>
        <div class="mb-3">
            <label for="navire" class="form-label">2- Navire :</label>
            <input type="text" name="navire" id="navire" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pob" class="form-label">3- POB :</label>
            <input type="number" name="pob" id="pob" class="form-control">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">4- Type :</label>
            <input type="text" name="type" id="type" class="form-control">
        </div>
        <div class="mb-3">
            <label for="caracteristiques" class="form-label">5- Caractéristiques :</label>
            <input type="text" name="caracteristiques" id="caracteristiques" class="form-control">
        </div>
        <div class="mb-3">
            <label for="zone" class="form-label">6- Zone :</label>
            <input type="text" name="zone" id="zone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="derniere_communication" class="form-label">7- Dernière Communication :</label>
            <input type="date" name="derniere_communication" id="derniere_communication" class="form-control">
        </div>
        <div class="mb-3">
            <label for="contacts" class="form-label">8- Contacts :</label>
            <input type="text" name="contacts" id="contacts" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
