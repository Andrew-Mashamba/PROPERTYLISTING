<?php

namespace App\Livewire\General;

use Livewire\Component;

class Help extends Component
{
    public $search = '';
    public $selectedCategory = 'all';

    public function render()
    {
        $categories = [
            ['id' => 'getting-started', 'name' => 'Getting Started', 'icon' => 'fa-rocket', 'count' => 8],
            ['id' => 'properties', 'name' => 'Properties', 'icon' => 'fa-home', 'count' => 12],
            ['id' => 'payments', 'name' => 'Payments', 'icon' => 'fa-money-bill', 'count' => 6],
            ['id' => 'account', 'name' => 'Account', 'icon' => 'fa-user', 'count' => 10]
        ];

        $articles = [
            (object)[
                'id' => 1,
                'title' => 'How to add a new property',
                'category' => 'properties',
                'excerpt' => 'Learn how to list your property on the platform',
                'views' => 1250,
                'helpful' => 45
            ],
            (object)[
                'id' => 2,
                'title' => 'Managing tenant payments',
                'category' => 'payments',
                'excerpt' => 'Track and manage rental payments efficiently',
                'views' => 980,
                'helpful' => 38
            ],
            (object)[
                'id' => 3,
                'title' => 'Setting up your profile',
                'category' => 'account',
                'excerpt' => 'Complete your profile and verify your account',
                'views' => 756,
                'helpful' => 29
            ]
        ];

        return view('livewire.general.help', [
            'categories' => $categories,
            'articles' => $articles
        ]);
    }
}
