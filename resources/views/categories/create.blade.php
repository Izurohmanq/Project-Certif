<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Create Categories') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          <form class="mt-6 space-y-6" method="post" action="{{ route('categories.store') }}">
            @csrf
            @method('post')
            
            <div>
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Save') }}</x-primary-button>

              @if (session('status') === 'profile-updated')
              <p class="text-sm text-gray-600" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>