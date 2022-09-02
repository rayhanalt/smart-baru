@extends('home')

@section('content')
    <div class="mt-20 flex place-content-center">

        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Edit Data</h3>
                <hr>
                <form action="/kriteria/{{ $item->kode_kriteria }}" method="POST" class="mt-1" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama kriteria</span>
                        </label>
                        <input type="text" name="nama_kriteria" value="{{ old('nama_kriteria', $item->nama_kriteria) }}"
                            placeholder="Type here.." class="input input-sm input-bordered">
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
                        <input type="text" name="bobot" value="{{ old('bobot', $item->bobot) }}"
                            placeholder="Type here.." class="input input-sm input-bordered">
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
            </div>
        </div>
    </div>
@endsection
