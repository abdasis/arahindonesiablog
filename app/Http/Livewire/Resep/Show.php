<?php

namespace App\Http\Livewire\Resep;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Show extends Component
{
    public $recipe;
    public function mount($resep)
    {
        $masakan = Http::get('https://masak-apa.tomorisakura.vercel.app/api/recipe/' . $resep);
        $this->recipe = $masakan['results'];
    }
    public function render()
    {
        return view('livewire.resep.show')->extends('layouts.app');
    }
}
