<?php

namespace App\Http\Livewire\Order;


use App\Models\Order;
use App\Models\Mpn_client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Mpn_Order extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $code, $status, $total_cost, $amount_perceived, $predicted_return, $return_status, $collected, $additional_intel, $client, $employee_id ,$order_id;
    public $isOpen = 0;
    public function render()
    {
        return view('livewire.order.order', [
            'orders' => Order::orderBy('id', 'desc')->paginate(),
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
        $client = Mpn_client::findOrFail($this->client);
        // Update or Insert Post
        $order = Order::updateOrCreate(['id' => $this->order_id], [
            'code' => $this->quickRandom(6),
            'amount_perceived' => $this->amount_perceived,
            'predicted_return' => $this->predicted_return,
            'client_id' => intVal($this->client),
            'client_name'=> $client->first_name." ".$client->last_name,
            'total_cost' => intval($this->total_cost),
            'employee_id' => Auth::user()->id,
            'status' => $this->status,
            'return_status' => $this->return_status,
            'collected' => $this->collected,
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
        $this->order_id = null;
        $this->code = null;
        $this->status = null;
        $this->total_cost = null;
        $this->amount_perceived = null;
        $this->predicted_return = null;
        $this->collected = null;
        $this->client = null;
        $this->additional_intel = null;
    }

    public function quickRandom($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return date("Y-m-d").'_'.substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
