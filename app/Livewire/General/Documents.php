<?php

namespace App\Livewire\General;

use Livewire\Component;
use Livewire\WithPagination;

class Documents extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $perPage = 12;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function uploadDocument()
    {
        session()->flash('message', 'Document uploaded successfully.');
    }

    public function deleteDocument($documentId)
    {
        session()->flash('message', 'Document deleted successfully.');
    }

    public function downloadDocument($documentId)
    {
        session()->flash('message', 'Document download started.');
    }

    public function render()
    {
        $documents = collect([
            (object)[
                'id' => 1,
                'name' => 'Lease Agreement - Apartment 3B.pdf',
                'category' => 'contracts',
                'size' => '2.4 MB',
                'uploaded_at' => '2024-10-15 14:30:00',
                'type' => 'pdf'
            ],
            (object)[
                'id' => 2,
                'name' => 'Property Certificate.pdf',
                'category' => 'legal',
                'size' => '1.8 MB',
                'uploaded_at' => '2024-10-10 10:15:00',
                'type' => 'pdf'
            ],
            (object)[
                'id' => 3,
                'name' => 'Maintenance Invoice.xlsx',
                'category' => 'invoices',
                'size' => '456 KB',
                'uploaded_at' => '2024-10-08 16:45:00',
                'type' => 'excel'
            ]
        ]);

        $stats = [
            'total_documents' => 45,
            'total_size' => '125 MB',
            'recent_uploads' => 8
        ];

        return view('livewire.general.documents', [
            'documents' => $documents,
            'stats' => $stats
        ]);
    }
}
