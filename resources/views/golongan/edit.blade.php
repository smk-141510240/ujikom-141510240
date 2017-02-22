@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah golongan</div>
                <div class="panel-body">
    <div class="form-horizontal">
    {!! Form::model($golongan,['method' => 'PATCH','route'=>['golongan.update',$golongan->id]]) !!}
    <div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
                            <label for="kode_golongan" class="col-md-2  control-label">kode golongan</label>

                            <div class="col-md-6">
                                {!! Form::text('kode_golongan',null,['class'=>'form-control']) !!}

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
                                {!! Form::text('nama_golongan',null,['class'=>'form-control']) !!}

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
                                {!! Form::text('besaran_uang',null,['class'=>'form-control']) !!}

                                @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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