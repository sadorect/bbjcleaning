<div class="relative inline-block text-left">
    <div>
        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none" id="language-menu-button" aria-expanded="false" aria-haspopup="true">
            <img src="{{ asset('flags/' . config('languages.' . App::getLocale() . '.flag-icon') . '.svg') }}" 
                 class="w-5 h-5 mr-2" 
                 alt="{{ config('languages.' . App::getLocale() . '.display') }}">
            {{ config('languages.' . App::getLocale() . '.display') }}
        </button>
    </div>

    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="language-menu-button" tabindex="-1">
        <div class="py-1" role="none">
            @foreach(config('languages') as $locale => $language)
                <a href="{{ route('language.switch', $locale) }}" 
                   class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                   role="menuitem" 
                   tabindex="-1">
                    <img src="{{ asset('flags/' . $language['flag-icon'] . '.svg') }}" 
                         class="w-5 h-5 mr-2" 
                         alt="{{ $language['display'] }}">
                    {{ $language['display'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>
