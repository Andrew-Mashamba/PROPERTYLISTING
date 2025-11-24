# SAVANNA PROPERTY - IMPLEMENTATION PLAN & DATABASE DESIGN

## 📋 PROJECT OVERVIEW

**Project:** Savanna Property Management System  
**Version:** 1.0.0  
**Generated:** 2025-10-17  
**Status:** Development Phase  

---

## 🎯 SYSTEM ARCHITECTURE

### User Types & Access Levels
- **Seller:** Property owners selling real estate
- **Supplier:** Building materials and supplies providers  
- **Landlord:** Rental property owners and managers
- **Savanna:** System owner with full administrative access

### Technology Stack
- **Backend:** Laravel 11.x with Livewire
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** SQLite (Development) / MySQL (Production)
- **Authentication:** Laravel Fortify + Jetstream
- **Real-time:** Livewire Components

---

## 🗄️ DATABASE DESIGN

### Core Tables Structure

#### 1. USERS TABLE (Enhanced)
```sql
users
├── id (Primary Key)
├── name (VARCHAR 255)
├── email (VARCHAR 255, UNIQUE)
├── email_verified_at (TIMESTAMP)
├── password (VARCHAR 255)
├── user_type (ENUM: 'seller', 'supplier', 'landlord', 'savanna')
├── phone (VARCHAR 20, NULLABLE)
├── address (TEXT, NULLABLE)
├── profile_image (VARCHAR 500, NULLABLE)
├── is_active (BOOLEAN, DEFAULT true)
├── last_login_at (TIMESTAMP, NULLABLE)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 2. PROPERTIES TABLE
```sql
properties
├── id (Primary Key)
├── user_id (Foreign Key → users.id)
├── title (VARCHAR 255)
├── description (TEXT)
├── property_type (ENUM: 'residential', 'commercial', 'land', 'industrial')
├── listing_type (ENUM: 'sale', 'rent', 'both')
├── price (DECIMAL 15,2)
├── price_type (ENUM: 'fixed', 'negotiable', 'auction')
├── bedrooms (INTEGER, NULLABLE)
├── bathrooms (INTEGER, NULLABLE)
├── area_sqft (DECIMAL 10,2, NULLABLE)
├── address (TEXT)
├── city (VARCHAR 100)
├── state (VARCHAR 100)
├── zip_code (VARCHAR 20)
├── country (VARCHAR 100, DEFAULT 'USA')
├── latitude (DECIMAL 10,8, NULLABLE)
├── longitude (DECIMAL 11,8, NULLABLE)
├── status (ENUM: 'active', 'pending', 'sold', 'rented', 'inactive')
├── featured (BOOLEAN, DEFAULT false)
├── views_count (INTEGER, DEFAULT 0)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 3. PROPERTY_IMAGES TABLE
```sql
property_images
├── id (Primary Key)
├── property_id (Foreign Key → properties.id)
├── image_path (VARCHAR 500)
├── image_type (ENUM: 'main', 'gallery', 'floor_plan', 'virtual_tour')
├── alt_text (VARCHAR 255, NULLABLE)
├── sort_order (INTEGER, DEFAULT 0)
├── is_primary (BOOLEAN, DEFAULT false)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 4. MATERIALS TABLE
```sql
materials
├── id (Primary Key)
├── user_id (Foreign Key → users.id)
├── name (VARCHAR 255)
├── description (TEXT)
├── category (VARCHAR 100)
├── subcategory (VARCHAR 100, NULLABLE)
├── brand (VARCHAR 100, NULLABLE)
├── model (VARCHAR 100, NULLABLE)
├── price (DECIMAL 10,2)
├── unit (VARCHAR 50) -- 'piece', 'sqft', 'linear_ft', etc.
├── stock_quantity (INTEGER, DEFAULT 0)
├── min_stock_level (INTEGER, DEFAULT 0)
├── sku (VARCHAR 100, UNIQUE)
├── status (ENUM: 'active', 'inactive', 'discontinued')
├── featured (BOOLEAN, DEFAULT false)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 5. MATERIAL_IMAGES TABLE
```sql
material_images
├── id (Primary Key)
├── material_id (Foreign Key → materials.id)
├── image_path (VARCHAR 500)
├── alt_text (VARCHAR 255, NULLABLE)
├── sort_order (INTEGER, DEFAULT 0)
├── is_primary (BOOLEAN, DEFAULT false)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 6. INQUIRIES TABLE
```sql
inquiries
├── id (Primary Key)
├── property_id (Foreign Key → properties.id, NULLABLE)
├── material_id (Foreign Key → materials.id, NULLABLE)
├── from_user_id (Foreign Key → users.id)
├── to_user_id (Foreign Key → users.id)
├── subject (VARCHAR 255)
├── message (TEXT)
├── inquiry_type (ENUM: 'property', 'material', 'general')
├── status (ENUM: 'new', 'read', 'replied', 'closed')
├── priority (ENUM: 'low', 'medium', 'high', 'urgent')
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 7. ORDERS TABLE
```sql
orders
├── id (Primary Key)
├── order_number (VARCHAR 50, UNIQUE)
├── buyer_id (Foreign Key → users.id)
├── supplier_id (Foreign Key → users.id)
├── total_amount (DECIMAL 15,2)
├── status (ENUM: 'pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled')
├── payment_status (ENUM: 'pending', 'paid', 'failed', 'refunded')
├── shipping_address (TEXT)
├── billing_address (TEXT)
├── notes (TEXT, NULLABLE)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 8. ORDER_ITEMS TABLE
```sql
order_items
├── id (Primary Key)
├── order_id (Foreign Key → orders.id)
├── material_id (Foreign Key → materials.id)
├── quantity (INTEGER)
├── unit_price (DECIMAL 10,2)
├── total_price (DECIMAL 10,2)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 9. RENTALS TABLE
```sql
rentals
├── id (Primary Key)
├── property_id (Foreign Key → properties.id)
├── landlord_id (Foreign Key → users.id)
├── tenant_id (Foreign Key → users.id, NULLABLE)
├── rent_amount (DECIMAL 10,2)
├── deposit_amount (DECIMAL 10,2)
├── lease_start_date (DATE)
├── lease_end_date (DATE)
├── status (ENUM: 'available', 'occupied', 'maintenance', 'vacant')
├── lease_agreement_path (VARCHAR 500, NULLABLE)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 10. MAINTENANCE_REQUESTS TABLE
```sql
maintenance_requests
├── id (Primary Key)
├── property_id (Foreign Key → properties.id)
├── tenant_id (Foreign Key → users.id)
├── landlord_id (Foreign Key → users.id)
├── title (VARCHAR 255)
├── description (TEXT)
├── priority (ENUM: 'low', 'medium', 'high', 'emergency')
├── status (ENUM: 'open', 'in_progress', 'completed', 'cancelled')
├── assigned_to (VARCHAR 255, NULLABLE)
├── estimated_cost (DECIMAL 10,2, NULLABLE)
├── actual_cost (DECIMAL 10,2, NULLABLE)
├── completed_at (TIMESTAMP, NULLABLE)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 11. NOTIFICATIONS TABLE
```sql
notifications
├── id (Primary Key)
├── user_id (Foreign Key → users.id)
├── type (VARCHAR 100) -- 'inquiry', 'order', 'maintenance', 'system'
├── title (VARCHAR 255)
├── message (TEXT)
├── data (JSON, NULLABLE) -- Additional data for the notification
├── read_at (TIMESTAMP, NULLABLE)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

#### 12. TRANSACTIONS TABLE
```sql
transactions
├── id (Primary Key)
├── user_id (Foreign Key → users.id)
├── type (ENUM: 'property_sale', 'material_sale', 'rent_payment', 'commission', 'fee')
├── amount (DECIMAL 15,2)
├── description (TEXT)
├── reference_id (INTEGER, NULLABLE) -- ID of related record
├── reference_type (VARCHAR 100, NULLABLE) -- Model type
├── status (ENUM: 'pending', 'completed', 'failed', 'cancelled')
├── payment_method (VARCHAR 100, NULLABLE)
├── transaction_id (VARCHAR 255, NULLABLE) -- External payment ID
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

---

## 🚀 IMPLEMENTATION PHASES

### Phase 1: Core Infrastructure (Week 1-2)
**Priority: HIGH**

#### Database Setup
- [ ] Create all migration files
- [ ] Set up model relationships
- [ ] Implement database seeders
- [ ] Create factories for testing

#### Authentication System
- [ ] Configure Fortify/Jetstream
- [ ] Implement role-based access control
- [ ] Create user registration flow
- [ ] Set up email verification

#### Basic UI Framework
- [ ] Implement responsive sidebar
- [ ] Create dashboard layouts
- [ ] Set up navigation system
- [ ] Apply Savanna color scheme

### Phase 2: Property Management (Week 3-4)
**Priority: HIGH**

#### Property CRUD Operations
- [ ] Property creation form
- [ ] Property listing management
- [ ] Image upload system
- [ ] Property search and filtering
- [ ] Property status management

#### Seller Tools
- [ ] Property listing dashboard
- [ ] Inquiry management
- [ ] Viewing scheduling
- [ ] Offer tracking
- [ ] Performance analytics

### Phase 3: Materials Management (Week 5-6)
**Priority: MEDIUM**

#### Materials CRUD Operations
- [ ] Material catalog management
- [ ] Inventory tracking
- [ ] Pricing management
- [ ] Supplier network
- [ ] Order processing

#### Supplier Tools
- [ ] Product catalog dashboard
- [ ] Order management
- [ ] Inventory tracking
- [ ] Sales analytics
- [ ] Contractor partnerships

### Phase 4: Rental Management (Week 7-8)
**Priority: MEDIUM**

#### Rental Property Management
- [ ] Rental property listings
- [ ] Tenant management
- [ ] Lease agreement system
- [ ] Rent collection tracking
- [ ] Maintenance request system

#### Landlord Tools
- [ ] Rental portfolio dashboard
- [ ] Tenant communication
- [ ] Financial reporting
- [ ] Vacancy management
- [ ] Maintenance tracking

### Phase 5: System Administration (Week 9-10)
**Priority: LOW**

#### Admin Tools
- [ ] User management system
- [ ] System analytics
- [ ] Transaction monitoring
- [ ] Security logs
- [ ] System settings
- [ ] Backup management

### Phase 6: Advanced Features (Week 11-12)
**Priority: LOW**

#### Enhanced Functionality
- [ ] Real-time notifications
- [ ] Advanced search
- [ ] Map integration
- [ ] Document management
- [ ] Reporting system
- [ ] API development

---

## 📁 FILE STRUCTURE

### Migrations
```
database/migrations/
├── 0001_01_01_000000_create_users_table.php
├── 2025_10_17_104808_add_user_type_to_users_table.php
├── 2025_10_17_120000_create_properties_table.php
├── 2025_10_17_120001_create_property_images_table.php
├── 2025_10_17_120002_create_materials_table.php
├── 2025_10_17_120003_create_material_images_table.php
├── 2025_10_17_120004_create_inquiries_table.php
├── 2025_10_17_120005_create_orders_table.php
├── 2025_10_17_120006_create_order_items_table.php
├── 2025_10_17_120007_create_rentals_table.php
├── 2025_10_17_120008_create_maintenance_requests_table.php
├── 2025_10_17_120009_create_notifications_table.php
└── 2025_10_17_120010_create_transactions_table.php
```

### Models
```
app/Models/
├── User.php (Enhanced)
├── Property.php
├── PropertyImage.php
├── Material.php
├── MaterialImage.php
├── Inquiry.php
├── Order.php
├── OrderItem.php
├── Rental.php
├── MaintenanceRequest.php
├── Notification.php
└── Transaction.php
```

### Controllers
```
app/Http/Controllers/
├── PropertyController.php
├── MaterialController.php
├── InquiryController.php
├── OrderController.php
├── RentalController.php
├── MaintenanceController.php
├── NotificationController.php
└── AdminController.php
```

### Livewire Components
```
app/Livewire/
├── PropertyManagement.php
├── MaterialManagement.php
├── InquiryManagement.php
├── OrderManagement.php
├── RentalManagement.php
├── MaintenanceManagement.php
├── NotificationCenter.php
└── AdminDashboard.php
```

---

## 🔧 TECHNICAL SPECIFICATIONS

### API Endpoints Structure
```
/api/v1/
├── properties/
│   ├── GET    /properties (List properties)
│   ├── POST   /properties (Create property)
│   ├── GET    /properties/{id} (Show property)
│   ├── PUT    /properties/{id} (Update property)
│   └── DELETE /properties/{id} (Delete property)
├── materials/
│   ├── GET    /materials (List materials)
│   ├── POST   /materials (Create material)
│   ├── GET    /materials/{id} (Show material)
│   ├── PUT    /materials/{id} (Update material)
│   └── DELETE /materials/{id} (Delete material)
├── orders/
│   ├── GET    /orders (List orders)
│   ├── POST   /orders (Create order)
│   ├── GET    /orders/{id} (Show order)
│   └── PUT    /orders/{id} (Update order)
└── admin/
    ├── GET    /users (List users)
    ├── PUT    /users/{id} (Update user)
    ├── GET    /analytics (System analytics)
    └── GET    /reports (System reports)
```

### Security Considerations
- [ ] Role-based access control (RBAC)
- [ ] Input validation and sanitization
- [ ] CSRF protection
- [ ] SQL injection prevention
- [ ] XSS protection
- [ ] File upload security
- [ ] Rate limiting
- [ ] Audit logging

### Performance Optimizations
- [ ] Database indexing
- [ ] Query optimization
- [ ] Image compression
- [ ] Caching strategies
- [ ] Lazy loading
- [ ] Pagination
- [ ] CDN integration

---

## 📊 SUCCESS METRICS

### Technical Metrics
- [ ] Page load time < 2 seconds
- [ ] Database query time < 100ms
- [ ] 99.9% uptime
- [ ] Mobile responsiveness score > 95%
- [ ] Security score A+

### Business Metrics
- [ ] User registration rate
- [ ] Property listing success rate
- [ ] Order completion rate
- [ ] User satisfaction score
- [ ] System adoption rate

---

## 🚨 RISK MITIGATION

### Technical Risks
- **Database Performance:** Implement proper indexing and query optimization
- **Scalability:** Design for horizontal scaling from the start
- **Security:** Regular security audits and penetration testing
- **Data Loss:** Automated backup and recovery procedures

### Business Risks
- **User Adoption:** Comprehensive user training and documentation
- **Feature Creep:** Strict scope management and phased delivery
- **Competition:** Continuous market analysis and feature differentiation

---

## 📝 NEXT STEPS

1. **Immediate Actions:**
   - [ ] Review and approve this implementation plan
   - [ ] Set up development environment
   - [ ] Create project timeline
   - [ ] Assign development resources

2. **Week 1 Deliverables:**
   - [ ] Database schema implementation
   - [ ] Basic authentication system
   - [ ] Core UI framework
   - [ ] Development environment setup

3. **Ongoing Activities:**
   - [ ] Daily standup meetings
   - [ ] Weekly progress reviews
   - [ ] Continuous testing and QA
   - [ ] User feedback collection

---

**Document Version:** 1.0  
**Last Updated:** 2025-10-17  
**Next Review:** 2025-10-24  
**Status:** Ready for Implementation
