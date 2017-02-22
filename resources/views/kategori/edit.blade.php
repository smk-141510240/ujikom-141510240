@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah kategori lembur</div>
                <div class="panel-body">
    {!! Form::model($kategori,['method' => 'PATCH','route'=>['kategori.update',$kategori->id]]) !!}
    <div class="form-horizontal">
    <div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
                            <label for="kode_lembur" class="col-md-2  control-label">kode lembur</label>

                            <div class="col-md-6">
                                {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}

                                @if ($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-2 control-label">nama jabatan</label>

                            <div class="col-md-6">
                                <select id="jabatan_id" name="jabatan_id" class="form-control" required>
                                    <option value="">-: pilih jabatan :-</option>
                                    @foreach($jabatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                            <label for="golongan_id" class="col-md-2 control-label">nama golongan</label>

                            <div class="col-md-6">
                                <select id="golongan_id" name="golongan_id" class="form-control" required>
                                    <option value="">-: pilih golongan :-</option>
                                    @foreach($golongan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
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