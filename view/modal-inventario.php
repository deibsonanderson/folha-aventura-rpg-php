<div class="modal" id="modal-manter-invent" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal Inventario</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="form-control" id="modal-invent-id" >
				<input type="hidden" class="form-control" id="modal-invent-tipo" >
				<input type="hidden" class="form-control" id="modal-invent-heroi_id" >				
				<div class="form-group">
					<label for="exampleFormControlInput1">Descrição</label> 
					<input type="text" class="form-control" id="modal-invent-descricao" placeholder="Moedas de Ouro">
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Quantidade:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-outline-secondary" onclick="fncAlterarNumber('modal-invent-quantidade',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" id="modal-invent-quantidade" readonly="true" class="form-control"
							placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3" value="0">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" onclick="fncAlterarNumber('modal-invent-quantidade',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="fcnAtualizarModalInvent();" class="btn btn-primary">Save</button>
				<button type="button" onclick="fcnDeletarModalInvent();" class="btn btn-warning">Excluir</button>
			</div>
		</div>
	</div>
</div>