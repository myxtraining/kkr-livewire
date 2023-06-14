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

    public $newReview;

    protected $rules = [
        'newReview' => 'required|min:10',
    ];

    protected $listeners = [
        'select-log' => 'logSelectHandle'
    ];

    public function mount(Log $log)
    {
        $this->log = $log;
    }

    public function logSelectHandle(Log $log)
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

        // Broadcast event ke dalam event bus
        $this->emit('review-added');

        $this->newReview = '';
    }


    public function render()
    {
        return view('livewire.review-section', [
            'reviews' => ModelsReview::where('log_id', $this->log->id)->orderBy('created_at', 'desc')->paginate(3)
        ]);
    }
}
