<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SendVerification extends Component
{
    public function sendVerificationEmail()
    {
        if (!Auth::user()->hasVerifiedEmail()) {
            Auth::user()->sendEmailVerificationNotification();

            session()->flash('message', 'Verification email sent successfully!');
        }
    }

    public function render()
    {
        return view('livewire.auth.send-verification');
    }
}
