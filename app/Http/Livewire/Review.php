<?php

namespace App\Http\Livewire;

use App\Models\Review as ModelsReview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    // Nanti content ni akan datang dari DB
    // public $reviews = [
    //     [
    //         'name' => 'Siti Aishah',
    //         'content' => "This is useful for persisting search filters, 
    //         active tabs, and other features where users will be frustrated if 
    //         their configuration is reset after refreshing or leaving and revisiting a page."
    //     ],
    //     [
    //         'name' => 'Siti Khadijah',
    //         'content' => "You can include the CDN build of this plugin as a <script> 
    //         tag, just make sure to include it BEFORE Alpine's core JS file."
    //     ],
    //     [
    //         'name' => 'Nurhaliza Abdullah',
    //         'content' => "You can use this plugin by either including it from a 
    //         <script> tag or installing it via NPM:"
    //     ],
    // ];

    protected $rules = [
        'newReview' => 'required|min:10',        
    ];

    public $newReview;

    public function save()
    {
        $this->validate();
        // array_unshift($this->reviews, [
        //     'name' => Auth::user()->name,
        //     'content' => $this->newReview
        // ]);

        ModelsReview::create([
            'content' => $this->newReview,
            'user_id' => Auth::id()
        ]);
        
        $this->newReview = '';
    }


    public function render()
    {
        return view('livewire.review', [
            'reviews' => ModelsReview::orderBy('created_at', 'desc')->get()
        ]);
    }
}
