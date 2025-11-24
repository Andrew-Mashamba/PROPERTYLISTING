<?php

namespace App\Livewire\Admin;

use App\Models\FinancingInquiry;
use Livewire\Component;
use Livewire\WithPagination;

class FinancingInquiries extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $selectedInquiry = null;
    public $adminNotes = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function viewInquiry($inquiryId)
    {
        $this->selectedInquiry = FinancingInquiry::with(['user', 'property', 'loanProduct.bank'])->find($inquiryId);
        $this->adminNotes = $this->selectedInquiry->admin_notes ?? '';
    }

    public function closeModal()
    {
        $this->selectedInquiry = null;
        $this->adminNotes = '';
    }

    public function updateStatus($status)
    {
        if ($this->selectedInquiry) {
            $this->selectedInquiry->update(['status' => $status]);
            $this->selectedInquiry->refresh();
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function saveNotes()
    {
        if ($this->selectedInquiry) {
            $this->selectedInquiry->update(['admin_notes' => $this->adminNotes]);
            session()->flash('message', 'Notes saved successfully.');
        }
    }

    public function render()
    {
        $inquiries = FinancingInquiry::with(['user', 'property', 'loanProduct.bank'])
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('full_name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%')
                      ->orWhereHas('property', function($q2) {
                          $q2->where('title', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->statusFilter, function($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.admin.financing-inquiries', [
            'inquiries' => $inquiries,
        ])->layout('components.layouts.app');
    }
}
