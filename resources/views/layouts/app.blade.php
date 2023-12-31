<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-page-structure.head></x-page-structure.head>
<body class="m-0 w-100vh">

<div id="app">
    <x-svg.symbol_bootstrap></x-svg.symbol_bootstrap>

    <x-page-structure.header></x-page-structure.header>

    <div class="container-fluid">
        <div class="row">
            @guest
                @if (Route::has('login'))
                    @yield('content')
                @endif

            @else

                <x-page-structure.sidebar></x-page-structure.sidebar>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4   vh-100">
                    @yield('content')
                </main>

            @endguest

        </div>
    </div>
    @push('scripts')
        <script>
            alert(Echo.private(`chat`)
                .listen('MessageSent', (e) => {
                    console.log(e.messages);
                }))
            Echo.private(`chat`)
                .listen('MessageSent', (e) => {
                    console.log(e.messages);
                });
        </script>
    @endpush
</div>
@stack('scripts')
</body>
</html>
