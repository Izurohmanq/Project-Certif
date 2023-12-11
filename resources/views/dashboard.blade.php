<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <x-slot name="import">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" rel="stylesheet" />
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-x-auto">
        <table class="table-auto" id="users-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>IsAdmin</th>
            </tr>
          <tbody>

          </tbody>
          </thead>
        </table>
      </div>
    </div>
  </div>

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: `{{ route('dashboard.getUser') }}`,
          columns: [{
              data: 'id',
              name: 'id'
            },
            {
              data: 'name',
              name: 'name'
            },
            {
              data: 'email',
              name: 'email'
            },
            {
              data: 'is_admin',
              name: 'is_admin'
            },

          ]
        });
      });
    </script>
  @endpush
</x-app-layout>
