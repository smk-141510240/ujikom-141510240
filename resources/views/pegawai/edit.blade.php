@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">edit pegawai (not yet)</div>
                <div class="panel-body">
                <div class="form-horizontal">
                {!! Form::model($pegawai,['method' => 'PATCH','route'=>['pegawai.update',$pegawai->id],"files"=>true ]) !!}


                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                                                <input id="name" type="text" class="form-control" name="name" value="{{ $pegawai->User->name }}"  autofocus>

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP</label>

                            <div class="col-md-6">
                                {!! Form::text('nip',null,['class'=>'form-control']) !!}

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <select id="jabatan_id" name="jabatan_id" class="form-control" required autofocus>
                                    <option value="{{$pegawai->jabatan_id}}">{{$pegawai->jabatan->nama_jabatan}}</option>
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
                            <label for="golongan_id" class="col-md-4 control-label">Golongan</label>

                            <div class="col-md-6">
                                <select id="golongan_id" name="golongan_id" class="form-control" required autofocus>
                                    <option value="{{$pegawai->golongan_id}}">{{$pegawai->golongan->nama_golongan}}
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
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                {!! Form::file('photo',null,['class'=>'form-control']) !!}

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        

                        <br>
                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
