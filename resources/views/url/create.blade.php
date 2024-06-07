<x-guest-layout>
        @component('components.flush-status-session')@endcomponent
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="text-2xl font-medium text-gray-900 mb-4">Create New URL MAP</h2>
        <form method="POST" action="{{ route('urls.shorten') }}">
            @csrf

            <!-- Original Url -->
            <div>
                <x-input-label for="original_url" :value="'Original URL(*)'"/>
                <x-text-input id="original_url" class="block mt-1 w-full" type="url" name="original_url"
                              placeholder="https://example.com" pattern="https?://.*.*" size="2048"
                              :value="old('original_url')" required autofocus autocomplete="original_url"/>
                <x-input-error :messages="$errors->get('original_url')" class="mt-2"/>
            </div>
            {{--About optional--}}
            <div>
                <x-input-label for="about" :value="'About'"/>
                <x-text-input id="about" class="block mt-1 w-full" type="text" name="about"
                              placeholder="Short Info" size="250"
                              :value="old('about')" autocomplete="about"/>
                <x-input-error :messages="$errors->get('about')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('urls.index') }}">
                    {{ __('Go to List') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Shorten') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
