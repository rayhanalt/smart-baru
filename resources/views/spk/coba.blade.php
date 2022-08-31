@extends('home')
@section('content')
    <div class="mt-20 flex w-auto place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl lg:w-1/2">
            <div class="card-body">
                <h3 class="text-lg font-bold">Pilih Parameter</h3>
                <hr>
                <table class="table w-full">
                    {{-- head --}}
                    <thead>

                        <tr>
                            <th></th>
                            <th>Nama Kategori</th>
                            <th>Nama Kriteria</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai Parameter</th>
                            <th>hitung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($katben as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kategori->nama_kategori }}</td>
                                <td>{{ $item->kriteria->nama_kriteria }}</td>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td class="text-center">{{ $item->nilai_parameter }}</td>
                                <td class="text-center">{{ $item->kriteria->bobot * $item->nilai_parameter }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
