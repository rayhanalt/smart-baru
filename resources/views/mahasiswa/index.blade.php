@extends('home')
@section('content')
    {{-- <div class="right-1 mb-2" data-aos="slide-right" data-aos-duration="1600" data-aos-easing="linear">
        <a href="/mahasiswa/create" class="btn btn-outline btn-primary btn-sm">➕ Data</a>
    </div> --}}
    <div class="top-32 right-10 left-10 w-auto">
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="flex place-content-center text-center">
                                <a href="/mahasiswa/{{ $item->nim }}/edit" class="btn btn-outline btn-success btn-sm mr-1">
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
                                <a href="/mahasiswa/{{ $item->nim }}" class="btn btn-outline btn-success btn-sm ml-1">
                                    👀
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
