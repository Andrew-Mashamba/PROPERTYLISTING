<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\LoanProduct;
use App\Models\FinancingInquiry;
use App\Models\Inquiry;
use Livewire\Component;

class FinancingPage extends Component
{
    public $propertyId;
    public $property;
    public $loanProducts = [];
    public $selectedLoanProduct = null;
    
    public $full_name;
    public $email;
    public $phone;
    public $monthly_income;
    public $employment_status;
    public $loan_amount;
    public $loan_tenure_months;
    public $additional_info;

    public function mount()
    {
        $this->propertyId = request()->query('property');
        
        if (!$this->propertyId) {
            return redirect()->route('home');
        }

        $this->property = Property::with(['user', 'images'])->findOrFail($this->propertyId);
        $this->loanProducts = LoanProduct::with('bank')
            ->where('is_active', true)
            ->orderBy('interest_rate', 'asc')
            ->get();

        if (auth()->check()) {
            $this->full_name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }
    }

    public function selectLoanProduct($productId)
    {
        $this->selectedLoanProduct = LoanProduct::with('bank')->find($productId);
        $this->loan_amount = $this->property->price * 0.8;
    }

    public function submitFinancingInquiry()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'monthly_income' => 'required|numeric|min:0',
            'employment_status' => 'required|string',
            'loan_amount' => 'required|numeric|min:0',
            'loan_tenure_months' => 'required|integer|min:12|max:360',
        ]);

        FinancingInquiry::create([
            'user_id' => auth()->id(),
            'property_id' => $this->propertyId,
            'loan_product_id' => $this->selectedLoanProduct->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'monthly_income' => $this->monthly_income,
            'employment_status' => $this->employment_status,
            'loan_amount' => $this->loan_amount,
            'loan_tenure_months' => $this->loan_tenure_months,
            'additional_info' => $this->additional_info,
            'status' => 'pending',
        ]);

        Inquiry::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $this->property->user_id,
            'property_id' => $this->propertyId,
            'subject' => 'Financing Inquiry: ' . $this->property->title,
            'message' => "A user has submitted a financing inquiry for your property.\n\nProperty: {$this->property->title}\nLoan Product: {$this->selectedLoanProduct->name} ({$this->selectedLoanProduct->bank->name})\nLoan Amount: TZS " . number_format($this->loan_amount) . "\nTenure: {$this->loan_tenure_months} months\n\nApplicant: {$this->full_name}\nEmail: {$this->email}\nPhone: {$this->phone}",
            'contact_email' => $this->email,
            'contact_phone' => $this->phone,
            'status' => 'new',
            'priority' => 'high',
        ]);

        $adminUsers = \App\Models\User::where('user_type', 'savanna')->get();
        foreach ($adminUsers as $admin) {
            Inquiry::create([
                'from_user_id' => auth()->id(),
                'to_user_id' => $admin->id,
                'property_id' => $this->propertyId,
                'subject' => 'New Financing Application',
                'message' => "A new financing inquiry has been submitted.\n\nProperty: {$this->property->title}\nSeller: {$this->property->user->name}\nLoan Product: {$this->selectedLoanProduct->name} ({$this->selectedLoanProduct->bank->name})\nLoan Amount: TZS " . number_format($this->loan_amount) . "\nTenure: {$this->loan_tenure_months} months\n\nApplicant: {$this->full_name}\nEmail: {$this->email}\nPhone: {$this->phone}\nMonthly Income: TZS " . number_format($this->monthly_income) . "\nEmployment: {$this->employment_status}",
                'contact_email' => $this->email,
                'contact_phone' => $this->phone,
                'status' => 'new',
                'priority' => 'high',
            ]);
        }

        $this->reset(['full_name', 'email', 'phone', 'monthly_income', 'employment_status', 'loan_amount', 'loan_tenure_months', 'additional_info']);
        $this->selectedLoanProduct = null;
        
        session()->flash('message', 'Your financing inquiry has been submitted successfully! Both the property owner and our admin team have been notified.');
        
        $this->dispatch('financing-submitted');
    }

    public function calculateMonthlyPayment($loanAmount, $interestRate, $tenureMonths)
    {
        $monthlyRate = ($interestRate / 100) / 12;
        if ($monthlyRate == 0) {
            return $loanAmount / $tenureMonths;
        }
        return $loanAmount * ($monthlyRate * pow(1 + $monthlyRate, $tenureMonths)) / (pow(1 + $monthlyRate, $tenureMonths) - 1);
    }

    public function render()
    {
        return view('livewire.financing-page');
    }
}
