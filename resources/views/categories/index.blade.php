<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Categories') }}
      </h2>
      <a href="{{ route('categories.create') }}">
        <x-primary-button class="ms-3">
          {{ __('Create') }}
        </x-primary-button>
      </a>
    </div>
  </x-slot>

  <x-slot name="import">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" rel="stylesheet" />
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-x-auto rounded-2xl bg-white p-7">
        <table class="table table-zebra">
          <!-- head -->
          <thead>
            <tr>
              <th></th>
              <th class="text-2xl">Name</th>
              <th class="text-2xl">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $index => $category)
              <tr>
                <th>{{ $index + 1 }}</th>
                <td>{{ $category['name'] }}</td>

                <td>
                  <div class="flex-column flex">
                    <form class="me-3" action="{{ route('categories.destroy', $category['id']) }}" method="post">

                      @csrf
                      @method('delete')
                      <button class="btn btn-primary btn-sm" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('categories.edit', $category['id']) }}">
                      <button class="btn btn-secondary btn-sm">EDIT</button>
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
