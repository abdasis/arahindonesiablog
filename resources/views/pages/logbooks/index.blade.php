
@extends('layouts.app')
@section('title')
    Daftar Artikel
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 150px">
        <div class="col-md-8 mb-2">
            @if(Session::has('status'))
                <div class="alert alert-success">{{ Session::get('status') }}</div>
            @endif
        </div>
        <div class="col-md-8 mb-2">
            <a href="{{ route('logbook.create') }}">
                <button class="btn btn-primary btn-sm"><i class="mdi mdi-plus"></i> Tambah Log Harian</button>
            </a>
            <a href="{{ route('logbook.lapor') }}">
                <button class="btn btn-danger btn-sm"><i class="mdi mdi-gmail"></i> Kirim Laporan</button>
            </a>
        </div>
        <div class="col-md-8">
            <div class="card shadow-md">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Catatan Tugas Bulan Minggi Ini</h4>
                    </div>
                    <table class="table table-bordered table-striped table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tugas</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Dibuat</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logbooks as $key => $logbook)
                            <tr>
                                <td>
                                    {{ $key+1 }}
                                </td>
                                <td>
                                    {{ $logbook->tugas }}
                                </td>
                                <td>{{ $logbook->status }}</td>
                                <td><i class="mdi mdi-clock mr-1"></i>{{ Carbon\Carbon::parse($logbook->created_at)->diffInMinutes(Carbon\Carbon::parse($logbook->updated_at)) }} menit</td>
                                <td>{{ date('d-m-Y', strtotime($logbook->created_at)) }}</td>
                                <td>
                                    <div class="row px-2 justify-content-center">
                                        <a href="{{ route('logbook.selesai', $logbook->id) }}">
                                            <button class="btn btn-sm btn-success mr-1"><i class="mdi mdi-check mr-1"></i></button>
                                        </a>

                                        <a href="{{ route('logbook.edit', $logbook->id) }}">
                                            <button class="btn btn-sm btn-warning mr-1"><i class="mdi mdi-pencil mr-1"></i></button>
                                        </a>

                                        <form action="{{ route('logbook.destroy', $logbook->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete mr-1"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
