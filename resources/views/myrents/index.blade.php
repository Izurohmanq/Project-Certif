<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('MyRents') }}
    </h2>
  </x-slot>

  <div class="p-12">
    <div class="mx-auto max-w-7xl overflow-x-auto rounded-xl bg-white p-10 sm:px-6 lg:px-8">
      <div class="p-12">
        <div class="mx-auto max-w-7xl overflow-x-auto rounded-xl bg-white p-10 sm:px-6 lg:px-8">
          <table class="table rounded-none" id="rents-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Shoe</th>
                <th>Rent date</th>
                <th>Rent deadline</th>
                <th>Price</th>
                <th>Penalty</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($myrents as $myrent)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $myrent->shoe->name }}</td>
                  <td>{{ $myrent->created_at }}</td>
                  <td>{{ $myrent->created_at->addDays(5) }}</td>
                  <td>{{ $myrent->shoe->price }}</td>
                  <td>{{ $myrent->created_at->diffInDays(now()) > 5 ? $myrent->created_at->diffInDays(now()) * $myrent->shoe->price : 0 }}</td>
                  <td class="font-bold">{{ $myrent->status }}</td>
                  <td>
                    <form action="{{ route('rents.return', $myrent->id) }}" method="POST">
                      @csrf
                      @method('patch')
                      <button class="btn btn-primary btn-sm" type="submit" {{ $myrent->status === 'rented' ? null : 'disabled' }}>Return</button>
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
