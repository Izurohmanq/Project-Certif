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
            <div class="overflow-x-auto bg-white p-7 rounded-2xl">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-2xl">Name</th>
                            <th class="text-2xl">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $category)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $category['name'] }}</td>

                            <td>
                                <div class="flex flex-column">
                                    <form action="{{ route('categories.destroy', $category['id']) }}" method="post" class="me-3">

                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary bg-red-300 hover:bg-red-900 hover:text-white">Delete</button>
                                    </form>
                                    <a href="{{ route('categories.edit', $category['id']) }}">
                                        <button class="btn btn-primary bg-cyan-200 hover:bg-cyan-900 hover:text-white">EDIT</button>
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