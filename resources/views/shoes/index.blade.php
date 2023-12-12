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
        <p>{{ $shoe->category->name }}</p>
        <h3>{{ $shoe["price"] }}</h3>
        <div class="card-actions justify-end">

          <form action="{{ route('shoes.destroy', $shoe['id']) }}" method="post">

            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary bg-red-300 hover:bg-red-900 hover:text-white" >Delete</button>
          </form>
          <a href="{{ route('shoes.edit', $shoe['id']) }}">
            <button class="btn btn-primary bg-cyan-200 hover:bg-cyan-900 hover:text-white">EDIT</button>
          </a>
        </div>
      </div>
    </div>
    @endforeach    
  </div>
</x-app-layout>
