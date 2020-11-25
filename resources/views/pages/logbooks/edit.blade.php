@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <form action="{{ route('logbook.store') }}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('status'))
                    <div class="alert alert-success">{{ Session::get('status') }}</div>
                @endif
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Tambah Task Harian</h3>

                        <div class="form-group">
                            <label for="">Task</label>
                            <textarea name="task" id="task" cols="30" rows="10" class="form-control" placeholder="Masukan task">{{ $logbook->tugas }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary"><i class="mdi mdi-book mr-1"></i>Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
