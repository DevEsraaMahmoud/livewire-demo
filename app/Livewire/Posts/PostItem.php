<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    public Post $post;

    public function edit(Post $post){
        return redirect()->route('posts.edit', $post);
    }

    public function show(Post $post){
        return redirect()->route('posts.show', $post);
    }

    public function delete(Post $post)
    {
        $post->delete();
        session()->flash('message', 'Post deleted successfully.');
    }
}
