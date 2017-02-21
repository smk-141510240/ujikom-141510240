@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" class="info">daftar jabatan</div>
                <div class="panel-body">

			<div class="table-responsive table-border">
			<br>
			<center>
			<a href="{{url('jabatan/create')}}" class="btn btn-success">Tambah bang</a>
			</center>
			<br>
				<table class="table" border="0">
					<thead>
						<tr class="info">
							<th>Kode jabatan</th>
							<th>Nama jabatan</th>
							<th>Besaran Uang</th>
							<th colspan="3"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					@foreach($jabatan as $data)
						<tr>
							<td>{{$data->kode_jabatan}}</td>
							<td>{{$data->nama_jabatan}}</td>
							<td>{{$data->besaran_uang}}</td>
							<td align="center">
                                    <a href="{{route('jabatan.edit', $data->id)}}" class="btn btn-primary"> Edit</a>
                                </td>

                                <td >
                                	<center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('jabatan.destroy', $data->id),
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