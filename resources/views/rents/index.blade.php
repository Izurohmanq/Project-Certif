<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Rents') }}
    </h2>
  </x-slot>

  <div class="p-12">
    <div class="mx-auto max-w-7xl overflow-x-auto rounded-xl bg-white p-10 sm:px-6 lg:px-8">
      <div class="p-5">
        <div class="mx-auto max-w-7xl overflow-x-auto rounded-xl bg-white sm:px-6 lg:px-8">
          <table class="table rounded-none" id="rents-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tenant</th>
                <th>Shoe</th>
                <th>Rent date</th>
                <th>Rent deadline</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rents as $rental)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="flex items-center gap-3">
                    <div class="avatar">
                      <div class="w-7 rounded-full ring-2 ring-indigo-400 ring-offset-1">
                        <img src="{{ $rental->user->avatar ?? 'https://ui-avatars.com/api/?background=random&name=' . $rental->user->name }}" />
                      </div>
                    </div>
                    <p>{{ $rental->user->name }}</p>
                  </td>
                  <td>{{ $rental->shoe->name }}</td>
                  <td>{{ $rental->created_at }}</td>
                  <td>{{ $rental->created_at->addDays(5) }}</td>
                  <td class="font-bold">{{ $rental->status }}</td>
                  <td class="flex gap-2">
                    <form action="{{ route('rents.update', $rental->id) }}" method="POST">
                      @csrf
                      @method('patch')
                      <button class="btn btn-primary btn-sm" type="submit" {{ $rental->status === 'pending_rent' || $rental->status === 'pending_return' ? null : 'disabled' }}>Approve</button>
                    </form>

                    <form action="{{ route('rents.deny', $rental->id) }}" method="POST">
                      @csrf
                      @method('patch')
                      <button class="btn btn-secondary btn-sm" type="submit" {{ $rental->status === 'pending_rent' || $rental->status === 'pending_return' ? null : 'disabled' }}>Deny</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
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
        $('#rents-table').DataTable();
      });
    </script>
  @endpush
</x-app-layout>
