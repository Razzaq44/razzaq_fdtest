<div>
    @if (session()->has('error'))
        <div class="fixed bg-red-500 right-5 top-5 p-3 rounded-xl">{{ session('error') }}</div>
    @endif
    <div>
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="flex flex-col gap-4 md:p-12 rounded-xl shadow-md md:border-1 border-accent md:py-16 md:bg-zinc-700/10 md:w-96">
                <form wire:submit.prevent="sendResetPasswordLink" class="space-y-4">
                    <div class="mb-3">
                        <h1 class="text-2xl font-bold">Reset Your Password</h1>
                        <p class="text-sm font-light">Let’s get you a new password and back on track. 🔐</p>
                    </div>
                    <flux:input type="email" wire:model.lazy="email" label="Email" class="border-b border-accent-content w-full" placeholder="Enter your email" />
                    @error('email') <span class="text-red-600">{{ $message }}</span> @enderror

                    <div class="flex justify-center w-full">
                        <flux:button type="submit" class="bg-accent-content!">Send Reset Link</flux:button>
                    </div>

                    @if (session()->has('status'))
                        <div class="text-green-600">{{ session('status') }}</div>
                    @endif

                    @if (session()->has('error'))
                        <div class="text-red-600">{{ session('error') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
