<?php

namespace App\Livewire\Todo;

use App\Models\Todolist;
use Livewire\Component;

class TodoItem extends Component
{
    public Todolist $todo;

    public function remove()
    {
        $this->dispatch('remove-todo', todoId: $this->todo->id);
    }

    public function toggleStatus($id)
    {
        $todo = Todolist::find($id);
        $todo->status = !$todo->status;
        $todo->save();
    }

    public function render()
    {
        return view('livewire.todo.todo-item');
    }
}
