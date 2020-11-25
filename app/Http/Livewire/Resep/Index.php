<?php

namespace App\Http\Livewire\Resep;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Index extends Component
{

    public $key;
    public function render()
    {

        if ($this->key) {
            $masakan = Http::get('https://masak-apa.tomorisakura.vercel.app//api/search/?q=' . $this->key);
        }else{
            $masakan = Http::get('https://masak-apa.tomorisakura.vercel.app/api/recipes');
        }
        return view('livewire.resep.index', [
            'recipes' => $masakan
        ])->extends('layouts.app');
    }
}
