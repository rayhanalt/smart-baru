@extends('home')
@section('content')
    <div class="mt-8 flex place-content-center md:mt-20">
        <div class="card w-auto bg-base-100 shadow-xl lg:w-1/2">
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
                                <tr @if ($loop->iteration == 1) class='text-green-500 font-bold' @endif>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->kategori->nama_kategori }}
                                    </td>
                                    <td>{{ $item->total }}</td>
                                    <td>
                                        <button class="btn-outline btn-success btn-sm btn mr-1" type="submit"
                                            name="kode_kategori" value="{{ $item->kode_kategori }}">Mulai</button>
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
