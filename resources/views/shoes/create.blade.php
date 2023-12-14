<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Create Shoes') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
      <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          <form class="mt-6 space-y-6" method="post" action="{{ route('shoes.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div>
              <x-input-label for="image" :value="__('Image')" />
              <img class="img-preview img-fluid col-md-5 mb-3">
              <x-text-input class="mt-1 block w-full" id="image" name="image" type="file" :value="old('image')" accept="image/*" onchange="previewImage()" />
              <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div>
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
              <x-input-label for="price" :value="__('Price')" />
              <x-text-input class="mt-1 block w-full" id="price" name="price" type="number" :value="old('price')" required autofocus autocomplete="price" />
              <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            <div>
              <x-input-label for="cateogry" :value="__('Cateogry')" />
              @foreach ($categories as $category)
                <div class="flex items-center ps-3">
                  <input class="text-darks-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700" id="vue-checkbox" name="category[]" type="checkbox" value="{{ $category->id }}">
                  <label class="text-black-300 ms-2 w-full py-3 text-sm font-medium text-gray-900" for="vue-checkbox">{{ $category->name }}</label>
                </div>
              @endforeach
              <x-input-error class="mt-2" :messages="$errors->get('categories')" />
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
  <script>
    // for preview image
    function previewImage() {
      const image = document.querySelector("#image");
      const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
</x-app-layout>
