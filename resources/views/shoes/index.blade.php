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

  <div class="ms-12 mt-10 flex flex-wrap justify-start">
    @foreach ($shoe as $shoe)
      <div class="card mx-7 my-5 w-80 bg-base-100 shadow-xl">
        <figure><img src="{{ $shoe['image'] }}" alt="Shoes" /></figure>
        <div class="card-body">
          <h2 class="card-title">{{ $shoe['name'] }}</h2>
          <div class="flex flex-wrap w-full gap-2">
            @foreach ($shoe->category as $item)
              <div class="badge bg-base-300">{{ $item->name }}</div>
            @endforeach
          </div>
          <h3>Rp{{ $shoe['price'] }}/5 hari</h3>
          <div class="card-actions justify-end">

            <form action="{{ route('shoes.destroy', $shoe['id']) }}" method="post">

              @csrf
              @method('delete')
              <button class="btn btn-primary" type="submit">Delete</button>
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
