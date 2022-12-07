<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Characters') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('chara.index') }}" class="mb-3 btn btn-primary">Data Characters</a>
                    <form action="{{ route('chara.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="charName" class="form-label">Character Name</label>
                            <input type="text" class="form-control" name="charName" id="charName">
                        </div>

                        <div class="mb-3">
                            <label for="vision" class="form-label">Vision</label>
                            <input type="text" class="form-control" name="vision" id="vision">
                        </div>

                        <div class="mb-3">
                            <label for="nation" class="form-label">Nation</label>
                            <input type="text" class="form-control" name="nation" id="nation">
                        </div>

                        <div class="mb-3">
                            <label for="weapon" class="form-label">Weapon</label>
                            <input type="text" class="form-control" name="weapon" id="weapon">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>