@extends('home')
@section('content')
    <div class="mb-2 mr-2 ml-2 flex flex-row justify-between">
        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="/kategori/create" class="btn-outline btn btn-primary btn-sm">➕ Data</a>
        </div>

        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="pdf-kategori" class="btn-outline btn btn-secondary btn-sm">📇 Print</a>
        </div>
    </div>
    <div class="top-32 right-10 left-10 w-auto">
        @livewire('kategori-livewire')
    </div>
@endsection
