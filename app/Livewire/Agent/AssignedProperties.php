<?php

namespace App\Livewire\Agent;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;

class AssignedProperties extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $propertyTypeFilter = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
        'propertyTypeFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingPropertyTypeFilter()
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

    public function clearFilters()
    {
        $this->search = '';
        $this->statusFilter = '';
        $this->propertyTypeFilter = '';
        $this->resetPage();
    }

    public function getPropertiesProperty()
    {
        $query = Property::with(['images', 'user'])
            ->where('agent_id', auth()->id())
            ->when($this->search, function ($q) {
                $q->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('address', 'like', '%' . $this->search . '%')
                        ->orWhere('city', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function ($q) {
                $q->where('status', $this->statusFilter);
            })
            ->when($this->propertyTypeFilter, function ($q) {
                $q->where('property_type', $this->propertyTypeFilter);
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        return $query->paginate(12);
    }

    public function getStatsProperty()
    {
        $agentId = auth()->id();
        
        return [
            'total_assigned' => Property::where('agent_id', $agentId)->count(),
            'active_listings' => Property::where('agent_id', $agentId)->where('status', 'Active')->count(),
            'pending_viewings' => 7,
            'total_value' => Property::where('agent_id', $agentId)->sum('price'),
        ];
    }

    public function render()
    {
        return view('livewire.agent.assigned-properties', [
            'properties' => $this->properties,
            'stats' => $this->stats,
        ])->layout('components.layouts.app');
    }
}
