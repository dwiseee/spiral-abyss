<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Meta Teams Right Now') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('abyss.create') }}" class="mb-3 btn btn-primary">Tambah Abyss</a>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patch</th>
                                <th>Dificulty</th>
                                <th>Team Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach ($abyss as $no => $data)
                                <tr>
                                <th>{{ $no+1 }}</th>
                                <td>{{ $data->patch }}</td>
                                <td>{{ $data->diff }}</td>
                                <td>{{ $data->bestTeam }}</td>
                                
                                <td>
                                    <form action="{{ route('abyss.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <a href="{{ route('abyss.edit', $data->id) }}" class="btn btn-primary">Edit</a>
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