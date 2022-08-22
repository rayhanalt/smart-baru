@extends('home')
@section('content')
    <h3 class="text-lg font-bold">Tambah Data Kriteria</h3>
    <hr>
    <form action="/kriteria" method="POST" class="mt-1" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
            <label class="label">
                <span class="label-text">Nama Kriteria</span>
            </label>
            <input type="text" name="nama_kriteria" value="{{ old('nama_kriteria') }}" placeholder="Type here.."
                class="input input-sm input-bordered">
            <label class="label">
                @error('nama_kriteria')
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Bobot</span>
            </label>
            <input type="text" name="bobot" value="{{ old('bobot') }}" placeholder="Type here.."
                class="input input-sm input-bordered">
            <label class="label">
                @error('bobot')
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
