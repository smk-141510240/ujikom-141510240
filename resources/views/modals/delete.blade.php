<div class="modal text-left fade" id="delete{{ $model->id }}">
	<div class="modal-dialog">
		<div class="modal-content">
			{!! Form::open(['method' => 'delete', 'url' => $url]) !!}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">{{{ $title or "Hapus data ..." }}}</h4>
			</div>
			<div class="modal-body">
				
					<i>{{ $message or "Apakah anda yakin ingin menghapus data ini?" }}</i>
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Ya</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Tidak</button>
			</div>
			{!! Form::close() !!}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->