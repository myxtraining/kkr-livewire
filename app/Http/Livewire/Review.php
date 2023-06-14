<?php

namespace App\Http\Livewire;

use App\Models\Log;
use App\Models\Review as ModelsReview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination;

    public Log $log;

    // public function mount(Log $log)
    // {
    //     $this->log = $log;
    // }


    protected $rules = [
        'newReview' => 'required|min:10',
    ];

    public $newReview;

  
    public function mount(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Function like
     */
    public function like(ModelsReview $review)
    {
        $review->liked() ? $review->unlike() : $review->like();
    }


    /**
     * Save item
     */
    public function save()
    {
        $this->validate();
        // array_unshift($this->reviews, [
        //     'name' => Auth::user()->name,
        //     'content' => $this->newReview
        // ]);

        ModelsReview::create([
            'content' => $this->newReview,
            'user_id' => Auth::id(),
            'log_id' => $this->log->id
        ]);

        $this->newReview = '';
    }


    public function render()
    {
        return view('livewire.review-section', [
            'reviews' => ModelsReview::where('log_id', $this->log->id)->orderBy('created_at', 'desc')->paginate(3)
        ]);
    }
}
