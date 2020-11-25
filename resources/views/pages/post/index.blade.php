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
        <div class="col-md-8">
            <div class="card shadow-md">

                <h5 class="card-header bg-white border-bottom">
                    <span>Daftar Semua Artikel</span>
                    <a href="{{ route('posts.create') }}">
                        <button class="btn btn-light btn-sm  float-right">Tambah Artikel</button>
                    </a>
                </h5>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                            <tr>
                                <td>
                                    {{ $key+1 }}
                                </td>
                                <td>
                                    {{ $post->judul_artikel }}
                                </td>
                                <td>{{ $post->status_artikel }}</td>
                                <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                                <td>
                                    <div class="row px-2 justify-content-center">
                                        <a href="{{ route('posts.edit', $post->slug) }}">
                                            <button class="btn btn-sm btn-warning mr-1"><i class="mdi mdi-pencil mr-1"></i>Edit</button>
                                        </a>

                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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
