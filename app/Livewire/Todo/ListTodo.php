<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use App\Models\Todolist;
use Livewire\Attributes\On;

class ListTodo extends Component
{
    public $todos;
    public $newTodo;

    public function mount()
    {
        $this->todos = Todolist::all();
    }

    public function rendering($view, $data)
    {
        // Runs BEFORE the provided view is rendered...
        //
        // $view: The view about to be rendered
        // $data: The data provided to the view
    }

    public function rendered($view, $html)
    {
        // Runs AFTER the provided view is rendered...
        //
        // $view: The rendered view
        // $html: The final, rendered HTML
    }

    public function updatedNewTodo()
    {
        $this->newTodo = strtolower($this->newTodo);
    }

    public function addTodo()
    {
        $this->validate([
            'newTodo' => 'required|string|max:255',
        ]);

        $todo = Todolist::create(['title' => $this->newTodo, 'status' => false]);
        $this->todos->push($todo);
        $this->newTodo = '';
    }

    #[On('remove-todo')]
    public function remove($todoId)
    {
        Todolist::find($todoId)->delete();
        $this->todos = $this->todos->filter(function($todo) use ($todoId) {
            return $todo->todoId != $todoId;
        });
    }

    public function toggleStatus($id)
    {
        $todo = Todolist::find($id);
        $todo->status = !$todo->status;
        $todo->save();
        $this->todos = Todolist::all();
    }

    public function render()
    {
        return view('livewire.todo.list-todo', [
            'todos' =>Todolist::all(),
        ]);
    }
}
