<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Abyss') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('abyss.index') }}" class="mb-3 btn btn-primary">Edit Abyss Data</a>
                    <form action="{{ route('abyss.update', $abyss->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="patch" class="form-label">Patch</label>
                            <input type="text" class="form-control" name="patch" value="{{ $abyss->patch }}" id="patch">
                        </div>

                        <div class="mb-3">
                            <label for="diff" class="form-label">Dificulty</label>
                            <input type="text" class="form-control" name="diff" value="{{ $abyss->diff }}" id="diff">
                        </div>

                        <div class="mb-3">
                            <label for="bestTeam" class="form-label">Best Team</label>
                            <input type="text" class="form-control" name="bestTeam" value="{{ $abyss->bestTeam }}" id="bestTeam">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>