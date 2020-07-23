<div class="modal" id="modal-manter-criatura" tabindex="-1"	role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark text-white">
			<div class="modal-header">
				<h5 class="modal-title">Modal Criaturas</h5>
				<button type="button" class="close text-white" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="form-control" id="modal-criatura-heroi_id" >
				<div class="form-group">
					<label for="exampleFormControlInput1">Nome</label> <input
						type="text" class="form-control" id="modal-criatura-nome"
						placeholder="Monstro" value="Monstro">
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Habilidade:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-criatura-habilidade',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" readonly="true" class="form-control text-center"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" id="modal-criatura-habilidade">
						<div class="input-group-append">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-criatura-habilidade',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Energia:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-criatura-energia',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" readonly="true" class="form-control text-center"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" id="modal-criatura-energia">
						<div class="input-group-append">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-criatura-energia',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="fcnIniciarBatalhaModalCriatura();" class="btn btn-danger">Confirmar</button>
			</div>
		</div>
	</div>
</div>