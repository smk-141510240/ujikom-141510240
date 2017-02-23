@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><i><strong>daftar lembur pegawai</strong></i></div>
                <div class="panel-body">

            <div class="table-responsive">
            <br>
            <center>
            <a href="{{url('lembur/create')}}" class="btn btn-success">Tambah </a>
            </center>
            <br>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th><center>no.</center></th>
                            <th><center>kode kategori lembur</center></th>
                            <th><center>NIP</center></th>
                            <th><center>nama pegawai</center></th>
                            <th><center>jumlah jam</center></th>
                            <th><center>besaran uang</center></th>
                            <th><center>jumlah</center></th>
                            <th colspan="2"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach($lembur as $data)
                        <tr>
                            <td><center>{{$no++}}</center></td>
                            <td><center>{{$data->kategori_lembur->kode_lembur}}</center></td>
                            <td><center>{{$data->pegawai->nip}}</center></td>
                            <td><center>{{$data->pegawai->User->name}}</center></td>
                            <td><center>{{$data->jumlah_jam}}</center></td>
                            <td><center>{{$data->kategori_lembur->besaran_uang}}</center></td>
                            <td><center>{{$data->jumlah_jam * $data->kategori_lembur->besaran_uang}}</center></td>
                            <td align="center"><center>
                                    <a href="{{route('lembur.edit', $data->id)}}" class="btn btn-primary"> Edit</a></center>
                                </td>

                                <td >
                                    <center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('lembur.destroy', $data->id),
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
