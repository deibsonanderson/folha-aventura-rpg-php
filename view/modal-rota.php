<div class="modal" id="modal-manter-rota" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark text-white">
			<div class="modal-header">
				<h5 class="modal-title">Modal Rota</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="form-control" id="modal-rota-id" >
				<input type="hidden" class="form-control" id="modal-rota-heroi_id" >
				<span>Tem certeza que deseja excluir ?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="fcnDeletarModalRota();" class="btn btn-danger">Excluir</button>
			</div>
		</div>
	</div>
</div>