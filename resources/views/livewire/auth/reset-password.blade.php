<div>
    @if (session()->has('error'))
        <div class="fixed bg-red-500 right-5 top-5 p-3 rounded-xl">{{ session('error') }}</div>
    @endif
    <div>
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="flex flex-col gap-4 md:p-12 rounded-xl shadow-md md:border-1 border-accent md:py-16 md:bg-zinc-700/10 md:w-96">
                <form wire:submit.prevent="resetPassword" class="space-y-4">
                    <input type="hidden" wire:model="token">
                    <div class="mb-3">
                        <h1 class="text-2xl font-bold">Create a New Password</h1>
                        <p class="text-sm font-light">Almost there! Just set your new password below. 🔒</p>
                    </div>
                    <flux:input type="email" wire:model="email" label="Email" class="border-b border-accent-content w-full" placeholder="Enter your email" />
                    <div>
                        <flux:input class="border-b border-accent-content rounded-xs focus:outline-hidden p-2 w-full" wire:model="password" type="password" id="password" placeholder="Your password (min. 8 char)" required viewable/>
                        @error('password') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <flux:input class="border-b border-accent-content rounded-xs focus:outline-hidden p-2 w-full" wire:model="password_confirmation" type="password" id="password_confirmation" placeholder="Re-type your password" required viewable/>
                        @error('password') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-center w-full">
                        <flux:button type="submit" class="bg-accent-content!">Reset Password</flux:button>
                    </div>

                    @if (session()->has('status'))
                        <p>{{ session('status') }}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
