@extends('home')
@section('content')
    <h3 class="text-lg font-bold">
        @foreach ($total_kategori as $item)
            {{ $item->mahasiswa->nama }} Detail
        @break
    @endforeach
</h3>
<hr>
<div class="mb-2 mt-2 flex place-content-center">
    <div
        class="stats stats-vertical xl:stats-horizontal lg:stats-horizontal m-auto h-auto w-screen shadow-sm shadow-black">
        <div class="stat place-items-center">

            <table class="table w-full">
                {{-- head --}}
                <thead>

                    <tr>
                        <th></th>
                        <th>Nama Kategori</th>
                        <th>Hasil Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($total_kategori as $item)
                        <tr @if ($loop->iteration == 1) class='text-red-500 font-bold' @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="stat place-items-center">
            <table class="table w-full">
                {{-- head --}}
                <thead>

                    <tr>
                        <th></th>
                        <th>Nama UKM</th>
                        <th>Hasil Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($total_alternatif as $item)
                        <tr @if ($loop->iteration == 1) class='text-red-500 font-bold' @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->alternatif->nama_alternatif }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="stat place-items-center">
            <table class="table w-full"> --}}
        {{-- head --}}
        {{-- <thead>

                    <tr>
                        <th></th>
                        <th>Nama Kategori</th>
                        @foreach ($kriteria as $item)
                            <th>{{ $item->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead> --}}
        {{-- <tbody>
                    <!-- row 1 -->
                    @foreach ($total as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori->alternatif->nama_alternatif }}</td> --}}
        {{-- @foreach ($util as $utils)
                                <td>{{ $utils->nilai_utility }}</td>
                            @endforeach --}}
        {{-- </tr> --}}
        {{-- @endforeach
                </tbody>
            </table>
        </div> --}}
    </div>
</div>
@endsection
