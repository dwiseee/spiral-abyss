<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Teams') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('team.index') }}" class="mb-3 btn btn-primary">Edit Team Data</a>
                    <form action="{{ route('team.update', $team->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="teamName" class="form-label">Team Name</label>
                            <input type="text" class="form-control" name="teamName" value="{{ $team->teamName }}" id="teamName">
                        </div>

                        <div class="mb-3">
                            <label for="teamDps" class="form-label">Team Main DPS</label>
                            <input type="text" class="form-control" name="teamDps" value="{{ $team->teamDps }}" id="teamDps">
                        </div>

                        <div class="mb-3">
                            <label for="teamReaction" class="form-label">Team Reaction</label>
                            <input type="text" class="form-control" name="teamReaction" value="{{ $team->teamReaction }}" id="teamReaction">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>