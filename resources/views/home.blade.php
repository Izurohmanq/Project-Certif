<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Home') }}
    </h2>
  </x-slot>
  <form class="course-input-box mt-5 flex items-center justify-center" action="{{ route('home') }}" method="">
    <iconify-icon class="me-5" icon="ion:search-sharp" width="40"></iconify-icon>
    <input class="course-input rounded-md border-4 px-20" name="search" type="text" value="{{ request('search') }}" autocomplete="off" placeholder="Search Shoes">
  </form>

  <div class="ms-12 mt-10 flex flex-wrap justify-start">
    @foreach ($shoes as $shoe)
      <div class="card mx-7 my-5 w-72 bg-base-100 shadow-xl">
        <figure><img src="{{ $shoe['image'] }}" alt="Shoes" /></figure>
        <div class="card-body">
          <h2 class="card-title">{{ $shoe['name'] }}</h2>
          <div class="flex w-full flex-wrap gap-2">
            @foreach ($shoe->category as $item)
              <div class="badge bg-base-300">{{ $item->name }}</div>
            @endforeach
          </div>
          <h3>{{ $shoe['price'] }} / 5days</h3>
          <div class="card-actions justify-end">

            <form action="{{ route('myrents.store') }}" method="post">
              @csrf
              <input id="shoe_id" name="shoe_id" type="hidden" value="{{ $shoe['id'] }}">
              <button class="btn btn-secondary btn-sm" type="submit" onclick="return confirm('yakin untuk menyewa sepatu ini?')">RENT</button>
            </form>
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

</x-app-layout>
