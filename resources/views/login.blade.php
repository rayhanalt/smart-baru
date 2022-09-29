<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta refresh="...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="{{ asset('aos/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('aos/aos.css') }}" rel="stylesheet">
    <title>Test</title>
</head>

<body>
    <section class="flex min-h-screen items-stretch bg-[#131514] text-white">
        <div data-aos="slide-right" data-aos-easing="ease"
            class="relative hidden w-1/2 items-center rounded-r-full bg-gray-500 bg-cover bg-no-repeat lg:flex"
            style="background-image: url(img/umc.jpg)">
            <div class="absolute inset-0 z-0 rounded-r-full bg-black opacity-60 shadow-lg shadow-black"></div>
            <div class="z-10 w-full px-24">
                <h1 class="text-left text-5xl font-bold tracking-wide">Universitas Muhammadiyah Cirebon</h1>
                <p class="my-4 text-3xl">Sistem Pendukung Keputusan</p>
            </div>
        </div>
        <div class="z-0 flex w-full items-center justify-center px-0 text-center md:px-16 lg:w-1/2"
            style="background-color: #131514;">
            <div class="absolute inset-0 z-10 items-center bg-gray-500 bg-cover bg-no-repeat transition-all lg:hidden"
                style="background-image: url(img/umc.jpg)">
                <div class="absolute inset-0 z-0 bg-black opacity-60"></div>
            </div>

            <div class="z-20 w-full py-6 font-mono">
                @if (session()->has('failed'))
                    <div data-aos="slide-down" class="alert alert-error shadow-lg transition-all duration-300">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span> {{ session('failed') }}</span>
                        </div>
                    </div>
                @endif
                @if (session()->has('blocked'))
                    <div data-aos="slide-down" class="alert alert-error shadow-lg transition-all duration-300">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span> {{ session('blocked') }}</span>
                            <script>
                                setTimeout(function() {
                                    window.location.replace('{{ url()->current() }}');
                                }, 2000);
                            </script>
                        </div>
                    </div>
                @endif
                <h1 data-aos="slide-down" data-aos-duration="1100" class="my-6">
                    <img src="img/login.png" alt="Login" class="mx-auto opacity-60 transition-all hover:scale-105">
                </h1>
                <a href="/" class="btn-outline btn btn-warning btn-sm fixed top-2 right-2 rounded-full">back</a>
                <form action="/login" autocomplete="off" method="post" class="mx-auto w-2/3 px-4 lg:px-0">
                    @csrf
                    <div data-aos="slide-down" data-aos-duration="1200" class="pb-2 pt-4">
                        <input type="text" name="username" id="username" placeholder="Masukkan Username..."
                            value="{{ old('username') }}"
                            class="block w-full rounded-2xl bg-zinc-900 p-4 text-lg transition-all hover:scale-105 focus:scale-105"
                            autofocus required>
                        @error('username')
                            <span class="text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div data-aos="slide-down" data-aos-duration="1300" class="pb-2 pt-4">
                        <input
                            class="block w-full rounded-2xl bg-zinc-900 p-4 text-lg transition-all hover:scale-105 focus:scale-105"
                            type="password" name="password" id="password" required placeholder="Password">
                    </div>

                    <div data-aos="slide-down" data-aos-duration="1400" class="px-4 pb-2 pt-4">
                        <button
                            class="block w-full rounded-full bg-rose-500 p-4 text-lg uppercase transition-all hover:scale-105 hover:bg-rose-600 focus:scale-105 active:bg-rose-700">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="{{ asset('aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: 'ease-in-out-back', // default easing for AOS animations
            anchorPlacement: 'center-center', // defines which position of the element regarding to window should trigger the animation
        });
    </script>
</body>

</html>
