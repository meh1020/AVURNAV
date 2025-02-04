<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Données AVURNAV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Liste des Données AVURNAV</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>AVURNAV Local</th>
                <th>Île</th>
                <th>Vous signale</th>
                <th>Position</th>
                <th>Navire</th>
                <th>POB</th>
                <th>Type</th>
                <th>Caractéristiques</th>
                <th>Zone</th>
                <th>Dernière Communication</th>
                <th>Contacts</th>
            </tr>
        </thead>
        <tbody>
            @forelse($avurnavs as $avurnav)
                <tr>
                    <td>{{ $avurnav->id }}</td>
                    <td>{{ $avurnav->avurnav_local }}</td>
                    <td>{{ $avurnav->ile }}</td>
                    <td>{{ $avurnav->vous_signale }}</td>
                    <td>{{ $avurnav->position }}</td>
                    <td>{{ $avurnav->navire }}</td>
                    <td>{{ $avurnav->pob }}</td>
                    <td>{{ $avurnav->type }}</td>
                    <td>{{ $avurnav->caracteristiques }}</td>
                    <td>{{ $avurnav->zone }}</td>
                    <td>{{ $avurnav->derniere_communication }}</td>
                    <td>{{ $avurnav->contacts }}</td>
                    <td>
                        <form action="{{ route('avurnav.export', ['id' => $avurnav->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary mt-3">Exporter en PDF</button>
                        </form>
                    </td>

                </tr>
                
            @empty
                <tr>
                    <td colspan="12" class="text-center">Aucune donnée enregistrée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
