<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class LivewireChat extends Component
{
    public $chat;

    public function render($id)
    {
        $chats = Chat::whereclient_appointment_id($id)->get();

        return view('livewire.livewire-chat', [
            'chats'
        ]);
    }
}
