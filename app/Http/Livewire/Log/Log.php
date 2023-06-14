<?php

namespace App\Http\Livewire\Log;

use App\Models\Log as ModelsLog;
use Livewire\Component;

class Log extends Component
{
    public $logs, $title, $description, $logId;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->logs = ModelsLog::all();
        return view('livewire.log.log-section');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->logId = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        ModelsLog::updateOrCreate(['id' => $this->logId], [
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash(
            'message',
            $this->logId ? 'Log Updated Successfully.' : 'Log Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit(ModelsLog $log)
    {
        $this->logId = $log->id;
        $this->title = $log->title;
        $this->description = $log->description;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete(ModelsLog $log)
    {
        $log->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
