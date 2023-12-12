<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Create User') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-xl bg-white p-10 rounded-xl space-y-6 sm:px-6 lg:px-8">
      <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <!-- Name -->
        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
          <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autocomplete="username" />
          <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-input-label for="password" :value="__('Password')" />

          <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" required autocomplete="new-password" />

          <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

          <x-text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" />

          <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="form-control mt-4">
          <label class="label cursor-pointer">
            <span class="label-text">Admin</span> 
            <input name="is_admin" type="checkbox" class="checkbox" />
          </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
          <x-primary-button class="ms-4">
            {{ __('Create') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
