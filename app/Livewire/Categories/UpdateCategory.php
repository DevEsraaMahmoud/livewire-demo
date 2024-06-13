<?php

namespace App\Livewire\Categories;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;

class UpdateCategory extends Component
{
    public CategoryForm $form;

    public function mount(Category $category)
    {
        $this->form->setCategory($category);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect('/categories');
    }

    public function render()
    {
        return view('livewire.categories.update-category');
    }
}
