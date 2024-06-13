<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Category;

class CategoryForm extends Form
{
    public ?Category $category;

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required|min:5')]
    public $slug = '';

    public function setCategory(Category $category)
    {
        $this->category = $category;

        $this->name = $category->name;

        $this->slug = $category->slug;
    }

    public function store()
    {
        $this->validate();

        Category::create($this->all());
    }

    public function update()
    {
        $this->category->update(
            $this->all()
        );
    }
}