<div>
    <flux:header class="">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:brand href="#" logo="" name="FDTEST" class="max-lg:hidden" />

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" href="{{ route('home') }}">Home</flux:navbar.item>
            <flux:navbar.item icon="document-text" href="{{ route('books') }}">Books</flux:navbar.item>

            <flux:separator vertical variant="subtle" class="my-2"/>
        </flux:navbar>

        <flux:spacer />

        <flux:navbar class="me-4">
            <flux:button variant="filled" x-data x-on:click="$flux.dark = ! $flux.dark">
                <span x-show="$flux.dark">
                    <flux:icon.moon />
                </span>
                <span x-show="!$flux.dark">
                    <flux:icon.sun />
                </span>
            </flux:button>
        </flux:navbar>

        @auth
            <flux:dropdown position="top" align="start">
                <flux:profile avatar="" name="{{ auth()->user()->name }}" color="auto" />

                <flux:menu>
                    <div class="flex flex-col">
                        <flux:button href="{{ route('change.password') }}" class="w-full border-0!">Profile</flux:button>
                        <flux:menu.separator />
                        <livewire:auth.logout />
                    </div>
                </flux:menu>
            </flux:dropdown>
        @else
        <flux:dropdown position="top" align="start">
                <flux:profile avatar="" name="Guest" color="auto" />

                <flux:menu>
                    <div class="flex flex-col">
                        <flux:button href="{{ route('login') }}" class="w-full border-0!">Login</flux:button>
                        <flux:menu.separator />
                        <flux:button href="{{ route('register') }}" class="w-full border-0!">Register</flux:button>
                    </div>
                </flux:menu>
            </flux:dropdown>
        @endauth
    </flux:header>

    <flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <flux:brand href="#" logo="" name="FDTEST" class="px-2" />

        <flux:navlist variant="outline">
            <flux:navbar.item icon="home" href="{{ route('home') }}">Home</flux:navbar.item>
            <flux:navbar.item icon="document-text" href="{{ route('books') }}">Books</flux:navbar.item>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:button variant="filled" x-data x-on:click="$flux.dark = ! $flux.dark">
                <span x-show="$flux.dark">
                    <flux:icon.moon />
                </span>
                <span x-show="!$flux.dark">
                    <flux:icon.sun />
                </span>
            </flux:button>
        </flux:navlist>
    </flux:sidebar>
</div>
