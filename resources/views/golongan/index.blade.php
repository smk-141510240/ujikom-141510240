@extends('layouts.tema')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">daftar golongan</div>
                <div class="panel-body">

			<div class="table-responsive table-border">
			<br>
			<form action="golongan/?golongan=nama_golongan">
                                <div class="form-group input-group">
                                <input type="search" class="form-control" name="nama_golongan" placeholder="cari nama golongan ..."><br>
                                </div>
                                <div class="form-group">                               
                                <button type="submit" class="btn btn-success">
                                    Cari
                                </button>
                            	<a href="/golongan" class="btn btn-warning">
                                    Reset
                                </a>
                            	
                            	</div>

                        

                                </div>
                            </form>
			<center>
			<a href="{{url('golongan/create')}}" class="btn btn-success">Tambah </a>
			</center>
			<br>
				<table class="table" border="0">
					<thead>
						<tr class="info">
							<th>Kode golongan</th>
							<th>Nama golongan</th>
							<th>Besaran Uang</th>
							<th colspan="3"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					@foreach($golongan as $data)
						<tr>
							<td>{{$data->kode_golongan}}</td>
							<td>{{$data->nama_golongan}}</td>
							<td>{{$data->besaran_uang}}</td>
							<td align="center">
                                    <a href="{{route('golongan.edit', $data->id)}}" class="btn btn-primary"> Edit</a>
                                </td>

                                <td >
                                	<center>
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip" align="center">Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('golongan.destroy', $data->id),
                                    'model' => $data
                                  ])
                                  </center>
                                </td>
						</tr>
					@endforeach		
					</tbody>
				</table>
				{{$golongan->links()}}
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>

@endsection