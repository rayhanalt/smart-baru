@extends('home')
@section('content')
    <div class="mt-20 flex place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl lg:w-1/2">
            <div class="card-body">
                <h3 class="text-lg font-bold">Pilih Parameter</h3>
                <hr>
                <form action="/spk/spk/{{ $kriteria->kode_kriteria }}" method="post">
                    @csrf
                    <table class="table w-full">
                        {{-- head --}}
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama Kategori</th>
                                <th class="text-center">
                                    {{ $kriteria->nama_kriteria }}
                                    <input type="hidden" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" />
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @foreach ($kategori as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->nama_kategori }}
                                        <input type="hidden" name="[]">
                                    </td>
                                    <td>
                                        <select class="select select-bordered select-sm w-full max-w-xs"
                                            name="nilai_parameter[{{ $item->kode_kategori }}]">
                                            <option disabled selected>Pilih untuk {{ $item->nama_kategori }}</option>
                                            <option value="0.2">Sangat</option>
                                            <option value="0.4">Biasa</option>
                                            <option value="0.8">Kurang</option>
                                            <option value="1">Tidak</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class="mt-4 flex justify-end">
                        <button type="reset" class="btn btn-outline btn-error btn-sm">reset</button>
                        <button type="submit" class="btn btn-outline btn-success btn-sm ml-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection