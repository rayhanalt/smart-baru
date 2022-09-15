<div class="h-[470px]">
    <table class="table w-full">
        {{-- head --}}
        <thead>
            <tr>
                <th></th>
                <th>Nama Kategori</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            @foreach ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration + $kategori->FirstItem() - 1 }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td class="flex place-content-center text-center">
                        <a href="/kategori/{{ $item->kode_kategori }}/edit"
                            class="btn btn-outline btn-success btn-sm mr-1">
                            ✎
                        </a>
                        <form action="/kategori/{{ $item->kode_kategori }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline btn-error btn-sm"
                                onclick="return confirm('yakin hapus data {{ $item->nama_kategori }} ?')">
                                🗑
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($kategori->total() >= 5)
        <div class="mt-10 flex place-content-center">
            <div class="btn-group grid w-fit grid-cols-2">
                <button wire:click="previousPage" @if ($kategori->onFirstPage()) disabled @endif
                    class="btn btn-outline btn-sm">previous</button>

                <button wire:click="nextPage" @if (!$kategori->hasMorePages()) disabled @endif
                    class="btn btn-outline btn-sm">next</button>
            </div>
        </div>
    @endif
</div>
