<div>
    <div class="gap-2 flex flex-col pb-8 border-b-2">
        <h1 class="text-4xl font-bold">Welcome</h1>
        <p>{{ auth()->user()->name }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <div class="flex items-center">
            Verification Status:
            @if ( auth()->user()->email_verified_at )
                <span class="text-green-500">Verified at ( {{ auth()->user()->email_verified_at }} )</span>
            @else
                <livewire:auth.send-verification />
            @endif
        </div>
    </div>

    <div class="w-full pt-8">
        <div class="w-full text-center mb-4">
            <h1 class="text-3xl font-bold italic">User List</h1>
        </div>
        <div class="w-full my-4">
            <form class="w-full flex justify-between">
                <div class="flex w-full gap-2 max-lg:hidden">    
                    <flux:button wire:click="filterVerified" variant="filled">
                        {{ $email_verified_at === 'verified' ? 'Showing: Verified' : 'Showing: Not Verified' }}
                    </flux:button>
                    <flux:button variant="filled" wire:click="$refresh" type="reset">Reset</flux:button>
                </div>
                <div class="flex justify-between gap-2 w-auto max-lg:w-full">
                    <flux:modal.trigger name="filter-user">
                        <flux:button variant="filled" class="lg:hidden">Filter Books</flux:button>
                    </flux:modal.trigger>
                    <flux:input placeholder="Name/Email..." class="w-40 border rounded-lg" wire:model="query"
                        wire:keydown.enter="$refresh" />    
                    <flux:button wire:click="$refresh" variant="primary" icon="magnifying-glass">
                        Search
                    </flux:button>
                </div>
            </form>

            <flux:modal name="filter-user" variant="flyout">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Filter User</flux:heading>
                        <flux:text class="mt-2">Find everyone you need</flux:text>
                    </div>
                    <form action="" class="flex flex-col gap-2 p-2">
                        <flux:button wire:click="filterVerified" variant="filled">
                            {{ $email_verified_at === 'verified' ? 'Showing: Verified' : 'Showing: Not Verified' }}
                        </flux:button>
                        <flux:button variant="filled" wire:click="$refresh" type="reset">Reset</flux:button>
                    </form>
                </div>
            </flux:modal>
        </div>
        <table class="w-full text-sm border dark:bg-zinc-900 bg-zinc-200">
            <thead class="text-base">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2">Verification Status</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($users as $user)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->email_verified_at)
                            <span class="text-green-600">Verified</span>
                        @else
                            <span class="text-red-600">Not Verified</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
