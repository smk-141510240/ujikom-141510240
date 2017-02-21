@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah kategori lembur</div>
                <div class="panel-body">
    {!! Form::model($kategori,['method' => 'PATCH','route'=>['kategori.update',$kategori->id]]) !!}
    <div class="form-group">
        {!! Form::label('kode lembur', 'kode lembur :') !!}
        {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nama jabatan ', 'nama jabatan:') !!}
        <select id="jabatan_id" name="jabatan_id" class="form-control" required autofocus>
                                    <option value="">-: pilih jabatan :-</option>
                                    @foreach($jabatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                </select>
    </div>
    <div class="form-group">
        {!! Form::label('nama golongan ', 'nama golongan:') !!}
        <select id="golongan_id" name="golongan_id" class="form-control" required autofocus>
                                    <option value="">-: pilih golongan :-</option>
                                    @foreach($golongan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>
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