<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with trending properties
     */
    public function index()
    {
        // Sample trending properties data
        $trendingProperties = [
            [
                'id' => 1,
                'title' => 'Modern Family Home',
                'price' => 450000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'sqft' => 2500,
                'address' => '123 Main Street, Downtown',
                'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=400&h=300&fit=crop',
                'tag' => 'New Listing',
                'tag_color' => 'bg-green-500',
                'status' => 'Active',
                'agent' => 'John Smith',
                'mls_id' => 'MLS123456'
            ],
            [
                'id' => 2,
                'title' => 'Luxury Condo',
                'price' => 320000,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'sqft' => 1200,
                'address' => '456 Oak Avenue, Uptown',
                'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=400&h=300&fit=crop',
                'tag' => 'Price Reduced',
                'tag_color' => 'bg-red-500',
                'status' => 'Active',
                'agent' => 'Sarah Johnson',
                'mls_id' => 'MLS789012'
            ],
            [
                'id' => 3,
                'title' => 'Historic Victorian',
                'price' => 680000,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'sqft' => 3200,
                'address' => '789 Heritage Lane, Historic District',
                'image' => 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=400&h=300&fit=crop',
                'tag' => 'Featured',
                'tag_color' => 'bg-blue-500',
                'status' => 'Active',
                'agent' => 'Mike Wilson',
                'mls_id' => 'MLS345678'
            ],
            [
                'id' => 4,
                'title' => 'Modern Apartment',
                'price' => 280000,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'sqft' => 800,
                'address' => '321 Pine Street, City Center',
                'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=400&h=300&fit=crop',
                'tag' => 'Great Value',
                'tag_color' => 'bg-yellow-500',
                'status' => 'Active',
                'agent' => 'Lisa Brown',
                'mls_id' => 'MLS901234'
            ]
        ];

        return view('home', compact('trendingProperties'));
    }
}
