<nav class="border-b border-gray-100 bg-white" x-data="{ open: false }">
  <!-- Primary Navigation Menu -->
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 justify-between">
      <div class="flex">
        <!-- Logo -->
        <div class="flex shrink-0 items-center">
          <a href="{{ route('home') }}">
            <x-application-logo :text="'Swiftwalk'" />
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
          <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
          </x-nav-link>
        </div>

        @if (auth()->user()->is_admin)
          <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
              {{ __('Users') }}
            </x-nav-link>
          </div>

          <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('shoes.index')" :active="request()->routeIs('shoes.index')">
              {{ __('Shoes') }}
            </x-nav-link>
          </div>
        @endif

      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:ms-6 sm:flex sm:items-center">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <div class="flex cursor-pointer items-center">
              <div class="avatar">
                <div class="w-7 rounded-full ring-2 ring-indigo-400 ring-offset-1">
                  <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?background=random&name=' . auth()->user()->name }}" />
                </div>
              </div>
              <button class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                {{ Auth::user()->name }}
                <div class="ms-1">
                  <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </div>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
              {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          </x-slot>
        </x-dropdown>
      </div>
    </div>
  </div>
</nav>
