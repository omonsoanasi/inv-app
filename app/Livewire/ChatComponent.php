<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ChatComponent extends Component
{
    public $message;

    public function mount()
    {
        $this->message = '';
    }

    public function sendMessage()
    {
        Chat::create([
            'user_id' => auth()->id(),
            'message' => $this->message,
        ]);
        $this->message = '';
        session()->flash('message', 'Message sent!');
    }

    public function render()
    {
        return view('livewire.chat-component', [
            'chats' => Chat::where('user_id', auth()->id())->get(),
        ]);
    }
}

