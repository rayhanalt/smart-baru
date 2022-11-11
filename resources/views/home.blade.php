<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="halloween">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @livewireStyles
    <link href="{{ asset('aos/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('aos/aos.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/ss.png') }}" />
    <title>UMC</title>
</head>

<body>
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            <div class="navbar bg-base-100 p-4">
                <div class="navbar-start">
                    @if (auth()->user())
                        <div data-aos="slide-right" class="flex-none">
                            <label for="my-drawer" class="btn-ghost btn-square btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="inline-block h-5 w-5 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </label>
                        </div>
                    @endif
                    <div @if (auth()->user()) class="ml-5" @endif data-aos="slide-down">
                        @if (auth()->user())
                            <a class="{{ Request::is('dashboard*') ? 'animate-pulse' : '' }}" href="/dashboard">
                        @endif
                        <img class="btn-ghost btn-circle btn" src="{{ asset('img/ss.png') }}">
                        @if (auth()->user())
                            </a>
                        @endif
                    </div>
                </div>
                <div class="navbar-center">
                    @if (auth()->user())
                        <a class="text-xl normal-case">{{ auth()->user()->nama }}</a>
                    @elseif (session()->has('nim'))
                        {{ session()->get('nim') }} | {{ session()->get('nama') }}
                    @else
                        <p>Universitas Muhammadiyah Cirebon</p>
                    @endif
                </div>
                <div class="navbar-end" data-aos="slide-down">
                    @if (auth()->user())
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn-outline btn-error btn">Logout</button>
                        </form>
                    @elseif (session()->has('nim'))
                        <form action="/hapus" method="POST">
                            @csrf
                            <button type="submit" class="btn-outline btn-error btn">Hapus Sesi</button>
                        </form>
                    @else
                        <a href="/loginpage" class="btn-outline btn-info btn">Login</a>
                    @endif
                </div>
            </div>

            <div class="ml-3 mr-3 mb-3 w-auto">
                @yield('content')
            </div>

            @if (session()->has('blocked'))
                <div class="fixed flex py-4 font-mono">
                    <div data-aos="slide-left" class="alert alert-error fixed right-2 bottom-20 w-52 shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span> {{ session('blocked') }}</span>

                        </div>
                    </div>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="fixed flex py-4 font-mono">
                    <div data-aos="slide-left" class="alert alert-success fixed right-2 bottom-20 w-52 shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span> {{ session('success') }}</span>

                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu w-80 overflow-y-auto bg-base-100 p-4 text-base-content">
                <!-- Sidebar content here -->
                <li><a class="{{ Request::is('kriteria*') ? 'active hover:bg-orange-500' : '' }}"
                        href="/kriteria">Kriteria</a></li>
                <li><a class="{{ Request::is('kategori*') ? 'active hover:bg-orange-500' : '' }}"
                        href="/kategori">Kategori</a></li>
                <li><a class="{{ Request::is('alternatif*') ? 'active hover:bg-orange-500' : '' }}"
                        href="/alternatif">Alternatif</a></li>
                <li><a class="{{ Request::is('mahasiswa*') ? 'active hover:bg-orange-500' : '' }}"
                        href="/mahasiswa">Mahasiswa</a></li>

            </ul>
        </div>
    </div>
    <script src="{{ asset('aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            anchorPlacement: 'center-center', // defines which position of the element regarding to window should trigger the animation
        });
    </script>
    <script defer src="{{ asset('alpinejs/alpine.min.js') }}"></script>
    @livewireScripts
</body>

</html>
