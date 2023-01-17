<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'body' => 'Salman Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque enim qui autem
            id rem amet ex reprehenderit dolores quidem molestias, culpa commodi inventore fuga repellat veniam
            delectus! Mollitia,itaque error.',
            'created_at' => '3 min ago',
            'creator' => 'Salman'
        ]
    ];

    public $newComment;
    public function addComment()
    {
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Salman Rahman'
        ]);
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
