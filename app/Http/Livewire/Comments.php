<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    // public $comments;

    public $newComment;



    public function updated($body)
    {
        $this->validateOnly($body, [
            'newComment' => 'required | max:255'
        ]);
    }

    public function addComment()
    {
        $this->validate(
            [
                'newComment' => 'required'
            ]
        );


        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
        ]);
        // $this->comments->prepend($createdComment);
        $this->newComment = '';
        session()->flash('message', 'Comment successfully Added.');
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        session()->flash('message', 'Comment deleted Successfully .');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2)
        ]);
    }
}
