@extends('home')
@section('content')
    <div class="mt-20 flex place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl lg:w-1/2">
            <div class="card-body">
                <h3 class="text-lg font-bold">Rekomendasi UKM dalam kategori {{ $kategori->nama_kategori }}
                </h3>
                <hr>

                <table class="table w-full">
                    {{-- head --}}
                    <thead>

                        <tr>
                            <th></th>
                            <th>Nama UKM</th>
                            <th class="text-center">Hasil Akhir</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($total as $item)
                            <tr @if ($loop->iteration == 1) class='text-red-500 font-bold' @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->alternatif->nama_alternatif }}</td>
                                <td class="text-center">{{ $item->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
