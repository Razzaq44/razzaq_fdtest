<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Component
{
    public $current_password, $new_password, $new_password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ];

    public function changePassword()
    {
        $this->validate();

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            session()->flash('error', 'Current password is incorrect');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password)
        ]);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.change-password')->layout('layouts.auth');
    }
}
