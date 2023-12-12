<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Edit Shoes') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          <form class="mt-6 space-y-6" method="post" action="{{ route('shoes.update', $data['id']) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div>
              <x-input-label for="image" :value="__('Image')" />
              <input type="hidden" name="oldImage" value="{{ $data['image'] }}">
              <img class="img-preview img-fluid mb-3 col-md-5">
              <x-text-input class="mt-1  block w-full" id="image" name="image" type="file" :value="old('image')" accept="image/*" onchange="previewImage()" />
              <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div>
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $data['name'])" required autofocus autocomplete="name" />
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
              <x-input-label for="price" :value="__('Price')" />
              <x-text-input class="mt-1 block w-full" id="price" name="price" type="number" :value="old('price', $data['price'])" required autofocus autocomplete="price" />
              <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            <div>
              <x-input-label for="cateogry" :value="__('Cateogry')" />
              <select id="category" name="category" class="mt-2 rounded-md">
                <option value="0">Option</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $data['category_id'] ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
                @endforeach
              </select>
              <x-input-error class="mt-2" :messages="$errors->get('category')" />
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