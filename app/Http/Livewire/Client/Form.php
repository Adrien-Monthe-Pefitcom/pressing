<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;

class Form extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $address;

    protected $rules = [
        'first_name' => 'required',
        'phone' => 'required'
    ];
    public function render()
    {
        return view('livewire.client.form');
    }

    public function createItem()
    {
        $this->validate();

        $item = new Client();
        $item->first_name = $this->first_name;
        $item->last_name = $this->last_name;
        $item->phone = $this->phone;
        $item->address = $this->address;
        $item->save();

        $this->emit('saved');

    }

}
