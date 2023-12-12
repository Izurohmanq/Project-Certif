<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Home') }}
    </h2>
  </x-slot>
  <form action="{{ route('home') }}" method="" class="course-input-box flex justify-center items-center mt-5">
    <iconify-icon icon="ion:search-sharp" width="40" class="me-5"></iconify-icon>
    <input type="text" class="course-input rounded-md px-20 border-4" name="search" value="{{ request('search') }}" autocomplete="off" placeholder="Search Shoes">
  </form>

  <div class="flex flex-wrap justify-start mt-10 ms-12">
    @foreach ($shoes as $shoe)
    <div class="card w-72 bg-base-100 mx-7 my-5 shadow-xl">
      <figure><img src="{{ $shoe['image'] }}" alt="Shoes" /></figure>
      <div class="card-body">
        <h2 class="card-title">{{ $shoe['name'] }}</h2>
        <p>{{ $shoe->category->name }}</p>
        <h3>{{ $shoe["price"] }}/5 HARI</h3>
        <div class="card-actions justify-end">

          <form action="{{ route('myrents.store') }}" method="post">
            @csrf
            @method("post")
            <input type="hidden" name="shoe_id" id="shoe_id" value="{{ $shoe['id'] }}">
            <input type="hidden" name="user_id" id="user_id" value="{{ Auth()->user()->id }}">
            <button class="btn btn-secondary" type="submit"  onclick="return confirm('yakin untuk menyewa sepatu ini?')">RENT</button>
          </form>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

</x-app-layout>