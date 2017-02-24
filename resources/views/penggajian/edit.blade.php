@extends('layouts.app')
@section('content')
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
<div class="panel-heading">Tambah Penggajian</div>
<div class="panel-body">
    <form class="form-horizontal" action="{{route('penggajian.update',$data->id)}}" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('petugas_penerima') ? ' has-error' : '' }}">
                            <label for="petugas_penerima" class="col-md-4 control-label"> Petugas Penerima :</label>
                                <div class="col-md-6">
                                    {!! Form::text('petugas_penerima',Auth::user()->name,['class'=>'form-control','disabled']) !!}
                                    {!! Form::hidden('petugas_penerima',Auth::user()->name,['class'=>'form-control']) !!}
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-md-offset-4">
                                    <button type="submit" name="status_pengambilan" class="btn btn-primary" value="1">
                                        Confirmasi Penerimaan
                                    </button>
                                    @if ($errors->has('status_pengambilan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_pengambilan') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
    </form>
  </div>
 </div>
</div>
@endsection