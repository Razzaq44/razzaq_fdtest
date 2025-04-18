@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="flex flex-col items-center justify-center h-screen">
    <div class="flex flex-col gap-8 md:p-12 rounded-xl shadow-md md:border-1 border-accent md:py-16 md:bg-zinc-700/10 md:w-96">
        <form wire:submit.prevent="register" class="flex flex-col w-full gap-2.5">
            <div class="mb-2.5">
                <h1 class="text-2xl font-bold">Join Us!</h1>
                <p class="text-sm font-light">We're excited to have you on board! 🎉</p>
            </div>
            <div>
                <flux:input class="border-b border-accent-content rounded-xs focus:outline-hidden p-2 w-full" wire:model="name" type="text" id="name" placeholder="Your Name" required/>
                @error('name') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <flux:input class="border-b border-accent-content rounded-xs focus:outline-hidden p-2 w-full" wire:model="email" type="email" id="email" placeholder="example@gmail.com" required/>
                @error('email') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <flux:input class="border-b border-accent-content rounded-xs focus:outline-hidden p-2 w-full" wire:model="password" type="password" id="password" placeholder="Your password (min. 8 char)" required viewable/>
                @error('password') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <flux:input class="border-b border-accent-content rounded-xs focus:outline-hidden p-2 w-full" wire:model="password_confirmation" type="password" id="password_confirmation" placeholder="Re-type your password" required viewable/>
                @error('password') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
            </div>
            <flux:button variant="filled" class="bg-accent/85! w-full rounded-xl hover:bg-accent! flex justify-center items-center" type="submit" wire:loading.attr="disabled">Register</flux:button>
        </form>
    
        <div>
            <p class="text-center">Already have an account? <a class="text-accent" href="{{ route('login') }}">Login</a> </p>
        </div>
    </div>
</div>