<?php

namespace App\Http\Livewire\Cloth;

use App\Models\Cloth;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['saved'];

    public function render()
    {
        $list = Cloth::all()->sortByDesc('created_at');

        return view('livewire.cloth.show', [ 'list' => $list ]);
    }

    public function saved()
    {
        $this->render();
    }


    public function deleteItem(Cloth $item)
    {
        $item->delete();
    }

}
