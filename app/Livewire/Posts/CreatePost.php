<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Livewire\Forms\PostForm;
use Illuminate\Contracts\View\View;

class CreatePost extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public $updateTypes = [];

    public $receiveUpdates = '';

    public $selectedPost = null;

    public $selectedOption = null;

    public function create()
    {
        $this->form->store();
        return $this->redirectRoute('posts.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.posts.create-post')->with([
            'categories' => Category::all()->pluck('name', 'id')->toArray()
        ]);
    }
}
