@extends('home')
@section('content')
    <div class="flex place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl lg:w-1/2">
            <div class="card-body">
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
        </div>
    </div>
@endsection
