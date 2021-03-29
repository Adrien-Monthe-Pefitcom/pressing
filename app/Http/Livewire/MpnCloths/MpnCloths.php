<?php

namespace App\Http\Livewire\MpnCloths;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Tag;
use App\Models\Cloth;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MpnCloths extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $type, $material, $color, $description, $state, $price, $collected, $return_status, $id_order, $client_id;
    public $tagids = array();
    public $isOpen = 0;

    public function render()
    {
        return view('livewire.mpn-cloths.mpn-cloths', [
            'orders' => Order::orderBy('id', 'desc')->paginate(),
            'cloths' => Cloth::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'type' => 'required',
            'material' => 'required',
            'color' => 'required',
            'price' => 'required',
            'id_order' => 'required',
        ]);
        // Update or Insert Post
        $cloth = Cloth::updateOrCreate(['id' => $this->post_id], [
            'type' => $this->type,
            'material' => $this->content,
            'id_order' => intVal($this->order),
            'color' => $this->color,
            'price' => $this->price,
            'state' => $this->state,
            'description' => $this->description,
            'collected' => $this->collected,
            'return_status' => $this->return_status,
        ]);

        // Post Tag mapping
        if (count($this->tagids) > 0) {
            DB::table('cloth_tag')->where('cloth_id', $cloth->id)->delete();
            foreach ($this->tagids as $tagid) {
                DB::table('cloth_tag')->insert([
                    'cloth_id' => $cloth->id,
                    'tag_id' => intVal($tagid),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        session()->flash('message', $this->cloth_id ? 'Cloth Updated Successfully.' : 'Cloth Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Cloth::find($id)->delete();
        DB::table('cloth_tag')->where('cloth_id', $id)->delete();
        session()->flash('message', 'Cloth Deleted Successfully.');
    }
    public function edit($id)
    {
        $cloth = Cloth::with('tags')->findOrFail($id);
        $this->client_id = $id;
        $this->type = $cloth->type;
        $this->material = $cloth->material;
        $this->state = $cloth->state;
        $this->description = $cloth->description;
        $this->color = $cloth->color;
        $this->price = $cloth->price;
        $this->collected = $cloth->collected;
        $this->return_status = $cloth->return_status;
        $this->id_order = $cloth->id_order;
        $this->tagids = $cloth->tags->pluck('id');
        $this->openModal();
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields()
    {
        $this->client_id = null;
        $this->type = null;
        $this->material = null;
        $this->state = null;
        $this->description = null;
        $this->color = null;
        $this->price = null;
        $this->collected = null;
        $this->return_status = null;
        $this->id_order = null;
        $this->tagids = null;
    }
}
