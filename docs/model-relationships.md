# SAVANNA PROPERTY - MODEL RELATIONSHIPS & IMPLEMENTATION

## 📋 MODEL STRUCTURE OVERVIEW

**Generated:** 2025-10-17  
**Status:** Ready for Implementation  

---

## 🗄️ ELOQUENT MODELS

### 1. USER MODEL (Enhanced)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'phone', 'address', 'profile_image', 'is_active'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function inquiriesSent()
    {
        return $this->hasMany(Inquiry::class, 'from_user_id');
    }

    public function inquiriesReceived()
    {
        return $this->hasMany(Inquiry::class, 'to_user_id');
    }

    public function ordersAsBuyer()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    public function ordersAsSupplier()
    {
        return $this->hasMany(Order::class, 'supplier_id');
    }

    public function rentalsAsLandlord()
    {
        return $this->hasMany(Rental::class, 'landlord_id');
    }

    public function rentalsAsTenant()
    {
        return $this->hasMany(Rental::class, 'tenant_id');
    }

    public function maintenanceRequestsAsTenant()
    {
        return $this->hasMany(MaintenanceRequest::class, 'tenant_id');
    }

    public function maintenanceRequestsAsLandlord()
    {
        return $this->hasMany(MaintenanceRequest::class, 'landlord_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('user_type', $type);
    }
}
```

### 2. PROPERTY MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'property_type', 'listing_type',
        'price', 'price_type', 'bedrooms', 'bathrooms', 'area_sqft',
        'address', 'city', 'state', 'zip_code', 'country', 'latitude',
        'longitude', 'status', 'featured', 'views_count'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area_sqft' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'featured' => 'boolean',
        'views_count' => 'integer',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(PropertyImage::class)->where('is_primary', true);
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('property_type', $type);
    }

    public function scopeByListingType($query, $type)
    {
        return $query->where('listing_type', $type);
    }

    public function scopeInLocation($query, $city, $state = null)
    {
        $query->where('city', $city);
        if ($state) {
            $query->where('state', $state);
        }
        return $query;
    }

    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}
```

### 3. PROPERTY IMAGE MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'image_path', 'image_type', 'alt_text',
        'sort_order', 'is_primary'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Relationships
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Scopes
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('image_type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
```

### 4. INQUIRY MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'material_id', 'from_user_id', 'to_user_id',
        'subject', 'message', 'inquiry_type', 'status', 'priority'
    ];

    // Relationships
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    // Scopes
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('inquiry_type', $type);
    }

    public function scopeByPriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('to_user_id', $userId);
    }
}
```

### 5. ORDER MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number', 'buyer_id', 'supplier_id', 'total_amount',
        'status', 'payment_status', 'shipping_address', 'billing_address', 'notes'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    // Relationships
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeForBuyer($query, $buyerId)
    {
        return $query->where('buyer_id', $buyerId);
    }

    public function scopeForSupplier($query, $supplierId)
    {
        return $query->where('supplier_id', $supplierId);
    }
}
```

### 6. ORDER ITEM MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'material_id', 'quantity', 'unit_price', 'total_price'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
```

### 7. RENTAL MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'landlord_id', 'tenant_id', 'rent_amount',
        'deposit_amount', 'lease_start_date', 'lease_end_date',
        'status', 'lease_agreement_path'
    ];

    protected $casts = [
        'rent_amount' => 'decimal:2',
        'deposit_amount' => 'decimal:2',
        'lease_start_date' => 'date',
        'lease_end_date' => 'date',
    ];

    // Relationships
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'occupied');
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeForLandlord($query, $landlordId)
    {
        return $query->where('landlord_id', $landlordId);
    }

    public function scopeForTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }
}
```

### 8. MAINTENANCE REQUEST MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'tenant_id', 'landlord_id', 'title', 'description',
        'priority', 'status', 'assigned_to', 'estimated_cost', 'actual_cost', 'completed_at'
    ];

    protected $casts = [
        'estimated_cost' => 'decimal:2',
        'actual_cost' => 'decimal:2',
        'completed_at' => 'datetime',
    ];

    // Relationships
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

    // Scopes
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeByPriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    public function scopeForLandlord($query, $landlordId)
    {
        return $query->where('landlord_id', $landlordId);
    }

    public function scopeForTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }
}
```

### 9. NOTIFICATION MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'title', 'message', 'data', 'read_at'
    ];

    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
```

### 10. TRANSACTION MODEL
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'amount', 'description', 'reference_id',
        'reference_type', 'status', 'payment_method', 'transaction_id'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reference()
    {
        return $this->morphTo();
    }

    // Scopes
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
```

---

## 🔗 RELATIONSHIP SUMMARY

### User Relationships
- **Properties:** One-to-Many (User → Properties)
- **Materials:** One-to-Many (User → Materials)
- **Inquiries:** One-to-Many (User → Inquiries sent/received)
- **Orders:** One-to-Many (User → Orders as buyer/supplier)
- **Rentals:** One-to-Many (User → Rentals as landlord/tenant)
- **Maintenance Requests:** One-to-Many (User → Maintenance requests)
- **Notifications:** One-to-Many (User → Notifications)
- **Transactions:** One-to-Many (User → Transactions)

### Property Relationships
- **User:** Many-to-One (Property → User)
- **Images:** One-to-Many (Property → Property Images)
- **Inquiries:** One-to-Many (Property → Inquiries)
- **Rentals:** One-to-Many (Property → Rentals)
- **Maintenance Requests:** One-to-Many (Property → Maintenance Requests)

### Order Relationships
- **Buyer:** Many-to-One (Order → User)
- **Supplier:** Many-to-One (Order → User)
- **Items:** One-to-Many (Order → Order Items)

---

## 🚀 IMPLEMENTATION CHECKLIST

### Database Setup
- [ ] Run all migrations
- [ ] Create model relationships
- [ ] Set up database seeders
- [ ] Create factories for testing

### Model Implementation
- [ ] Implement all model relationships
- [ ] Add model scopes
- [ ] Create model accessors/mutators
- [ ] Set up model events

### Testing
- [ ] Create unit tests for models
- [ ] Test relationship queries
- [ ] Test model scopes
- [ ] Test data validation

---

**Document Version:** 1.0  
**Last Updated:** 2025-10-17  
**Status:** Ready for Implementation
