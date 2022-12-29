@extends('home')
@section('content')
    <div class="mt-8 flex place-content-center md:mt-20">
        <div class="card w-auto bg-base-100 shadow-xl lg:w-1/2">
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
                                    <select class="select-bordered select select-sm w-full max-w-xs"
                                        name="nilai_parameter[{{ $item->kode_alternatif }}]">
                                        <option class="text-zinc-700" selected value="0.2">Pilih untuk
                                            {{ $item->nama_alternatif }}</option>
                                        @if ($kriteria->kode_kriteria == 'KD-001')
                                            <option value="1">Sangat</option>
                                            <option value="0.8">Biasa</option>
                                            <option value="0.4">Kurang</option>
                                            <option value="0.2">Tidak</option>
                                        @endif

                                    </select>
                                </td>
                            </tr>
                            <input type="hidden" name="kode_kategori" value="{{ $item->kategori->kode_kategori }}">
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
