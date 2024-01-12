<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">

<div class="container">
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:flex">
                        <x-nav-link :href="route('users.blogs.index')" :active="request()->routeIs('users.blogs.index')">
                            {{ __('Ana Sayfa') }}
                        </x-nav-link>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @guest
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Giriş Yap') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Üye Ol') }}
                        </x-nav-link>
                    @endguest
                </div>

                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    @auth
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    @endauth
                </div>

                <div class="mt-3 space-y-1">
                    @auth
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    
<!-- resources/views/layouts/app.blade.php -->

<!-- ... (diğer kodlar) ... -->

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($blogs as $blog)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="https://picsum.photos/400/300" alt="Random Image" class="mb-4 rounded-md">

                    <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold">İçerik</label>
                        <textarea id="content" name="content" class="form-textarea mt-1 block w-full" readonly>{{ $blog->content }}</textarea>
                    </div>

                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01"></path>
                        </svg>
                        Kategori: {{ $blog->category_name }}
                    </div>

                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01"></path>
                        </svg>
                        Yazar: {{ $blog->user_name }}
                    </div>

                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"></path>
                        </svg>
                        Tarih: {{ $blog->created_at->format('d/m/Y') }}
                    </div>

                    <a href="{{ route('users.blogs.show', $blog) }}" class="text-blue-500 mt-4 inline-block">Devamını Oku</a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- ... (diğer kodlar) ... -->



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
