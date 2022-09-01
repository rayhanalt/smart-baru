@extends('home')
@section('content')
    <div class="flex place-content-center">

        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Tambah Data Kategori</h3>
                <hr>
                <form action="/kategori" method="POST" class="mt-1" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Kategori</span>
                        </label>
                        <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                            placeholder="Type here.." class="input input-sm input-bordered">
                        <label class="label">
                            @error('nama_kategori')
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mt-2 flex justify-end">
                        <button type="reset" class="btn btn-outline btn-error btn-sm">reset</button>
                        <button class="btn btn-outline btn-success btn-sm ml-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
