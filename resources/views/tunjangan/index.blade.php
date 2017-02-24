@extends('layouts.tema')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" class="info">daftar tunjangan</div>
                <div class="panel-body">

			<div class="table-responsive table-border">
			<br>
			<center>
			<a href="{{url('tunjangan/create')}}" class="btn btn-success">Tambah </a>
			</center>
			<br>
				<table class="table" border="0">
					<thead>
						<tr class="info">
							<th><center>no</center></th>
							<th><center>kode tunjangan</center></th>
							<th><center>nama jabatan</center></th>
							<th><center>nama golongan</center></th>
							<th><center>status</center></th>
							<th><center>jumlah anak</center></th>
							<th><center>besaran Uang</center></th>
							<th colspan="2"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					@php
                    $no=1;
                    @endphp
					@foreach($tunjangan as $data)
						<tr>
							<td><center>{{$no++}}</center></td>
							<td><center>{{$data->kode_tunjangan}}</center></td>
							<td><center>{{$data->jabatan->nama_jabatan}}</center></td>
							<td><center>{{$data->golongan->nama_golongan}}</center></td>
							<td><center>{{$data->status}}</center></td>
							
							@if($data->jumlah_anak > 0)
							<td><center>{{$data->jumlah_anak}} anak</center></td>
							@else
							<td><center>belum punya anak</center></td>
							@endif
							<td><center>{{$data->besaran_uang}}</center></td>
							<td align="center"><center>
                                    <a href="{{route('tunjangan.edit', $data->id)}}" class="btn btn-primary"> Edit</a></center>
                                </td>

                                <td ><center>
                                	<center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('tunjangan.destroy', $data->id),
                                    'model' => $data
                                  ])
                                  </center></center>
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