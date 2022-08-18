@extends('home')
@section('content')
    <div class="right-1 mb-2" data-aos="slide-right" data-aos-duration="1600" data-aos-easing="linear">
        <label for="modal-create" class="btn btn-outline btn-primary btn-sm">➕ Data</label>
    </div>
    <div data-aos="slide-up" class="top-32 right-10 left-10 w-auto">
        <div class="h-[470px] overflow-auto">
            <table class="table w-full">
                {{-- head --}}
                <thead>
                    <tr>
                        <th></th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($mahasiswa as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="flex place-content-center text-center">
                                <a href="/mahasiswa/{{ $item->nim }}/edit"
                                    class="btn btn-outline btn-success btn-sm mr-1">
                                    ✎
                                </a>
                                <form action="/mahasiswa/{{ $item->nim }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline btn-error btn-sm"
                                        onclick="return confirm('yakin hapus data {{ $item->nama }} ?')">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Modal Create --}}
    <input type="checkbox" id="modal-create" class="modal-toggle" @error('username') checked @enderror
        @error('nama') checked @enderror>
    <div class="modal">
        <div class="modal-box relative">
            <label for="modal-create" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Tambah Data Mahasiswa</h3>
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
@endsection
