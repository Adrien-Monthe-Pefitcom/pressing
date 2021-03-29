<?php

namespace App\Http\Livewire\MpnClient;

use App\Models\Cloth;
use App\Models\Mpn_client;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Client_order extends Component
{
    use WithPagination;
    public $code, $status, $total_cost, $amount_perceived, $predicted_return, $return_status, $collected, $additional_intel, $client, $employee_id ,$order_id;
    public $isOpen = 0;
    public $cid;
    public function mount($id)
    {
        $this->cid = $id;
    }

    public function quickRandom($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $d=strtotime("today");
        return $d.'_'.substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public function render()
    {
        return view('livewire.order.order', [
            'orders' => Order::where('client_id', $this->cid)->orderBy('id', 'desc')->paginate(),
            'cloths' => Cloth::all(),
            'clients' => Mpn_client::all(),
        ]);
    }
    public function store()
    {
        $this->validate([
            'amount_perceived' => 'required',
            'total_cost' => 'required',
            'predicted_return' => 'required',
            'client' => 'required',
        ]);
        $order = Order::updateOrCreate(['id' => $this->order_id], [
            'code' => $this->quickRandom(6),
            'amount_percieved' => $this->amount_perceived,
            'predicted_return' => $this->predicted_return,
            'client_id' => intVal($this->client),
            'total_cost' => intval($this->total_cost),
            'employee_id' => Auth::user()->id,
            'status' => $this->status,
        ]);
       
        session()->flash('message', $this->order_id ? 'Order Updated Successfully.' : 'Order Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Order::find($id)->delete();
        session()->flash('message', 'Order Deleted Successfully.');
    }
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $this->order_id = $id;
        $this->code = $order->code;
        $this->status = $order->content;
        $this->total_cost = $order->total_cost;
        $this->amount_perceived = $order->amount_perceived;
        $this->predicted_return = $order->predicted_return;
        $this->collected = $order->collected;
        $this->client = $order->client_id;
        $this->additional_intel = $order->additional_intel;
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
        $this->order_id = '';
        $this->code = '';
        $this->status = null;
        $this->total_cost = '';
        $this->amount_perceived = '';
        $this->predicted_return = null;
        $this->collected = '';
        $this->client = null;
        $this->additional_intel = '';
    }

    
}
