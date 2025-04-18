<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class HomePage extends Component
{
    use WithPagination;

    public $query = '';
    public $email_verified_at = '';

    public function render()
    {
        $user = User::query()
            ->where(function ($query) {
                $query->where('name', 'ILIKE', '%' . $this->query . '%')
                    ->orWhere('email', 'ILIKE', '%' . $this->query . '%');
            })
            ->when($this->email_verified_at === 'verified', function ($query) {
                return $query->whereNotNull('email_verified_at');
            })
            ->when($this->email_verified_at === 'not_verified', function ($query) {
                return $query->whereNull('email_verified_at');
            })
            ->orderBy('name', "desc")
            ->paginate(8);

        return view('livewire.home-page', [
            'users' => $user
        ])->layout('layouts.page');
    }

    public function filterVerified()
    {
        $this->email_verified_at = $this->email_verified_at === 'verified' ? 'not_verified' : 'verified';
    }
}
