@extends('home')
@section('content')
    {{-- <div class="right-1 mb-2" data-aos="slide-right" data-aos-duration="1600" data-aos-easing="linear">
        <a href="/kriteria/create" class="btn btn-outline btn-primary btn-sm">➕ Data</a>
    </div> --}}
    <div class="top-32 right-10 left-10 mt-10 w-auto">
        <div class="h-[470px] overflow-auto">
            <table class="table w-full">
                {{-- head --}}
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($kriteria as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kriteria }}</td>
                            <td>{{ $item->bobot }}</td>
                            <td class="flex place-content-center text-center">
                                <a href="/kriteria/{{ $item->kode_kriteria }}/edit"
                                    class="btn-outline btn-success btn-sm btn mr-1">
                                    ✎
                                </a>
                                {{-- <form action="/kriteria/{{ $item->kode_kriteria }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline btn-error btn-sm"
                                        onclick="return confirm('yakin hapus data {{ $item->nama_kriteria }} ?')">
                                        🗑
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
