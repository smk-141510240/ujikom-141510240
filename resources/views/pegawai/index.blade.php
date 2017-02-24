@extends('layouts.tema')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><i><strong>daftar pegawai</strong></i></div>
                <div class="panel-body">

            <div class="table-responsive">
            <br>
            <center>
            <a href="{{url('pegawai/create')}}" class="btn btn-success">Tambah </a>
            </center>
            <br>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>no.</th>
                            <th>NIP</th>
                            <th>nama pegawai</th>
                            <th>email pegawai</th>
                            <th>jabatan</th>
                            <th>golongan</th>
                            <th>foto pegawai</th>
                            <th colspan="2"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach($pegawai as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->User->name}}</td>
                            <td>{{$data->User->email}}</td>
                            <td>{{$data->jabatan->nama_jabatan}}</td>
                            <td>{{$data->golongan->nama_golongan}}</td>
                            <td><img src="{{ asset('assets/'.$data->photo) }}" width="50" height="50"></td>
                            <td align="center">
                                    <a href="{{route('pegawai.edit', $data->id)}}" class="btn btn-primary"> Edit</a>
                                </td>

                                <td >
                                    <center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('pegawai.destroy', $data->id),
                                    'model' => $data
                                  ])
                                  </center>
                                </td>
                        </tr>
                    @endforeach     
                    </tbody>
                </table>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>

@endsection
