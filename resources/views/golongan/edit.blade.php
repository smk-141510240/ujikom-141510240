@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah golongan</div>
                <div class="panel-body">
    {!! Form::model($golongan,['method' => 'PATCH','route'=>['golongan.update',$golongan->id]]) !!}
    <div class="form-group">
        {!! Form::label('kode golongan', 'kode golongan :') !!}
        {!! Form::text('kode_golongan',null,['class'=>'form-control']) !!}
        
    </div>
    <div class="form-group">
        {!! Form::label('nama golongan ', 'nama golongan:') !!}
        {!! Form::text('nama_golongan',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('besaran uang', 'besaran udang :') !!}
        {!! Form::text('besaran_uang',null,['class'=>'form-control']) !!}
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