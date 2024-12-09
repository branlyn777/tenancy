<?php

namespace App\Livewire;

use Livewire\Component;

class TenantcyController extends Component
{
    public function render()
    {
        $data = "";

        return view('livewire.tenantcy', [
            'data' => $data,
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
