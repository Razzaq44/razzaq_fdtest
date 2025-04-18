<div>
    @if (session()->has('error'))
        <div class="fixed bg-red-500 right-5 top-5 p-3 rounded-xl">{{ session('error') }}</div>
    @endif
    <div>
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="flex flex-col gap-4 md:p-12 rounded-xl shadow-md md:border-1 border-accent md:py-16 md:bg-zinc-700/10 md:w-96">
                <form wire:submit.prevent="changePassword" class="space-y-4">
                    <div class="mb-3">
                        <h1 class="text-2xl font-bold">Change Your Password</h1>
                        <p class="text-sm font-light">Let’s get you a new password and back on track. 🔐</p>
                    </div>
                    <flux:input type="password" viewable wire:model="current_password" label="Current Password" class="border-b border-accent-content w-full" placeholder="Current Password" />
                    @error('current_password') <span class="text-red-500">{{ $message }}</span> @enderror

                    <flux:input type="password" viewable wire:model="new_password" label="New Password" class="border-b border-accent-content w-full" placeholder="New Password" />
                    @error('new_password') <span class="text-red-500">{{ $message }}</span> @enderror

                    <flux:input type="password" viewable wire:model="new_password_confirmation" label="New Password Confirmation" class="border-b border-accent-content w-full" placeholder="New Password Confirmation" />
                    @error('new_password_confirmation') <span class="text-red-500">{{ $message }}</span> @enderror

                    <div class="flex gap-x-3 justify-end w-full">
                        <flux:button href="{{ url()->previous() }}" class="">Back</flux:button>
                        <flux:button type="submit" class="bg-accent-content!">Change Password</flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
