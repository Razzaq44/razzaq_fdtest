<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;

    public $query = '';
    public $author = '';
    public $uploaded_at = '';
    public $rating = '';
    public $sortDirection = 'desc';

    public function render()
    {
        $books = Book::query()
            ->where(function ($query) {
                $query->where('title', 'ILIKE', '%' . $this->query . '%')
                      ->orWhere('author', 'ILIKE', '%' . $this->query . '%');
            })
            ->when($this->author, function ($query) {
                return $query->where('author', 'ILIKE', '%' . $this->author . '%');
            })
            ->when($this->uploaded_at, function ($query) {
                return $query->whereDate('created_at', $this->uploaded_at);
            })
            ->when($this->rating, function ($query) {
                return $query->where('rating', $this->rating);
            })
            ->orderBy('created_at', $this->sortDirection)
            ->paginate(8);

        return view('livewire.books', [
            'books' => $books
        ])->layout('layouts.page');
    }

    public function sortByCreatedAt()
    {
        $this->sortDirection = $this->sortDirection === 'desc' ? 'asc' : 'desc';
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if ($book->thumbnail && Storage::exists('public/' . $book->thumbnail)) {
            Storage::delete('public/' . $book->thumbnail);
        }

        $book->delete();

        session()->flash('success', 'Book deleted successfully.');
    }
}
