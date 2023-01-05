<div class="h-[470px] overflow-x-auto">
    <table class="table w-full">
        {{-- head --}}
        <thead>
            <tr>
                <th></th>
                <th>UKM</th>
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
                            class="btn-outline btn-success btn-sm btn mr-1">
                            ✎
                        </a>
                        <form action="/alternatif/{{ $item->kode_alternatif }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn-outline btn-error btn-sm btn"
                                onclick="return confirm('yakin hapus data {{ $item->nama_alternatif }} ?')">
                                🗑
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($alternatif->total() >= 5)
        <div class="mt-10 flex place-content-center">
            <div class="btn-group grid w-fit grid-cols-2">
                <button wire:click="previousPage" @if ($alternatif->onFirstPage()) disabled @endif
                    class="btn-outline btn-sm btn">previous</button>

                <button wire:click="nextPage" @if (!$alternatif->hasMorePages()) disabled @endif
                    class="btn-outline btn-sm btn">next</button>
            </div>
        </div>
    @endif
</div>
