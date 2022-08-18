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
                        <th>Nama Alternatif</th>
                        <th>Kategori</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($alternatif as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_alternatif }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td class="flex place-content-center text-center">
                                <a href="/alternatif/{{ $item->kode_alternatif }}/edit"
                                    class="btn btn-outline btn-success btn-sm mr-1">
                                    ✎
                                </a>
                                <form action="/alternatif/{{ $item->kode_alternatif }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline btn-error btn-sm"
                                        onclick="return confirm('yakin hapus data {{ $item->nama_alternatif }} ?')">
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
            <h3 class="text-lg font-bold">Tambah Data Alternatif</h3>
            <hr>
            <form action="/alternatif" method="POST" class="mt-1" enctype="multipart/form-data">
                @csrf

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama Alternatif</span>
                    </label>
                    <input type="text" name="nama_alternatif" value="{{ old('nama_alternatif') }}"
                        placeholder="Type here.." class="input input-sm input-bordered">
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
        </div>
    </div>
@endsection
