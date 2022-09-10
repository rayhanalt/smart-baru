@extends('home')
@section('content')
    <h3 class="text-lg font-bold">
        {{ $maha->nama }} Detail
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
                        @foreach ($total as $item)
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
                            <th>Nama Kategori</th>
                            <th>Nama Kriteria</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->nama_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($util as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kategori->nama_kategori }}</td>
                                <td>{{ $item->kriteria->nama_kriteria }}</td>

                                <td>
                                    @if ($item->kriteria->nama_kriteria == 'Minat')
                                        {{ $item->nilai_utility }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kriteria->nama_kriteria == 'Bakat')
                                        {{ $item->nilai_utility }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kriteria->nama_kriteria == 'Pengalaman')
                                        {{ $item->nilai_utility }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
