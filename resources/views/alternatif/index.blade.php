@extends('home')
@section('content')
    <div class="mb-2 mr-2 ml-2 flex flex-row justify-between">
        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="/alternatif/create" class="btn btn-outline btn-primary btn-sm">➕ Data</a>
        </div>

        <div data-aos="slide-up" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic">
            <a href="pdf-alternatif" class="btn btn-outline btn-secondary btn-sm">📇 Print</a>
        </div>
    </div>

    <div class="top-32 right-10 left-10 w-auto">
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
                            <td>{{ $loop->iteration + $alternatif->FirstItem() - 1 }}</td>
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
            @if ($alternatif->total() > 5)
                <div class="mt-10 flex place-content-center">
                    <div class="btn-group grid w-fit grid-cols-2">
                        <a href="{{ $alternatif->previousPageUrl() }}" @if ($alternatif->onFirstPage()) disabled @endif
                            class="btn btn-outline btn-sm">Previous</a>

                        <a href="{{ $alternatif->nextPageUrl() }}"@if (!$alternatif->hasMorePages()) disabled @endif
                            class="btn btn-outline btn-sm">Next</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
