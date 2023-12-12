<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit User') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-xl bg-white p-10 rounded-xl space-y-6 sm:px-6 lg:px-8">
      <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('patch')
        <!-- Name -->
        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
          <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
          <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="form-control mt-4">
          <label class="label cursor-pointer">
            <span class="label-text">Admin</span> 
            <input name="is_admin" type="checkbox" class="checkbox" {{ $user->is_admin ? 'checked' : null}}/>
          </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
          <x-primary-button class="ms-4">
            {{ __('Save') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
