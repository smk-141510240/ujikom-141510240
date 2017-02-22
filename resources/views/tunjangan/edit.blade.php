@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">ubah tunjangan</div>
                <div class="panel-body">
                <div class="form-horizontal">
    {!! Form::model($tunjangan,['method' => 'PATCH','route'=>['tunjangan.update',$tunjangan->id]]) !!}
    <div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
                            <label for="kode_tunjangan" class="col-md-2  control-label">kode tunjangan</label>
                            <div class="col-md-6">
                            {!! Form::text('kode_tunjangan',null,['class'=>'form-control']) !!}
                            @if ($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
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
    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-2 control-label">status</label>

                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="">-: pilih status :-</option>
                                    <option value="menikah">menikah</option>
                                    <option value="belum menikah">belum menikah</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
                            <label for="jumlah_anak" class="col-md-2  control-label">jumlah anak</label>
                            <div class="col-md-6">
                            {!! Form::text('jumlah_anak',null,['class'=>'form-control']) !!}
                            @if ($errors->has('jumlah_anak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

    <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-2  control-label">besaran uang</label>
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