<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Shoes') }}
      </h2>
      <a href="/shoes/create">
        <x-primary-button class="ms-3">
          {{ __('Create') }}
        </x-primary-button>
      </a>
    </div>
  </x-slot>

  <div class="flex flex-wrap justify-start mt-10 ms-12">
    @foreach ($shoe as $shoe)
    <div class="card w-80 bg-base-100 mx-7 my-5 shadow-xl">
      <figure><img src="{{ $shoe['image'] }}" alt="Shoes" /></figure>
      <div class="card-body">
        <h2 class="card-title">{{ $shoe['name'] }}</h2>
        <div class="flex justify-center w-[100px] ms-9">
          @foreach ($shoe->category as $item)
          <span class="bg-black text-white text-xs font-medium me-2 px-3 py-2 rounded dark:text-blue-300">{{ $item->name }}</span>
          @endforeach
        </div>
        <h3>Rp{{ $shoe["price"] }}/5 hari</h3>
        <div class="card-actions justify-end">

          <form action="{{ route('shoes.destroy', $shoe['id']) }}" method="post">

            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Delete</button>
          </form>
          <a href="{{ route('shoes.edit', $shoe['id']) }}">
            <button class="btn btn-secondary">EDIT</button>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</x-app-layout>