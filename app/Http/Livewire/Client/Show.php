<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $list = Client::all()->sortByDesc('created_at');

        return view('livewire.client.show', [ 'list' => $list ]);
        
    }

    public function saved()
    {
        $this->render();
    }

    public function deleteItem(Client $item)
    {
        $item->delete();
    }
}
