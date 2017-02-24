@extends('layouts.app')
@section('content')
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Penggajian</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('penggajian.store')}}" method="POST">
                    <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label"> Pegawai :</label>
                                <div class="col-md-6">
                                    <select type="text" name="pegawai_id" class="form-control" required>
                                        
                                        @foreach($pegawai as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                                @if (isset($_GET['errors_match']))
                            <span class="help-block">
                                    <strong>Pegawai sudah melakukan penggajian bulan ini</strong>
                            </span>
                            @endif
                            @if (isset($missing_count))
                            <div>
                                **Pegawai ini belum memiliki tunjangan pegawai
                                **Silahkan untuk mengisi tunjangan pegawai
                            </div>
                            @endif
                                </div>
                    </div>
        
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection