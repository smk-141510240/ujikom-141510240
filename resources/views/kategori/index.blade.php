@extends('layouts.tema')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" class="info">daftar kategori lembur</div>
                <div class="panel-body">

			<div class="table-responsive table-border">
			<br>
			<center>
			<a href="{{url('kategori/create')}}" class="btn btn-success">Tambah </a>
			</center>
			<br>
				<table class="table" border="0">
					<thead>
						<tr class="info">
							<th>no</th>
							<th>kode lembur</th>
							<th>nama jabatan</th>
							<th>nama golongan</th>
							<th>besaran Uang</th>
							<th colspan="2"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					@php
                    $no=1;
                    @endphp
					@foreach($kategori as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->kode_lembur}}</td>
							<td>{{$data->jabatan->nama_jabatan}}</td>
							<td>{{$data->golongan->nama_golongan}}</td>
							<td>{{$data->besaran_uang}}</td>
							<td align="center">
                                    <a href="{{route('kategori.edit', $data->id)}}" class="btn btn-primary"> Edit</a>
                                </td>

                                <td >
                                	<center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('kategori.destroy', $data->id),
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