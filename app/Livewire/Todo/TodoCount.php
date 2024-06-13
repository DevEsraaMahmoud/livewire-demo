<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class TodoCount extends Component
{
    #[Reactive]
    public $todos;

    public function render()
    {
        $completedCount = $this->todos->where('status', true)->count();
        $totalCount = $this->todos->count();

        return view('livewire.todo.todo-count', [
            'completedCount' => $completedCount,
            'totalCount' => $totalCount
        ]);
    }
}
