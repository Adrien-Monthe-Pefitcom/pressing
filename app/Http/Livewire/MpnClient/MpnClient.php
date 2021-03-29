<?php

namespace App\Http\Livewire\MpnClient;

use App\Models\Mpn_Client;
use Livewire\Component;

class MpnClient extends Component
{
    public $clients, $first_name, $last_name, $phone, $address, $dob, $client_id;
    public $isOpen = 0;

    public function render()
    {
        $this->clients = Mpn_Client::all();
        return view('livewire.mpn-client.mpn-client');
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'phone' => 'required',
        ]);
        Mpn_Client::updateOrCreate(['id' => $this->client_id], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'dob' => $this->dob
        ]);
        session()->flash('message', $this->client_id ? 'Client Updated Successfully.' : 'Client Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Mpn_client::find($id)->delete();
        session()->flash('message', 'Client Deleted Successfully.');
    }
    public function edit($id)
    {
        $client = Mpn_Client::findOrFail($id);
        $this->client_id = $id;
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->phone = $client->phone;
        $this->address = $client->address;
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
       $this->first_name = '';
       $this->last_name = '';
       $this->phone = '';
       $this->address = '';
    }
    
}
