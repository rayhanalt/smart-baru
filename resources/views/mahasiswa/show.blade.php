@extends('home')
@section('content')
    <div class="mr-2 mt-2 flex place-content-end" data-aos="slide-up" data-aos-duration="1000"
        data-aos-easing="ease-in-out-cubic">
        <a href="/detailpdf/{{ $mahasiswa->nim }}" class="btn-secondary btn-active btn-sm btn hover:btn-ghost">📇 Print
        </a>
    </div>
    <h3 class="mt-0 text-lg font-bold text-white">
        @foreach ($total_kategori as $item)
            {{ $item->mahasiswa->nama }} Detail
        @break
    @endforeach
</h3>

<hr>

<div class="mb-2 mt-2 flex place-content-center">
    <div
        class="stats stats-vertical m-auto h-auto w-screen shadow-sm shadow-black lg:stats-horizontal xl:stats-horizontal">
        <div class="stat">

            <table class="table w-full">
                {{-- head --}}
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Kategori</th>
                        <th>Hasil Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($total_kategori as $item)
                        <tr @if ($loop->iteration == 1) class='text-green-500 font-bold' @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="stat">
            <table class="table w-full">
                {{-- head --}}
                <thead>

                    <tr>
                        <th></th>
                        <th>Nama UKM</th>
                        <th>Hasil Akhir (@foreach ($total_alternatif as $item)
                                {{ $item->alternatif->kategori->nama_kategori }}
                            @break
                        @endforeach)
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($total_alternatif as $item)
                    <tr @if ($loop->iteration == 1) class='text-green-500 font-bold' @endif>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->alternatif->nama_alternatif }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection
