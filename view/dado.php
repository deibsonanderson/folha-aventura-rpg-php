<div class="tab-pane fade" id="dado" role="tabpanel" aria-labelledby="dado-tab">
	<div class="card bg-dark text-white">
		<div onclick="rolarDado()" id="div-dado" style="width: 160px;margin-left: auto; margin-right: auto;">
			<img id="imagem-dado" class="card-img-top" src="image/dado-static.png" alt="Card image cap">
		</div>
		<div class="card-body">
			<div class="form-group">
					<label for="button-addon4" class="">Dados:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('input-dados',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" readonly="true" class="form-control text-center"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" id="input-dados" value="2">
						<div class="input-group-append">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('input-dados',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
			<p class="card-text">Clique no dado para gerar o resultado.</p>
			<p class="card-text" id="dado-result-total">Resultado total:</p>
			<p class="card-text" id="dado-result"></p>
		</div>
	</div>
</div>