@extends('home')
@section('content')
    <div class="mt-20 flex place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl lg:w-1/2">
            <div class="card-body">
                <form action="/spk/hasil" class="mt-1" enctype="multipart/form-data" method="post">
                    @csrf
                    <table class="table w-full">
                        {{-- head --}}
                        <thead>

                            <tr>
                                <th></th>
                                <th>Nama Kategori</th>
                                <th>Hasil Akhir</th>
                                <th class="text-center">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @foreach ($total as $item)
                                <tr @if ($loop->iteration == 1) class='text-red-500 font-bold' @endif>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->kategori->nama_kategori }}
                                    </td>
                                    <td>{{ $item->total }}</td>
                                    <td>
                                        <button class="btn btn-outline btn-success btn-sm mr-1" type="submit"
                                            name="kode_kategori" value="{{ $item->kode_kategori }}">Mulai</button>
                                        {{-- <input class="btn btn-outline btn-success btn-sm mr-1" type="submit"
                                            name="kode_kategori" value="{{ $item->kode_kategori }}"> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
