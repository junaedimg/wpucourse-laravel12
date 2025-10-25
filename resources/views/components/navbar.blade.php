<nav class="bg-gray-900" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company" class="size-8" />
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                        <x-my-nav-link href="/" :current="request()->is('/')">
                            Home
                        </x-my-nav-link>
                        <x-my-nav-link href="/posts" :current="request()->is('posts')">
                            Blog
                        </x-my-nav-link>
                        <x-my-nav-link href="/about" :current="request()->is('about')">
                            About
                        </x-my-nav-link>
                        <x-my-nav-link href="/contact" :current="request()->is('contact')">
                            Contact
                        </x-my-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <!-- Tombol -->
                        @if (Auth::check())
                            <button @click="isOpen = !isOpen"
                                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/avatar.png') }}"
                                    alt="{{ Auth::user()->name }}"
                                    class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                                <div class="text-gray-300 text-sm font-medium ml-3 cursor-pointer">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @else
                            <a href="/login" class="text-white text-sm font-medium">Login</a>
                            <span class="text-white text-sm">|</span>
                            <a href="/register" class="text-white text-sm font-medium">Register</a>
                        @endif
                        <!-- Menu dropdown -->
                        <div x-show="isOpen" @click.outside="isOpen = false"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-800 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            x-transition>
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Your
                                profile</a>
                            <a href="/dashboard"
                                class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Settings</a>
                            <form method="POST" action="/logout">
                                @csrf
                                <button href="#" type="submit"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 cursor-pointer">Log
                                    out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" command="--toggle" commandfor="mobile-menu" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="md:hidden" x-bind:class="isOpen ? 'block' : 'hidden'">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <x-my-nav-link class="block" href="/" :current="request()->is('/')">
                Home
            </x-my-nav-link>

            <x-my-nav-link class="block" href="/posts" :current="request()->is('posts')">
                Blog
            </x-my-nav-link>

            <x-my-nav-link class="block" href="/about" :current="request()->is('about')">
                About
            </x-my-nav-link>

            <x-my-nav-link class="block" href="/contact" :current="request()->is('contact')">
                Contact
            </x-my-nav-link>
        </div>
        <div class="border-t border-white/10 pt-4 pb-3">
            @if (Auth::check())
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/avatar.png') }}"
                            alt="{{ Auth::user()->name }}"
                            class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ Auth::user()->name }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="/profile"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Profile</a>
                    <a href="/dashboard"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button href="#" type="submit"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 cursor-pointer">Log
                            out</button>
                    </form>
                </div>
            @else
                <div class="px-5">
                    <a href="/login" class="block py-2 text-white text-sm font-medium">Login</a>
                    <a href="/register" class="block py-2 text-white text-sm font-medium">Register</a>
                </div>
            @endif
        </div>
    </div>
</nav>
