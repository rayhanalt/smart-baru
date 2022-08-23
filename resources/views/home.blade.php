<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="business">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            <div class="navbar bg-base-100 fixed top-0">
                <div class="navbar-start">
                    @if (auth()->user())
                        <div data-aos="slide-right" class="flex-none">
                            <label for="my-drawer" class="btn btn-square btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="inline-block h-5 w-5 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </label>
                        </div>
                    @endif
                    <div @if (auth()->user()) class="ml-5" @endif data-aos="slide-down">
                        <img class="btn btn-ghost btn-circle" src="{{ asset('img/ss.png') }}">
                    </div>
                </div>
                <div class="navbar-center">
                    @if (auth()->user())
                        <a class="text-xl normal-case">{{ auth()->user()->nama }}</a>
                    @elseif (session()->has('alur'))
                        {{ session()->get('alur') }}
                    @else
                        <p>Universitas Muhammadiyah Cirebon</p>
                    @endif
                </div>
                <div data-aos="slide-left" class="navbar-end">
                    @if (auth()->user())
                        <form data-aos="zoom-in" action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-error">Logout</button>
                        </form>
                    @elseif (session()->has('alur'))
                        <form data-aos="zoom-in" action="/hapus" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-error">Hapus Sesi</button>
                        </form>
                    @else
                        <a href="/loginpage" class="btn btn-outline btn-info">Login</a>
                    @endif
                </div>
            </div>
            <div class="ml-3 mr-3 mb-[53px] mt-[69px]">
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
                            <script>
                                setTimeout(function() {
                                    window.location.replace('{{ url()->current() }}');
                                }, 1500);
                            </script>
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
                            <script>
                                setTimeout(function() {
                                    window.location.replace('{{ url()->current() }}');
                                }, 1500);
                            </script>
                        </div>
                    </div>
                </div>
            @endif

            <footer class="footer footer-center bg-base-300 text-base-content fixed bottom-0 p-4">
                <div>
                    <p>Copyright © 2022 - Sistem Pendukung Keputusan Pemilihan UKM</p>
                </div>
            </footer>

        </div>
        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu bg-base-100 text-base-content w-80 overflow-y-auto p-4">
                <!-- Sidebar content here -->
                <li><a class="{{ Request::is('kriteria*') ? 'active hover:bg-sky-700' : '' }}"
                        href="/kriteria">Kriteria</a></li>
                <li><a class="{{ Request::is('kategori*') ? 'active hover:bg-sky-700' : '' }}"
                        href="/kategori">Kategori</a></li>
                <li><a class="{{ Request::is('alternatif*') ? 'active hover:bg-sky-700' : '' }}"
                        href="/alternatif">Alternatif</a></li>
                <li><a class="{{ Request::is('mahasiswa*') ? 'active hover:bg-sky-700' : '' }}"
                        href="/mahasiswa">Mahasiswa</a></li>

            </ul>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            anchorPlacement: 'center-center', // defines which position of the element regarding to window should trigger the animation
        });
    </script>
</body>

</html>
