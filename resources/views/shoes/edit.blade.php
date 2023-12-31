<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Edit Shoes') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
      <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          <form class="mt-6 space-y-6" method="post" action="{{ route('shoes.update', $shoe['id']) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
              <x-input-label for="image" :value="__('Image')" />
              <img class="img-preview img-fluid col-md-5 mb-3">
              <x-text-input class="mt-1 block w-full" id="image" name="image" type="file" :value="old('image')" accept="image/*" onchange="previewImage()" />
              <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div>
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $shoe['name'])" required autofocus autocomplete="name" />
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
              <x-input-label for="price" :value="__('Price')" />
              <x-text-input class="mt-1 block w-full" id="price" name="price" type="number" :value="old('price', $shoe['price'])" required autofocus autocomplete="price" />
              <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            <div>

              @foreach ($categories as $category)
                <div class="flex items-center ps-3">
                  <input id="vue-checkbox" type="checkbox"class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" name="category[]" {{ in_array($category->id, $shoe->category->pluck('id')->toArray()) ? 'checked' : '' }} value="{{ $category->id }}" >
                  <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-black dark:text-gray-300">{{ $category->name }}</label>
                </div>
              @endforeach
              <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
            </div>

            <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
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
  @endpush
</x-app-layout>