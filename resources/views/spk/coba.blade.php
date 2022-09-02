@extends('home')
@section('content')
    <h3 class="text-lg font-bold">Pilih Parameter</h3>
    <hr>
    {{ $max }}
    {{ $min }}
    @foreach ($parameterMinat as $para)
        {{ ($para->nilai_parameter - $min) / ($max - $min) }}
    @endforeach



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
                    <td>{{ $item->nilai_parameter }}</td>
                    <td>{{ $item->nilai_parameter }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
