<div>
    @if (session()->has('error'))
        <div class="fixed bg-red-500 right-5 top-5 p-3 rounded-xl">{{ session('error') }}</div>
    @endif
    <div>
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="flex flex-col gap-4 md:p-12 rounded-xl shadow-md md:border-1 border-accent md:py-16 md:bg-zinc-700/10 md:w-96">
                <form wire:submit.prevent="login" class="flex flex-col w-full gap-2.5">
                    <div class="mb-2.5">
                        <h1 class="text-2xl font-bold">Welcome Back!</h1>
                        <p class="text-sm font-light">Glad to see you here again! 😁</p>
                    </div>
                    <div>
                        <flux:input class="border-b border-accent-content w-full" type="email" id="email" wire:model="email" placeholder="example@gmail.com" required />
                    </div>
                    <div>
                        <flux:input viewable class="border-b border-accent-content w-full" type="password" id="password" wire:model="password" placeholder="********" required />
                    </div>
                    <div class="my-1.5">
                        <label for="remember_me">
                            <input type="checkbox" id="remember_me" wire:model="remember_me">
                            Remember Me
                        </label>
                    </div>
                    <flux:button variant="filled" class="bg-accent/85! w-full rounded-xl hover:bg-accent! flex justify-center items-center" type="submit" wire:loading.attr="disabled">Login</flux:button>
                </form>
        
                <div class="text-center mb-2">
                    <a class="text-accent" href="{{ route('forgot.password') }}">Forget password?!</a>
                </div>
                <div>
                    <p class="text-center">Don't have an account? <a class="text-accent" href="{{ route('register') }}">Register!</a> </p> 
                </div>
            </div>
        </div>
    </div>
</div>