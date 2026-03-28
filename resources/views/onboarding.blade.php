<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Willkommen bei EuroNyxi - Onboarding') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-6">
                        Bitte richte deine Installation ein, um EuroNyxi nutzen zu können.
                    </p>

                    <form method="POST" action="{{ route('onboarding.store') }}">
                        @csrf

                        <!-- API Key -->
                        <div>
                            <x-input-label for="api_key" :value="__('API Key (z.B. OpenAI, Mistral)')" />
                            <x-text-input id="api_key" class="block mt-1 w-full" type="password" name="api_key" required autofocus />
                            <x-input-error :messages="$errors->get('api_key')" class="mt-2" />
                        </div>

                        <!-- Modell-Auswahl -->
                        <div class="mt-4">
                            <x-input-label for="model_id" :value="__('Bevorzugtes KI-Modell')" />
                            <select id="model_id" name="model_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @forelse($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->display_name }}</option>
                                @empty
                                    <option disabled>Keine Modelle verfügbar. Bitte Administrator kontaktieren oder Seeder ausführen.</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('model_id')" class="mt-2" />
                        </div>

                        <!-- Agent Name -->
                        <div class="mt-4">
                            <x-input-label for="agent_name" :value="__('Name deines ersten KI-Agenten')" />
                            <x-text-input id="agent_name" class="block mt-1 w-full" type="text" name="agent_name" value="Standard Agent" required />
                            <x-input-error :messages="$errors->get('agent_name')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Einrichtung abschließen') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
