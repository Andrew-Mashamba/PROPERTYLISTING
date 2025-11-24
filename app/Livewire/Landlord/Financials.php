<?php

namespace App\Livewire\Landlord;

use Livewire\Component;

class Financials extends Component
{
    public $dateRange = '30';
    public $reportType = 'summary';

    public function render()
    {
        $financialData = [
            'total_income' => 12500000,
            'total_expenses' => 3200000,
            'net_income' => 9300000,
            'occupancy_rate' => 92.5,
            'avg_rent' => 1562500,
            'maintenance_costs' => 850000,
            'property_tax' => 1200000,
            'insurance' => 650000,
            'utilities' => 500000
        ];

        $monthlyIncome = [
            ['month' => 'Jan', 'income' => 10200000, 'expenses' => 2800000],
            ['month' => 'Feb', 'income' => 10500000, 'expenses' => 2900000],
            ['month' => 'Mar', 'income' => 11200000, 'expenses' => 3100000],
            ['month' => 'Apr', 'income' => 10800000, 'expenses' => 2950000],
            ['month' => 'May', 'income' => 12000000, 'expenses' => 3200000],
            ['month' => 'Jun', 'income' => 11800000, 'expenses' => 3050000],
        ];

        return view('livewire.landlord.financials', [
            'financialData' => $financialData,
            'monthlyIncome' => $monthlyIncome
        ]);
    }
}
