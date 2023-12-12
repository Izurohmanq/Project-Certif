<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Shoes') }}
      </h2>
      <a href="/create/shoes">
        <x-primary-button class="ms-3">
          {{ __('Create') }}
        </x-primary-button>
      </a>
    </div>

  </x-slot>

  <div>

  </div>
</x-app-layout>
