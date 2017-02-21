@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah tunjangan</div>
                <div class="panel-body">
    {!! Form::model($tunjangan,['method' => 'PATCH','route'=>['tunjangan.update',$tunjangan->id]]) !!}
    <div class="form-group">
        {!! Form::label('kode tunjangan', 'kode tunjangan :') !!}
        {!! Form::text('kode_tunjangan',null,['class'=>'form-control']) !!}
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
        {!! Form::label('status ', 'nama status:') !!}
        <select id="status" name="status" class="form-control">
                                    <option value="">-: pilih status :-</option>
                                    <option value="menikah">menikah</option>
                                    <option value="belum_menikah">belum menikah</option>
                                </select>
    </div>
    <div class="form-group">
        {!! Form::label('jumlah anak', 'jumlah anak :') !!}
        {!! Form::number('jumlah_anak',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('besaran uang', 'besaran udang :') !!}
        {!! Form::number('besaran_uang',null,['class'=>'form-control']) !!}
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