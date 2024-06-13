<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Computed;

class ListCategories extends Component
{
    #[Computed(persist: true, seconds: 7200)]
    public function categories() {
        return Category::paginate(10);
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
