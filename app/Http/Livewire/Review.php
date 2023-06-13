<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    // Nanti content ni akan datang dari DB
    public $reviews = [
        [
            'name' => 'Siti Aishah',
            'content' => "This is useful for persisting search filters, 
            active tabs, and other features where users will be frustrated if 
            their configuration is reset after refreshing or leaving and revisiting a page."
        ],
        [
            'name' => 'Siti Khadijah',
            'content' => "You can include the CDN build of this plugin as a <script> 
            tag, just make sure to include it BEFORE Alpine's core JS file."
        ],
        [
            'name' => 'Nurhaliza Abdullah',
            'content' => "You can use this plugin by either including it from a 
            <script> tag or installing it via NPM:"
        ],
    ];

    public $newReview;

    public function save()
    {
        array_unshift($this->reviews, [
            'name' => Auth::user()->name,
            'content' => $this->newReview
        ]);
        
        $this->newReview = '';
    }


    public function render()
    {
        return view('livewire.review');
    }
}
