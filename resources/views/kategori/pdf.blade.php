<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
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
                    <h1>{{ $title }}</h1>
                    <h2>Universitas Muhammadiyah</h2>
                </center>
            </td>
        </tr>
    </table>
    <p>{{ $date }}</p>
    <table class="table-bordered table">
        <tr>
            <th>No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
        </tr>
        @foreach ($users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_kategori }}</td>
                <td>{{ $item->nama_kategori }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
