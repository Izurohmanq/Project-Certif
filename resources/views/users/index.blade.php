<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Users') }}
      </h2>
      <a href={{ route('users.create') }}>
        <x-primary-button class="ms-3">
          {{ __('Create') }}
        </x-primary-button>
      </a>
    </div>
  </x-slot>

  <div class="p-12">
    <div class="mx-auto max-w-7xl overflow-x-auto rounded-xl bg-white p-10 sm:px-6 lg:px-8">
      <table class="table rounded-none" id="users-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="flex items-center gap-3">
                <div class="avatar">
                  <div class="w-7 rounded-full ring-2 ring-indigo-400 ring-offset-1">
                    <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?background=random&name=' . $user->name }}" />
                  </div>
                </div>
                <p>{{ $user->name }} {{ $user->id === auth()->user()->id ? '(me)' : null }}</p>
              </td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
              <td class="flex gap-2">
                @if ($user->id !== auth()->user()->id)
                  <a href="{{ route('users.edit', $user->id) }}">
                    <button class="btn btn-primary btn-sm">Edit</button>
                  </a>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <x-slot name="import">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  </x-slot>

  @push('scripts')
    <script>
      $(document).ready(function() {
        $('#users-table').DataTable();
      });
    </script>
  @endpush
</x-app-layout>
