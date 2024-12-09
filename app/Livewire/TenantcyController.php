<?php

namespace App\Livewire;

use Livewire\Component;

class TenantcyController extends Component
{
    public function render()
    {
        $tenants = "";

        return view('livewire.tenantcy', [
            'tenants' => $tenants,
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
