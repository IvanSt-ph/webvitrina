<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Десктоп -->
        <div class="hidden lg:flex items-center justify-between h-16">
            
            <!-- Слева: Логотип + Категории -->
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="WebVitrina" class="h-9 w-auto" />
                    <span class="font-semibold text-gray-800">WebVitrina</span>
                </a>

                <!-- Кнопка Категории -->
                <button @click="open = true"
                    class="flex items-center gap-2 px-4 h-10 rounded-lg border border-gray-300 bg-white 
                           text-gray-700 shadow-sm transition-all duration-200 hover:bg-indigo-600 hover:text-white hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <span class="text-sm font-medium">Категории</span>
                </button>
            </div>


            
<!-- По центру: Поиск + выбор страны -->
<div class="flex-1 max-w-2xl px-8 flex items-center gap-3">
    <form action="{{ route('home') }}" method="GET" class="w-full">
        <div class="relative">
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Искать товары..."
                class="w-full rounded-xl border-gray-300 pr-10 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            <button type="submit" class="absolute inset-y-0 right-0 px-3 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 110-15 7.5 7.5 0 010 15z"/>
                </svg>
            </button>
        </div>
    </form>

    <!-- Выпадающий список стран -->
<div class="flex items-center gap-2">
    @php
        $country = request('country');
        $flags = [
            'Pridnestrovie' => 'flags/pridnestrovie.png',
            'Moldova' => 'flags/moldova.png',
            'Ukraine' => 'flags/ukraine.png',
        ];
    @endphp

    @if($country && isset($flags[$country]))
        <img src="{{ asset($flags[$country]) }}" alt="{{ $country }}" class="h-6 w-6">
    @else
        <img src="{{ asset('flags/all.png') }}" alt="Все страны" class="h-6 w-6">
    @endif

    <form action="{{ route('home') }}" method="GET">
        <select name="country" onchange="this.form.submit()"
            class="border-gray-300 rounded-lg p-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Все страны</option>
            <option value="Pridnestrovie" {{ $country=='Pridnestrovie' ? 'selected' : '' }}>Приднестровье</option>
            <option value="Moldova" {{ $country=='Moldova' ? 'selected' : '' }}>Молдова</option>
            <option value="Ukraine" {{ $country=='Ukraine' ? 'selected' : '' }}>Украина</option>
        </select>
    </form>
</div>



            <!-- Справа: Аккаунт / Корзина / Избранное -->
            <div class="flex items-center gap-5">
                @if (Route::has('favorites.index'))
                    <a href="{{ route('favorites.index') }}" class="text-gray-600 hover:text-red-500" title="Избранное">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                                2 6 4 4 6.5 4c1.74 0 3.41 1 4.22 2.44C11.09 5 
                                12.76 4 14.5 4 17 4 19 6 19 8.5c0 3.78-3.4 
                                6.86-8.55 11.54L12 21.35z"/>
                        </svg>
  
                    </a>
                @endif
                @if (Route::has('cart.index'))
                    <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-indigo-600" title="Корзина">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2.25 3a.75.75 0 000 1.5h1.386c.17 0 
                                .32.114.363.279l2.098 7.868A2.25 2.25 
                                0 008.271 14.25H17.5a2.25 2.25 
                                0 002.18-1.62l1.69-6.084A.75.75 
                                0 0020.66 5.25H6.258l-.43-1.612A2.25 
                                2.25 0 003.636 2.25H2.25z"/>
                            <path d="M8.25 20.25a1.5 1.5 0 100-3 
                                1.5 1.5 0 000 3zM18 20.25a1.5 
                                1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                    </a>
                @endif

                @auth
                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm leading-4 rounded-md text-gray-600 bg-white hover:text-gray-900">
                                <span class="hidden md:inline">Добро пожаловать, {{ auth()->user()->name }}</span>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('cabinet')">Личный кабинет</x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">Редактировать профиль</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Выйти
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Войти</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">Регистрация</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
