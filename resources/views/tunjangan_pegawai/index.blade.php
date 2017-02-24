@extends('layouts.tema')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" class="info">daftar tunjangan pegawai</div>
                <div class="panel-body">

			<div class="table-responsive table-border">
			<br>
			<center>
			<a href="{{url('tunjangan_pegawai/create')}}" class="btn btn-success">Tambah</a>
			</center>
			<br>
				<table class="table" border="0">
					<thead>
						<tr class="info">
							<th>No.</th>
							<th>Kode tunjangan</th>
							<th>NIP</th>
							<th>Nama pegawai</th>
							
							
							<th>Besaran Uang</th>
							<th colspan="3"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					@php
                    $no=1;
                    @endphp
					@foreach($tunjangan_pegawai as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->tunjangan->kode_tunjangan}}</td>
							<td>{{$data->pegawai->nip}}</td>
							<td>{{$data->pegawai->User->name}}</td>
							
							<td>{{$data->tunjangan->besaran_uang}}</td>
							<td align="center">
                                    <a href="{{route('tunjangan_pegawai.edit', $data->id)}}" class="btn btn-primary"> Edit</a>
                                </td>

                                <td >
                                	<center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('tunjangan_pegawai.destroy', $data->id),
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