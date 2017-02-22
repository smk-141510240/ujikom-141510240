@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah jabatan</div>
                <div class="panel-body">
    <div class="form-horizontal">            
    {!! Form::model($jabatan,['method' => 'PATCH','route'=>['jabatan.update',$jabatan->id]]) !!}
    <div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
                            <label for="kode_jabatan" class="col-md-2  control-label">kode jabatan</label>

                            <div class="col-md-6">
                                <input id="kode_jabatan" type="text" class="form-control" name="kode_jabatan" value="{{ $jabatan->kode_jabatan }}" required autofocus>

                                @if ($errors->has('kode_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
                            <label for="nama_jabatan" class="col-md-2 control-label">nama jabatan</label>

                            <div class="col-md-6">
                                <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" required autofocus>

                                @if ($errors->has('nama_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-2 control-label">besaran uang</label>

                            <div class="col-md-6">
                                <input id="besaran_uang" type="numeric" class="form-control" name="besaran_uang" value="{{ $jabatan->besaran_uang }}" required autofocus>

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

@endsection