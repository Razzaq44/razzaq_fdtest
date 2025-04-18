<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class Login extends Component
{

    public $email, $password, $remember_me = false;

    protected $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string|min:8',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        } else {
            return back()->with('error', 'Invalid credentials!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
