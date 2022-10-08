@extends('home')
@section('content')
    <div class="mt-20 flex place-content-center">

        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Tambah Data Alternatif</h3>
                <hr>
                <form action="/alternatif" method="POST" class="mt-1" enctype="multipart/form-data">
                    @csrf

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Alternatif</span>
                        </label>
                        <input type="text" name="nama_alternatif" value="{{ old('nama_alternatif') }}"
                            placeholder="Type here.." class="input-bordered input input-sm">
                        <label class="label">
                            @error('nama_alternatif')
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kategori</span>
                        </label>
                        <select class="select-bordered select select-sm" name="kode_kategori">
                            <option disabled selected>Pick one</option>
                            {{-- @foreach ($kategori as $item)
                                <option value="{{ $item->kode_kategori }}">{{ $item->nama_kategori }}</option>
                            @endforeach --}}
                            @foreach ($kategori as $kateg)
                                <option @if ($kateg->kode_kategori == $item->kode_kategori) selected @endif
                                    value="{{ $kateg->kode_kategori }}">
                                    {{ $kateg->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <label class="label">
                            @error('kode_kategori')
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mt-2 flex justify-end">
                        <button type="reset" class="btn-outline btn btn-error btn-sm">reset</button>
                        <button class="btn-outline btn btn-success btn-sm ml-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
