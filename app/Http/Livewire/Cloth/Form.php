<?php

namespace App\Http\Livewire\Cloth;

use Livewire\Component;
use App\Models\Cloth;

class Form extends Component
{   
    public $type;
    public $material;
    public $color;
    public $state;
    public $price;
    public $description;

    protected $rules = [
        'description' => 'required|min:6',
        'material' => 'required',
        'color' => 'required',
        'price' => 'required',
        'type' => 'required'
    ];

    public function render()
    {
        return view('livewire.cloth.form');
    }

    public function createItem()
    {
        $this->validate();

        $item = new Cloth();
        $item->type = $this->type;
        $item->description = $this->description;
        $item->color = $this->color;
        $item->state = $this->state;
        $item->material = $this->material;
        $item->price = $this->price;
        $item->save();

        $this->emit('saved');
    }
}
