<div class="h-[470px] overflow-x-auto">
    <table class="table w-full">
        {{-- head --}}
        <thead>
            <tr>
                <th></th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                {{-- <th>dilakukan pada</th> --}}
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            @foreach ($mahasiswa as $item)
                <tr>
                    <td>{{ $loop->iteration + $mahasiswa->FirstItem() - 1 }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    {{-- <td>{{ $item->created_at->format('D M Y') }}</td> --}}
                    <td class="flex place-content-center text-center">
                        <a href="/mahasiswa/{{ $item->nim }}/edit" class="btn-outline btn-success btn-sm btn mr-1">
                            ✎
                        </a>
                        <form action="/mahasiswa/{{ $item->nim }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn-outline btn-error btn-sm btn"
                                onclick="return confirm('yakin hapus data {{ $item->nama }} ?')">
                                🗑
                            </button>
                        </form>
                        <a href="/mahasiswa/{{ $item->nim }}" class="btn-outline btn-info btn-sm btn ml-1">
                            👁
                            {{-- 👀 --}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($mahasiswa->total() >= 5)
        <div class="mt-10 flex place-content-center">
            <div class="btn-group grid w-fit grid-cols-2">

                <button wire:click="previousPage" @if ($mahasiswa->onFirstPage()) disabled @endif
                    class="btn-outline btn-sm btn">Previous</button>


                <button wire:click="nextPage" @if (!$mahasiswa->hasMorePages()) disabled @endif
                    class="btn-outline btn-sm btn">Next</button>

            </div>
        </div>
    @endif
</div>
