<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $perPage = 10;
    public $showOrderDetails = false;
    public $selectedOrder = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateOrderStatus($orderId, $newStatus)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->update(['status' => $newStatus]);
            session()->flash('message', 'Order status updated successfully.');
        }
    }

    public function viewOrderDetails($orderId)
    {
        $this->selectedOrder = Order::with(['buyer', 'items.material'])->find($orderId);
        $this->showOrderDetails = true;
    }

    public function closeOrderDetails()
    {
        $this->showOrderDetails = false;
        $this->selectedOrder = null;
    }

    public function render()
    {
        $orders = Order::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('order_number', 'like', '%' . $this->search . '%')
                      ->orWhereHas('buyer', function ($q) {
                          $q->where('name', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->dateFrom, function ($query) {
                $query->whereDate('created_at', '>=', $this->dateFrom);
            })
            ->when($this->dateTo, function ($query) {
                $query->whereDate('created_at', '<=', $this->dateTo);
            })
            ->with(['buyer', 'items.material'])
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.supplier.orders', [
            'orders' => $orders
        ]);
    }
}
