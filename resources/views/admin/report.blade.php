@extends('admin/layout/home')

@section('body')
    <div class="container-fluid overflow-auto">
        <h1>Laporan Peminjaman</h1>
        <a href="{{ url('myadmin/report/download') }}" target="_parent" class="btn btn-success text-white mb-2">
            Download Laporan (PDF)
        </a>
        <div class="table">
            <table class="shadow" cellpadding='10' width='100%'>
                <thead>
                    <tr class="bg-primary text-white">
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Matakuliah</th>
                        <th>Type</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
