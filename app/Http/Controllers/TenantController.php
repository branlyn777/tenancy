<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
    
        // Verificar si algún tenant no tiene dominios, y agregar uno de manera dinámica si es necesario
        // foreach ($tenants as $tenant) {
        //     if ($tenant->domains->isEmpty()) {
        //         // Agregar un dominio de ejemplo de manera dinámica
        //         $tenant->setRelation('domains', collect([new \App\Models\Domain(['domain' => 'default.domain.test'])]));
        //     }
        // }
    
        return view('tenant', compact('tenants'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tenants,id',
        ]);

        $tenantName = $request->input('name');

        // Crea un nuevo tenant
        $tenant = Tenant::create(['id' => $tenantName]);
        $tenant->domains()->create(['domain' => "$tenantName.tenancy.test"]);

        return redirect()->route('tenant.index')->with('success', 'Tenant creado correctamente.');
    }
}
