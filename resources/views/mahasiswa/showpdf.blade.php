<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table-borderless table">
        <tr>
            <td>
                <img src="{{ public_path('img/ss.png') }}" width="90px" height="90px" />
            </td>
            <td class="center">
                <center>
                    <h2>{{ $title }}</h2>
                    <h3>Universitas Muhammadiyah</h3>
                </center>
            </td>
        </tr>
    </table>
    <p>{{ $date }}</p>
    <table class="table-bordered table">
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
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table-bordered table">
        {{-- head --}}
        <thead>

            <tr>
                <th></th>
                <th>Nama UKM</th>
                <th>Hasil Akhir (@foreach ($total_alternatif as $item)
                        {{ $item->alternatif->kategori->nama_kategori }}
                    @break
                @endforeach)</th>
        </tr>
    </thead>
    <tbody>
        <!-- row 1 -->
        @foreach ($total_alternatif as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->alternatif->nama_alternatif }}</td>
                <td>{{ $item->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>
