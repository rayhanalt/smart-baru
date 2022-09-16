@extends('home')
@section('content')
    <div class="flex place-content-center">
        <div class="card bg-base-100 w-auto shadow-xl lg:w-1/2">
            <div class="card-body">
                <h3 class="text-lg font-bold">Pilih Parameter Untuk UKM Dalam Kategori @foreach ($alternatif as $item)
                        {{ $item->kategori->nama_kategori }}
                    @break
                @endforeach untuk kriteria {{ $kriteria->nama_kriteria }}
            </h3>

            <hr>
            <form action="/spk/spk-alternatif/{{ $kriteria->kode_kriteria }}" method="post">
                @csrf
                <table class="table w-full">
                    {{-- head --}}
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama UKM</th>
                            <th class="text-center">
                                {{ $kriteria->nama_kriteria }}
                                <input type="hidden" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" />

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($alternatif as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->nama_alternatif }}
                                </td>

                                <td>
                                    <select class="select select-bordered select-sm w-full max-w-xs"
                                        name="nilai_parameter[{{ $item->kode_alternatif }}]">
                                        <option disabled selected>Pilih untuk {{ $item->nama_alternatif }}</option>
                                        <option value="1">Sangat</option>
                                        <option value="0.8">Biasa</option>
                                        <option value="0.4">Kurang</option>
                                        <option value="0.2">Tidak</option>
                                    </select>
                                </td>
                            </tr>
                            <input type="hidden" name="kode_kategori" value="{{ $item->kategori->kode_kategori }}">
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 flex justify-end">
                    <button type="reset" class="btn btn-outline btn-error btn-sm">reset</button>
                    <button type="submit" class="btn btn-outline btn-success btn-sm ml-2">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
