@extends('home')

@section('content')
    <div class="mt-8 flex place-content-center md:mt-20">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h3 class="text-lg font-bold">Isi Data</h3>
                <hr>
                <form action="/spk/alur" method="POST" class="mt-1" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIM</span>
                        </label>
                        <input type="text" name="nim" value="{{ old('nim') }}" placeholder="Type here.."
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
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Type here.."
                            class="input-bordered input input-sm">
                        <label class="label">
                            @error('nama')
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mt-2 flex justify-end">
                        <button type="reset" class="btn-outline btn-error btn-sm btn">reset</button>
                        <button class="btn-outline btn-success btn-sm btn ml-2">Mulai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
