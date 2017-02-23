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
			<form action="jabatan/?jabatan=nama_jabatan">
                                <div class="form-group input-group">
                                <input type="search" class="form-control" name="nama_jabatan" placeholder="cari nama jabatan..."><br>
                                </div>
                                <div class="form-group">                               
                                <button type="submit" class="btn btn-success">
                                    Cari
                                </button>
                            	<a href="/jabatan" class="btn btn-warning">
                                    Reset
                                </a>
                            	
                            	</div>

                        

                                </div>
                            </form>
			<center>
			<a href="{{url('jabatan/create')}}" class="btn btn-success">Tambah </a>
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
				{{$jabatan->links()}}
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>

@endsection