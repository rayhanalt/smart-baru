@extends('home')
@section('content')
    <div class="ml-2 mb-2" data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
        <a href="/kategori/create" class="btn btn-outline btn-primary btn-sm">➕ Data</a>
    </div>
    <div class="top-32 right-10 left-10 w-auto">
        @livewire('kategori-livewire')
    </div>
@endsection
