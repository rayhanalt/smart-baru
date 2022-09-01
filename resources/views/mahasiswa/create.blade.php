@extends('home')

@section('content')
    <div class="flex place-content-center">

        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Isi Data</h3>
                <hr>
                <form action="/mahasiswa" method="POST" class="mt-1" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIM</span>
                        </label>
                        <input type="text" name="nim" value="{{ old('nim') }}" placeholder="Type here.."
                            class="input input-sm input-bordered">
                        <label class="label">
                            @error('nim')
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Mahasiswa</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Type here.."
                            class="input input-sm input-bordered">
                        <label class="label">
                            @error('nama')
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
