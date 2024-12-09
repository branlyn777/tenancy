<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-white">
    <div class="container text-center mt-5">
        <h1 class="display-4 font-weight-bold">Crear nuevo tenant</h1>
        <p class="mt-4 lead">Nombre del Tenant</p>

        <div class="card mx-auto mt-4 bg-secondary text-white" style="max-width: 30rem;">
            <div class="card-body">
                <form action="{{ route('tenant.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del Tenant:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Crear Tenant</button>
                </form>                
            </div>
        </div>

        <div class="mt-5">
            <h2 class="h4">Tenants creados</h2>
            @foreach ($tenants as $tenant)
                <div class="card mt-4 bg-secondary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Tenant ID: {{ $tenant->id }}</h5>
                        <p class="card-text">
                            <a href="http://{{ $tenant->domains->first()->domain }}:8000/login" class="btn btn-link text-light">
                                Ir a la página del Tenant
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
