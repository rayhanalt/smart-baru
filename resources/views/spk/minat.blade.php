@extends('home')
@section('content')
    <div class="mt-40 flex place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Pilih Parameter</h3>
                <hr>
                <table class="table w-full">
                    {{-- head --}}
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>
                                    <input type="radio" name="1" id="1" data-title="1" class="btn" />
                                    <input type="radio" name="2" id="2" data-title="2" class="btn" />
                                    <input type="radio" name="3" id="3" data-title="3" class="btn" />
                                    <input type="radio" name="4" id="4" data-title="4" class="btn" />
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
