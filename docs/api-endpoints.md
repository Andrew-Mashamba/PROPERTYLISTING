# SAVANNA PROPERTY - API ENDPOINTS DOCUMENTATION

## 📋 API OVERVIEW

**Base URL:** `/api/v1`  
**Authentication:** Bearer Token (Laravel Sanctum)  
**Content-Type:** `application/json`  
**Generated:** 2025-10-17  

---

## 🔐 AUTHENTICATION ENDPOINTS

### Login
```http
POST /api/v1/auth/login
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "user@example.com",
            "user_type": "seller"
        },
        "token": "1|abc123...",
        "expires_at": "2025-10-24T12:00:00Z"
    }
}
```

### Register
```http
POST /api/v1/auth/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "user@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "user_type": "seller"
}
```

### Logout
```http
POST /api/v1/auth/logout
Authorization: Bearer {token}
```

---

## 🏠 PROPERTY ENDPOINTS

### List Properties
```http
GET /api/v1/properties
```

**Query Parameters:**
- `type` - Property type (residential, commercial, land, industrial)
- `listing_type` - Sale, rent, or both
- `city` - City filter
- `state` - State filter
- `min_price` - Minimum price
- `max_price` - Maximum price
- `bedrooms` - Number of bedrooms
- `bathrooms` - Number of bathrooms
- `featured` - Featured properties only
- `page` - Page number
- `per_page` - Items per page (max 50)

**Response:**
```json
{
    "success": true,
    "data": {
        "properties": [
            {
                "id": 1,
                "title": "Beautiful Family Home",
                "description": "Spacious 3-bedroom home...",
                "property_type": "residential",
                "listing_type": "sale",
                "price": 350000.00,
                "bedrooms": 3,
                "bathrooms": 2,
                "area_sqft": 1800.00,
                "address": "123 Main St",
                "city": "Anytown",
                "state": "CA",
                "featured": true,
                "views_count": 45,
                "user": {
                    "id": 1,
                    "name": "John Doe",
                    "user_type": "seller"
                },
                "main_image": {
                    "id": 1,
                    "image_path": "/images/properties/1/main.jpg",
                    "alt_text": "Beautiful Family Home"
                },
                "created_at": "2025-10-17T10:00:00Z"
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 5,
            "per_page": 20,
            "total": 100
        }
    }
}
```

### Get Property
```http
GET /api/v1/properties/{id}
```

### Create Property
```http
POST /api/v1/properties
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Beautiful Family Home",
    "description": "Spacious 3-bedroom home...",
    "property_type": "residential",
    "listing_type": "sale",
    "price": 350000.00,
    "bedrooms": 3,
    "bathrooms": 2,
    "area_sqft": 1800.00,
    "address": "123 Main St",
    "city": "Anytown",
    "state": "CA",
    "zip_code": "12345"
}
```

### Update Property
```http
PUT /api/v1/properties/{id}
Authorization: Bearer {token}
Content-Type: application/json
```

### Delete Property
```http
DELETE /api/v1/properties/{id}
Authorization: Bearer {token}
```

### Upload Property Images
```http
POST /api/v1/properties/{id}/images
Authorization: Bearer {token}
Content-Type: multipart/form-data

{
    "images[]": [file1, file2, file3],
    "image_types[]": ["main", "gallery", "gallery"]
}
```

---

## 📦 MATERIAL ENDPOINTS

### List Materials
```http
GET /api/v1/materials
```

**Query Parameters:**
- `category` - Material category
- `supplier_id` - Filter by supplier
- `min_price` - Minimum price
- `max_price` - Maximum price
- `in_stock` - In stock only
- `featured` - Featured materials only

### Get Material
```http
GET /api/v1/materials/{id}
```

### Create Material
```http
POST /api/v1/materials
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Premium Hardwood Flooring",
    "description": "High-quality oak flooring...",
    "category": "flooring",
    "brand": "Premium Woods",
    "price": 8.50,
    "unit": "sqft",
    "stock_quantity": 1000,
    "sku": "HW-OAK-001"
}
```

### Update Material
```http
PUT /api/v1/materials/{id}
Authorization: Bearer {token}
```

### Delete Material
```http
DELETE /api/v1/materials/{id}
Authorization: Bearer {token}
```

---

## 🛒 ORDER ENDPOINTS

### List Orders
```http
GET /api/v1/orders
Authorization: Bearer {token}
```

**Query Parameters:**
- `status` - Order status
- `buyer_id` - Filter by buyer
- `supplier_id` - Filter by supplier

### Get Order
```http
GET /api/v1/orders/{id}
Authorization: Bearer {token}
```

### Create Order
```http
POST /api/v1/orders
Authorization: Bearer {token}
Content-Type: application/json

{
    "supplier_id": 2,
    "items": [
        {
            "material_id": 1,
            "quantity": 100,
            "unit_price": 8.50
        }
    ],
    "shipping_address": "123 Buyer St, City, State 12345",
    "billing_address": "123 Buyer St, City, State 12345"
}
```

### Update Order Status
```http
PUT /api/v1/orders/{id}/status
Authorization: Bearer {token}
Content-Type: application/json

{
    "status": "confirmed"
}
```

---

## 🏘️ RENTAL ENDPOINTS

### List Rentals
```http
GET /api/v1/rentals
Authorization: Bearer {token}
```

### Get Rental
```http
GET /api/v1/rentals/{id}
Authorization: Bearer {token}
```

### Create Rental
```http
POST /api/v1/rentals
Authorization: Bearer {token}
Content-Type: application/json

{
    "property_id": 1,
    "tenant_id": 3,
    "rent_amount": 2500.00,
    "deposit_amount": 2500.00,
    "lease_start_date": "2025-11-01",
    "lease_end_date": "2026-10-31"
}
```

### Update Rental
```http
PUT /api/v1/rentals/{id}
Authorization: Bearer {token}
```

---

## 🔧 MAINTENANCE ENDPOINTS

### List Maintenance Requests
```http
GET /api/v1/maintenance-requests
Authorization: Bearer {token}
```

### Get Maintenance Request
```http
GET /api/v1/maintenance-requests/{id}
Authorization: Bearer {token}
```

### Create Maintenance Request
```http
POST /api/v1/maintenance-requests
Authorization: Bearer {token}
Content-Type: application/json

{
    "property_id": 1,
    "title": "Broken Water Heater",
    "description": "Water heater is not working...",
    "priority": "high"
}
```

### Update Maintenance Request
```http
PUT /api/v1/maintenance-requests/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "status": "in_progress",
    "assigned_to": "Maintenance Team",
    "estimated_cost": 500.00
}
```

---

## 📧 INQUIRY ENDPOINTS

### List Inquiries
```http
GET /api/v1/inquiries
Authorization: Bearer {token}
```

### Get Inquiry
```http
GET /api/v1/inquiries/{id}
Authorization: Bearer {token}
```

### Create Inquiry
```http
POST /api/v1/inquiries
Authorization: Bearer {token}
Content-Type: application/json

{
    "property_id": 1,
    "to_user_id": 2,
    "subject": "Interested in Property",
    "message": "I'm interested in this property...",
    "inquiry_type": "property"
}
```

### Update Inquiry Status
```http
PUT /api/v1/inquiries/{id}/status
Authorization: Bearer {token}
Content-Type: application/json

{
    "status": "replied"
}
```

---

## 🔔 NOTIFICATION ENDPOINTS

### List Notifications
```http
GET /api/v1/notifications
Authorization: Bearer {token}
```

### Mark Notification as Read
```http
PUT /api/v1/notifications/{id}/read
Authorization: Bearer {token}
```

### Mark All Notifications as Read
```http
PUT /api/v1/notifications/read-all
Authorization: Bearer {token}
```

---

## 💰 TRANSACTION ENDPOINTS

### List Transactions
```http
GET /api/v1/transactions
Authorization: Bearer {token}
```

### Get Transaction
```http
GET /api/v1/transactions/{id}
Authorization: Bearer {token}
```

---

## 👥 USER ENDPOINTS

### Get User Profile
```http
GET /api/v1/user/profile
Authorization: Bearer {token}
```

### Update User Profile
```http
PUT /api/v1/user/profile
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "John Doe",
    "phone": "+1234567890",
    "address": "123 Main St, City, State"
}
```

### Get User Statistics
```http
GET /api/v1/user/statistics
Authorization: Bearer {token}
```

---

## ⚙️ ADMIN ENDPOINTS

### List All Users
```http
GET /api/v1/admin/users
Authorization: Bearer {token}
```

### Get User Details
```http
GET /api/v1/admin/users/{id}
Authorization: Bearer {token}
```

### Update User Status
```http
PUT /api/v1/admin/users/{id}/status
Authorization: Bearer {token}
Content-Type: application/json

{
    "is_active": true
}
```

### Get System Analytics
```http
GET /api/v1/admin/analytics
Authorization: Bearer {token}
```

### Get System Reports
```http
GET /api/v1/admin/reports
Authorization: Bearer {token}
```

---

## 📊 RESPONSE FORMATS

### Success Response
```json
{
    "success": true,
    "data": {
        // Response data
    },
    "message": "Operation completed successfully"
}
```

### Error Response
```json
{
    "success": false,
    "error": {
        "code": "VALIDATION_ERROR",
        "message": "The given data was invalid.",
        "details": {
            "email": ["The email field is required."]
        }
    }
}
```

### Pagination Response
```json
{
    "success": true,
    "data": {
        "items": [...],
        "pagination": {
            "current_page": 1,
            "last_page": 10,
            "per_page": 20,
            "total": 200,
            "from": 1,
            "to": 20
        }
    }
}
```

---

## 🔒 AUTHENTICATION & AUTHORIZATION

### Token Requirements
- All protected endpoints require Bearer token
- Token expires after 24 hours
- Refresh token available for extended sessions

### Role-Based Access
- **Seller:** Property management, inquiries
- **Supplier:** Material management, orders
- **Landlord:** Rental management, maintenance
- **Savanna:** Full system access

### Rate Limiting
- **General:** 1000 requests per hour
- **Authentication:** 10 attempts per minute
- **File Upload:** 10 requests per minute

---

## 🚀 IMPLEMENTATION STATUS

### Completed
- [x] Database schema design
- [x] Model relationships
- [x] API endpoint documentation
- [x] Authentication system

### In Progress
- [ ] Controller implementation
- [ ] API route definitions
- [ ] Request validation
- [ ] Response formatting

### Pending
- [ ] API testing
- [ ] Documentation generation
- [ ] Rate limiting implementation
- [ ] Caching strategies

---

**Document Version:** 1.0  
**Last Updated:** 2025-10-17  
**Status:** Ready for Implementation
