@extends('home')
@section('content')
    <h3 class="text-lg font-bold">Tambah Data Alternatif</h3>
    <hr>
    <form action="/alternatif" method="POST" class="mt-1" enctype="multipart/form-data">
        @csrf

        <div class="form-control">
            <label class="label">
                <span class="label-text">Nama Alternatif</span>
            </label>
            <input type="text" name="nama_alternatif" value="{{ old('nama_alternatif') }}" placeholder="Type here.."
                class="input input-sm input-bordered">
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
            <select class="select select-sm select-bordered" name="kode_kategori">
                <option disabled selected>Pick one</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->kode_kategori }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
            <label class="label">
                @error('kode_kategori')
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="mt-2 flex justify-end">
            <button type="reset" class="btn btn-outline btn-error btn-sm">reset</button>
            <button class="btn btn-outline btn-success btn-sm ml-2">Simpan</button>
        </div>
    </form>
@endsection
