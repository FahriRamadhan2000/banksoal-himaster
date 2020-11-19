<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laporan</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Laporan Banksoal</h1>
        <table border="1" cellspacing="0" cellpadding='10' width='100%'>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Matakuliah</th>
                <th>Type</th>
                <th>Tanggal</th>
            </tr>
            @foreach ($allreport as $report)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $report->mahasiswa->nama }}</td>
                <td>{{ $report->mahasiswa->nim }}</td>
                <td>{{ $report->matakuliah->matakuliah }}</td>
                <td>{{ $report->matakuliah->type }}</td>
                <td>{{ $report->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>