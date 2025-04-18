<div>
    <div class="w-full text-center mb-6">
        <h1 class="text-2xl font-bold">Book List</h1>
    </div>
    <form class="w-full flex justify-between">
        <div class="flex w-full gap-2 max-lg:hidden">    
            <flux:button wire:click="sortByCreatedAt" variant="filled">
                Sort by Date {{ $sortDirection === 'desc' ? '↓' : '↑' }}
            </flux:button>
            <div class="flex gap-2">
                <flux:input placeholder="Author..." class="w-40" wire:model="author" wire:keydown.enter="$refresh" /> 
                <flux:input placeholder="Uploaded at" type="date" class="w-40" wire:model="uploaded_at" wire:keydown.enter="$refresh" /> 
                <flux:select wire:model="rating">
                    <flux:select.option value="">Filter by Rating</flux:select.option>
                    <flux:select.option value="1">1</flux:select.option>
                    <flux:select.option value="2">2</flux:select.option>
                    <flux:select.option value="3">3</flux:select.option>
                    <flux:select.option value="4">4</flux:select.option>
                    <flux:select.option value="5">5</flux:select.option>
                </flux:select>
                <flux:button variant="filled" wire:click="$refresh">Apply Filters</flux:button>
                <flux:button variant="filled" wire:click="$refresh" type="reset">Reset</flux:button>
            </div>
        </div>
        <div class="flex justify-between gap-2 w-auto max-lg:w-full">
            <flux:modal.trigger name="filter-book">
                <flux:button variant="filled" class="lg:hidden">Filter Books</flux:button>
            </flux:modal.trigger>
            <div class="flex">
                <flux:input placeholder="Title..." class="w-40" wire:model="query"
                    wire:keydown.enter="$refresh" />    
                <flux:button wire:click="$refresh" variant="primary" icon="magnifying-glass">
                    Search
                </flux:button>
            </div>
        </div>
    </form>

    <flux:modal name="filter-book" variant="flyout">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Filter Books</flux:heading>
                <flux:text class="mt-2">Find everything you need</flux:text>
            </div>
            <form action="" class="flex flex-col gap-2 p-2">
                <flux:modal.trigger name="add-book">
                    <flux:button variant="filled">Add Book</flux:button>
                </flux:modal.trigger>

                <flux:button wire:click="sortByCreatedAt" variant="filled">
                    Sort by Date {{ $sortDirection === 'desc' ? '↓' : '↑' }}
                </flux:button>
                <flux:input placeholder="Author..." class="w-40" wire:model="author" wire:keydown.enter="$refresh" /> 
                <flux:input placeholder="Uploaded at" type="date" class="w-40" wire:model="uploaded_at" wire:keydown.enter="$refresh" /> 
                <flux:select wire:model="rating">
                    <flux:select.option value="">Filter by Rating</flux:select.option>
                    <flux:select.option value="1">1</flux:select.option>
                    <flux:select.option value="2">2</flux:select.option>
                    <flux:select.option value="3">3</flux:select.option>
                    <flux:select.option value="4">4</flux:select.option>
                    <flux:select.option value="5">5</flux:select.option>
                </flux:select>
                <flux:button variant="filled" wire:click="$refresh">Apply Filters</flux:button>
                <flux:button variant="filled" wire:click="$refresh" type="reset">Reset</flux:button>
            </form>
        </div>
    </flux:modal>

    <div class="grid lg:grid-cols-2 2xl:grid-cols-4 mt-6 gap-y-4 gap-x-4">
        @foreach ($books as $book)
            <div class="flex text-start dark:bg-zinc-800 bg-zinc-200 p-4 rounded-lg shadow-md" wire:key="book-{{ $book->id }}">
                <div class="mr-4">
                    <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Book Thumbnail" class="w-24 h-32 rounded-lg object-cover">
                </div>
                <div class="w-full flex">
                    <div class="w-full">
                        <h2>{{ $book->title }}</h2>
                        <p>Author: {{ $book->author }}</p>
                        <p>Description:</p>
                        <p>{{ $book->description }}</p>
                        <div class="flex">
                            @for ($i = 0; $book->rating > $i; $i++)
                                <flux:icon.star variant="mini"/>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- Pagination --}}
    <div class="mt-6">
        {{ $books->links() }}
    </div>
</div>
