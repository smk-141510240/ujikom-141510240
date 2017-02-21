@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">tambah jabatan</div>
                <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/golongan') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
                            <label for="kode_golongan" class="col-md-2  control-label">kode golongan</label>

                            <div class="col-md-6">
                                <input id="kode_golongan" type="text" class="form-control" name="kode_golongan" value="{{ old('kode_golongan') }}" required autofocus>

                                @if ($errors->has('kode_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : '' }}">
                            <label for="nama_golongan" class="col-md-2 control-label">nama golongan</label>

                            <div class="col-md-6">
                                <input id="nama_golongan" type="text" class="form-control" name="nama_golongan" value="{{ old('nama_golongan') }}" required autofocus>

                                @if ($errors->has('nama_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-2 control-label">besaran uang</label>

                            <div class="col-md-6">
                                <input id="besaran_uang" type="numeric" class="form-control" name="besaran_uang" value="{{ old('besaran_uang') }}" required autofocus>

                                @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group">
                            <div class="col-md-8 " align="left">
                                <button type="submit" class="btn btn-primary">
                                    simpan
                                </button>
                            </div>
                        </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
    </div>
    

@endsection