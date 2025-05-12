<div class="min-h-screen bg-gray-100 px-4 py-12">
    <div class="max-w-md w-full mx-auto bg-white rounded-2xl shadow-xl p-6 space-y-6">
        @if (session()->has('success'))
            <div class="p-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <fieldset class="space-y-4">
            <legend class="text-lg font-semibold text-gray-800">Réserver une période</legend>

            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">
                    Date de début
                </label>
                <input wire:model="start_date" id="start_date" type="date"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-900 focus:ring-2 focus:ring-primary focus:outline-none focus:border-primary">
                @error('start_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">
                    Date de fin
                </label>
                <input wire:model="end_date" id="end_date" type="date"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-900 focus:ring-2 focus:ring-primary focus:outline-none focus:border-primary">
                @error('end_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </fieldset>

        <div>
            <button wire:click="submit" wire:loading.attr="disabled"
                    class="w-full flex justify-center items-center px-4 py-2 rounded-lg bg-secondary text-white font-semibold transition hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Valider la réservation</span>
                <svg wire:loading class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
