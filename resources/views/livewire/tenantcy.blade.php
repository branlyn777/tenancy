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