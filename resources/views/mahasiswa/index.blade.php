@extends('home')
@section('content')
    <div class="mb-2 mr-2 mt-2 flex place-content-end" data-aos="slide-up" data-aos-duration="1000"
        data-aos-easing="ease-in-out-cubic">
        <a href="pdf-mahasiswa" class="btn-secondary btn-active btn-sm btn hover:btn-ghost">📇 Print</a>
    </div>
    <div class="top-32 right-10 left-10 w-auto">
        @livewire('mahasiswa-livewire')
    </div>
@endsection
