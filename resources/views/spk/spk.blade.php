@extends('home')
@section('content')
    <div class="mt-8 flex place-content-center md:mt-20">
        <div class="card w-auto bg-base-100 shadow-xl lg:w-1/2">
            <div class="card-body">
                <h3 class="text-lg font-bold">Pilih Parameter dalam kriteria {{ $kriteria->nama_kriteria }}</h3>
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
                                    </td>
                                    <td>
                                        <select class="select-bordered select select-sm w-full max-w-xs"
                                            name="nilai_parameter[{{ $item->kode_kategori }}]">
                                            <option class="text-zinc-700" selected value="0.2">Pilih untuk
                                                {{ $item->nama_kategori }}</option>
                                            @if ($kriteria->kode_kriteria == 'KD-001')
                                                <option value="1">Sangat</option>
                                                <option value="0.8">Biasa</option>
                                                <option value="0.4">Kurang</option>
                                                <option value="0.2">Tidak</option>
                                            @endif
                                            @if ($kriteria->kode_kriteria == 'KD-002')
                                                <option value="1">Pernah Juara 1</option>
                                                <option value="0.8">Masuk 3 Besar</option>
                                                <option value="0.4">Belum Pernah Juara</option>
                                                <option value="0.2">Tidak Ada</option>
                                            @endif
                                            @if ($kriteria->kode_kriteria == 'KD-003')
                                                <option value="1"> Lebih Dari 3 Tahun </option>
                                                <option value="0.8"> 1 - 3 Tahun</option>
                                                <option value="0.4"> 6 - 12 Bulan</option>
                                                <option value="0.2">
                                                    Kurang Dari 6 Bulan</option>
                                            @endif

                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 flex justify-end">
                        <button type="reset" class="btn-outline btn-error btn-sm btn">reset</button>
                        <button type="submit" class="btn-outline btn-success btn-sm btn ml-2">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
