@extends('home')

@section('content')
    <div class="mt-20 flex place-content-center">

        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Edit Data</h3>
                <hr>
                <form action="/mahasiswa/{{ $item->nim }}" method="POST" class="mt-1" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIM</span>
                        </label>
                        <input type="text" name="nim" value="{{ old('nim', $item->nim) }}" placeholder="Type here.."
                            class="input-bordered input input-sm">
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
                        <input type="text" name="nama" value="{{ old('nama', $item->nama) }}"
                            placeholder="Type here.." class="input-bordered input input-sm">
                        <label class="label">
                            @error('nama')
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mt-2 flex justify-end">
                        <button type="reset" class="btn-outline btn-error btn-sm btn">reset</button>
                        <button class="btn-outline btn-success btn-sm btn ml-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
