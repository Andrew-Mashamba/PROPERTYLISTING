<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;

class Offers extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $propertyId = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'propertyId' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updateOfferStatus($offerId, $status)
    {
        // This would update offer status in a real implementation
        session()->flash('message', 'Offer status updated.');
    }

    public function counterOffer($offerId)
    {
        // This would create a counter offer in a real implementation
        session()->flash('message', 'Counter offer sent.');
    }

    public function acceptOffer($offerId)
    {
        // This would accept an offer in a real implementation
        session()->flash('message', 'Offer accepted.');
    }

    public function rejectOffer($offerId)
    {
        // This would reject an offer in a real implementation
        session()->flash('message', 'Offer rejected.');
    }

    public function render()
    {
        // Mock data for demonstration
        $offers = collect([
            (object)[
                'id' => 1,
                'property_title' => 'Beautiful Family Home',
                'buyer_name' => 'John Smith',
                'buyer_email' => 'john@example.com',
                'offer_amount' => 350000,
                'asking_price' => 375000,
                'status' => 'pending',
                'offer_date' => now()->subDays(2),
                'expires_at' => now()->addDays(5),
                'notes' => 'Cash offer, quick closing',
                'property_id' => 1
            ],
            (object)[
                'id' => 2,
                'property_title' => 'Modern Apartment',
                'buyer_name' => 'Sarah Johnson',
                'buyer_email' => 'sarah@example.com',
                'offer_amount' => 280000,
                'asking_price' => 300000,
                'status' => 'accepted',
                'offer_date' => now()->subDays(5),
                'expires_at' => now()->addDays(3),
                'notes' => 'Conventional loan, 30-day closing',
                'property_id' => 2
            ]
        ]);

        $properties = Property::where('user_id', auth()->id())
            ->select('id', 'title')
            ->get();

        return view('livewire.seller.offers', [
            'offers' => $offers,
            'properties' => $properties
        ]);
    }
}
