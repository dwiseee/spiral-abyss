<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Meta Teams Right Now') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('chara.create') }}" class="mb-3 btn btn-primary">Tambah Character</a>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Character Name</th>
                                <th>Vision</th>
                                <th>Nation</th>
                                <th>Weapon</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach ($charas as $no => $data)
                                <tr>
                                <th>{{ $no+1 }}</th>
                                <td>{{ $data->charName }}</td>
                                <td>{{ $data->vision }}</td>
                                <td>{{ $data->nation }}</td>
                                <td>{{ $data->weapon }}</td>
                                <td>
                                    <form action="{{ route('chara.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <a href="{{ route('chara.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger">Delete</button></form>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                    </table>

            </div>
        </div>
    </div>
</x-app-layout>