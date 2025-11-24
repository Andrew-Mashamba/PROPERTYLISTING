<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class MaterialsPage extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $category = '';
    public $brand = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $showOnlyAvailable = false;
    
    public $showImageModal = false;
    public $viewingImages = [];
    public $currentImage = '';
    public $currentImageIndex = 0;
    
    public $cart = [];
    public $showCartModal = false;
    public $showCheckoutModal = false;
    public $showAddToCartConfirm = false;
    public $confirmMaterialId = null;
    public $shippingAddress = '';
    public $billingAddress = '';
    public $notes = '';
    public $paymentMethod = 'lipa_namba';
    public $lipaNambaReference = '';

    protected $queryString = [
        'searchQuery' => ['except' => ''],
        'minPrice' => ['except' => ''],
        'maxPrice' => ['except' => ''],
        'category' => ['except' => ''],
        'brand' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'showOnlyAvailable' => ['except' => false],
    ];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function updatedBrand()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function updatedSortDirection()
    {
        $this->resetPage();
    }

    public function updatedShowOnlyAvailable()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->searchQuery = '';
        $this->minPrice = '';
        $this->maxPrice = '';
        $this->category = '';
        $this->brand = '';
        $this->sortBy = 'created_at';
        $this->sortDirection = 'desc';
        $this->showOnlyAvailable = false;
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function viewImages($materialId)
    {
        $material = Material::find($materialId);
        if ($material && $material->images) {
            $this->viewingImages = is_array($material->images) ? $material->images : json_decode($material->images, true);
            $this->currentImageIndex = 0;
            $this->currentImage = $this->viewingImages[0] ?? '';
            $this->showImageModal = true;
        }
    }

    public function closeImageModal()
    {
        $this->showImageModal = false;
        $this->viewingImages = [];
        $this->currentImage = '';
        $this->currentImageIndex = 0;
    }

    public function nextImage()
    {
        if ($this->currentImageIndex < count($this->viewingImages) - 1) {
            $this->currentImageIndex++;
            $this->currentImage = $this->viewingImages[$this->currentImageIndex];
        }
    }

    public function previousImage()
    {
        if ($this->currentImageIndex > 0) {
            $this->currentImageIndex--;
            $this->currentImage = $this->viewingImages[$this->currentImageIndex];
        }
    }

    public function setCurrentImage($index)
    {
        $this->currentImageIndex = $index;
        $this->currentImage = $this->viewingImages[$index];
    }

    public function promptAddToCart($materialId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        $this->confirmMaterialId = $materialId;
        $this->showAddToCartConfirm = true;
    }
    
    public function closeAddToCartConfirm()
    {
        $this->showAddToCartConfirm = false;
        $this->confirmMaterialId = null;
    }

    public function addToCart()
    {
        if (!$this->confirmMaterialId) {
            return;
        }

        $material = Material::find($this->confirmMaterialId);
        if (!$material) {
            return;
        }

        $cartKey = 'material_' . $this->confirmMaterialId;
        
        if (isset($this->cart[$cartKey])) {
            $this->cart[$cartKey]['quantity']++;
        } else {
            $this->cart[$cartKey] = [
                'id' => $material->id,
                'name' => $material->name,
                'sku' => $material->sku,
                'price' => $material->price,
                'quantity' => 1,
                'image' => $material->image_url ?? ($material->images[0] ?? null),
            ];
        }

        session()->put('cart', $this->cart);
        session()->flash('message', $material->name . ' added to cart!');
        
        $this->closeAddToCartConfirm();
    }

    public function removeFromCart($cartKey)
    {
        unset($this->cart[$cartKey]);
        session()->put('cart', $this->cart);
    }

    public function updateQuantity($cartKey, $quantity)
    {
        if ($quantity < 1) {
            $this->removeFromCart($cartKey);
            return;
        }

        if (isset($this->cart[$cartKey])) {
            $this->cart[$cartKey]['quantity'] = $quantity;
            session()->put('cart', $this->cart);
        }
    }

    public function clearCart()
    {
        $this->cart = [];
        session()->forget('cart');
    }

    public function openCartModal()
    {
        $this->showCartModal = true;
    }

    public function closeCartModal()
    {
        $this->showCartModal = false;
    }

    public function proceedToCheckout()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

        $this->showCartModal = false;
        $this->showCheckoutModal = true;
    }

    public function closeCheckoutModal()
    {
        $this->showCheckoutModal = false;
    }

    public function placeOrder()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (empty($this->cart)) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

        $this->validate([
            'shippingAddress' => 'required|string',
            'billingAddress' => 'nullable|string',
            'paymentMethod' => 'required|string',
            'lipaNambaReference' => $this->paymentMethod === 'lipa_namba' ? 'required|string|min:5' : 'nullable',
        ]);

        DB::beginTransaction();
        try {
            $subtotal = 0;
            foreach ($this->cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

            $tax = $subtotal * 0.18;
            $shippingFee = 5000;
            $total = $subtotal + $tax + $shippingFee;

            $orderNotes = $this->notes;
            if ($this->paymentMethod === 'lipa_namba' && $this->lipaNambaReference) {
                $orderNotes .= ($orderNotes ? "\n\n" : '') . "Lipa Namba Reference: " . $this->lipaNambaReference;
            }

            $order = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'buyer_id' => auth()->id(),
                'supplier_id' => null,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping_fee' => $shippingFee,
                'total' => $total,
                'status' => 'pending',
                'payment_status' => $this->paymentMethod === 'lipa_namba' ? 'pending_verification' : 'unpaid',
                'payment_method' => $this->paymentMethod,
                'shipping_address' => $this->shippingAddress,
                'billing_address' => $this->billingAddress ?: $this->shippingAddress,
                'notes' => $orderNotes,
            ]);

            foreach ($this->cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'material_id' => $item['id'],
                    'product_name' => $item['name'],
                    'product_sku' => $item['sku'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            $this->clearCart();
            $this->showCheckoutModal = false;
            
            session()->flash('message', 'Order placed successfully! Order number: ' . $order->order_number);
            
            return redirect()->route('materials');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to place order. Please try again.');
        }
    }

    public function getCartTotalProperty()
    {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function getCartCountProperty()
    {
        return array_sum(array_column($this->cart, 'quantity'));
    }

    public function getMaterialsProperty()
    {
        return $this->getMaterialsQuery()
            ->paginate(12);
    }

    public function getFeaturedMaterialsProperty()
    {
        return Material::featured()
            ->available()
            ->inStock()
            ->limit(8)
            ->get();
    }

    public function getMaterialsQuery()
    {
        $query = Material::query();

        // Search functionality
        if (!empty($this->searchQuery)) {
            $query->search($this->searchQuery);
        }

        // Price filtering
        if (!empty($this->minPrice) || !empty($this->maxPrice)) {
            $query->filterByPriceRange($this->minPrice, $this->maxPrice);
        }

        // Category filtering
        if (!empty($this->category)) {
            $query->filterByCategory($this->category);
        }

        // Brand filtering
        if (!empty($this->brand)) {
            $query->filterByBrand($this->brand);
        }

        // Availability filtering
        if ($this->showOnlyAvailable) {
            $query->filterByAvailability(true);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return $query;
    }

    public function getCategoriesProperty()
    {
        return Material::distinct()->pluck('category')->filter()->values();
    }

    public function getBrandsProperty()
    {
        return Material::distinct()->pluck('brand')->filter()->values();
    }

    public function render()
    {
        return view('livewire.materials-page', [
            'materials' => $this->materials,
            'featuredMaterials' => $this->featuredMaterials,
            'categories' => $this->categories,
            'brands' => $this->brands,
        ])->layout('layouts.guest');
    }
}