@extends('home')
@section('content')
    <div class="mb-2 mr-2 ml-2 flex flex-row justify-between">
        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            {{-- <a href="/alternatif/create" class="btn-outline btn-primary btn-sm btn">➕ Data</a> --}}
        </div>

        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="pdf-alternatif" class="btn-outline btn-secondary btn-sm btn">📇 Print</a>
        </div>
    </div>

    <div class="top-32 right-10 left-10 w-auto">
        @livewire('alternatif-livewire')
    </div>
@endsection
