@extends('home')
@section('content')
    <div class="mb-2 mr-2 ml-2 mt-2 flex flex-row justify-between">
        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="/kategori/create" class="btn-primary btn-active btn-sm btn hover:btn-ghost">➕ Data</a>
        </div>

        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="pdf-kategori" class="btn-secondary btn-active btn-sm btn hover:btn-ghost">📇 Print</a>
        </div>
    </div>
    <div class="top-32 right-10 left-10 w-auto">
        @livewire('kategori-livewire')
    </div>
@endsection
