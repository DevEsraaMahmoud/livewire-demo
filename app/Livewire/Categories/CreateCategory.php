<?php

namespace App\Livewire\Categories;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateCategory extends Component
{
    public CategoryForm $form;

    public function updated($property)
    {
        if ($property === 'name') {
            $this->form->name = strtolower($this->title);
        }
    }

    public function create()
    {
        $this->form->store();

        session()->flash('status', 'Category successfully updated.');

        return $this->redirect('/categories');
    }

    public function render(): View
    {
        return view('livewire.categories.create-category');
    }
}
