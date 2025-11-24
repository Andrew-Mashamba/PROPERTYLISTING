<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Property;

class Marketing extends Component
{
    public $selectedProperties = [];
    public $marketingType = 'social_media';
    public $message = '';

    public function selectAllProperties()
    {
        $this->selectedProperties = Property::where('user_id', auth()->id())
            ->pluck('id')
            ->toArray();
    }

    public function clearSelection()
    {
        $this->selectedProperties = [];
    }

    public function generateMarketingContent()
    {
        // This would generate marketing content in a real implementation
        session()->flash('message', 'Marketing content generated successfully!');
    }

    public function shareToSocialMedia()
    {
        // This would share to social media in a real implementation
        session()->flash('message', 'Shared to social media successfully!');
    }

    public function render()
    {
        $properties = Property::where('user_id', auth()->id())
            ->where('status', 'active')
            ->select('id', 'title', 'price', 'property_type', 'featured')
            ->get();

        return view('livewire.seller.marketing', [
            'properties' => $properties
        ]);
    }
}
