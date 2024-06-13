<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;

class ListCategories extends Component
{
    #[Url(keep: true)]
    public ?string $search = '';

    #[Computed]
    public function categories() {
        return Category::when($this->search, function($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10, pageName: 'categories-page');
    }

    public function createCategory(){
        return redirect()->route('categories.create');
    }

    public function edit(Category $category){
        return redirect()->route('categories.edit', $category);
    }

    public function show(Category $category){
        return redirect()->route('categories.show', $category);
    }

    public function delete(Category $category)
    {
        $category->delete();
        session()->flash('message', 'category deleted successfully.');
    }
}
