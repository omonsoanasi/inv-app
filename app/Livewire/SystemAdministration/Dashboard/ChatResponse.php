<?php

namespace App\Livewire\SystemAdministration\Dashboard;

use App\Models\Chat;
use Livewire\Component;

class ChatResponse extends Component
{
    public $id;
    public $userChat;
    public $getChats;

    public $admin_response;

    public function mount($id)
    {
        $this->id = $id;
        $this->userChat = Chat::find($id);
        $this->getChats = Chat::where('user_id', $this->userChat->user_id)->orderBy('updated_at','asc')->get();
    }

    public function respond()
    {
        $adminResponse = Chat::create([
            'user_id' => $this->userChat->user_id,
            'admin_id' => auth()->user()->id,
            'admin_response' => $this->admin_response
        ]);

        session()->flash('message', 'Your response has been sent successfully.');
        return redirect()->route('chat-response', $this->userChat->id);
    }
    public function render()
    {
        return view('livewire.system-administration.dashboard.chat-response')->layout('layouts.admin');
    }
}
