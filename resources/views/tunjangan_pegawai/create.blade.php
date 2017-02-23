@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">tambah tunjangan</div>
                <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjangan_pegawai') }}">
    {{ csrf_field() }}

    
    <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-2 control-label">nama pegawai</label>

                            <div class="col-md-6">
                                <select id="pegawai_id" name="pegawai_id" class="form-control">
                                    <option value="">-: pilih nama :-</option>
                                    @foreach($pegawai as $data)
                                    <option value="{{$data->id}}">{{$data->nip}} - {{$data->User->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
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