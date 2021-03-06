<div class="">
	<div class="bg-dark text-white">
		<div class="">
			<h5 class="card-title">
				<a href="#" class="btn btn-secondary" onclick="fcnCarregarModalIncluirCriatura(<?php echo $heroi->heroi_id; ?>);">Corpo a Corpo</a>
				<?php if($heroi->aventura == 'O Guerreiro das Estradas'){  ?>	
					<a href="#" class="btn btn-secondary" onclick="fcnCarregarModalIncluirVeiculoInimigo(<?php echo $heroi->heroi_id; ?>);">Veiculo</a>
				<?php } ?>	
				<input type="hidden" class="form-control" id="status-batalha" value="0" >
				<input type="hidden" class="form-control" id="tipo-batalha" value="0" >				
			</h5>
			<div class="row">
				<div class="col-md-12">
					<ul class="list-group" id="list-group-criatura">
						<li id="list-luta-heroi" class="heroi-list-art list-group-item bg-dark text-white border border-light">
							<table border="0"  style="width: 100%;">
								<tr>
									<td style="text-align: center;" colspan="2">
										<div class="btn-toolbar justify-content-between"
											role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group" role="group" aria-label="First group">
												<h5 style="margin-top: 5px;" >Herói</h5>
											</div>											
										</div>
									</td>
								</tr>
								<tr>
									<td id="texto-criatura-habilidade" style="">Habilidade:</td>
									<td style="text-align: right;"><b id="heroi-luta-habilidade"><?php echo $heroi->habilidade; ?></b></td>
								</tr>
								<tr>
									<td id="texto-criatura-energia">Energia:</td>
									<td style="text-align: right;"><b id="heroi-luta-energia"><?php echo $heroi->energia; ?></b></td>
								</tr>
								<tr>
									<td>Sorte:</td>
									<td style="text-align: right;"><b id="heroi-luta-sorte"><?php echo $heroi->sorte; ?></b></td>
								</tr>
								<tr>
									<td>Rolagem do dado:</td>
									<td style="text-align: right;"><b id="heroi-luta-resultado"></b></td>
								</tr>								
							</table>
						</li>
						
						<li id="list-luta-criatura" class="monster-list-art list-group-item bg-dark text-white border border-light">
							<table border="0" style="width: 100%;">
								<tr>
									<td style="text-align: center;" colspan="2">
										<div class="btn-toolbar justify-content-between"
											role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group" role="group" aria-label="First group">
												<h5 style="margin-top: 5px;" id="criatura-luta-nome"></h5>
											</div>											
										</div>
									</td>
								</tr>
								<tr>
									<td id="texto-criatura-luta-habilidade" style="">Habilidade:</td>
									<td style=" text-align: right;"><b id="criatura-luta-habilidade"></b></td>
								</tr>
								<tr>
									<td id="texto-criatura-luta-energia">Energia:</td>
									<td style="text-align: right;"><b id="criatura-luta-energia"></b></td>
								</tr>
								<tr>
									<td>Rolagem do dado:</td>
									<td style="text-align: right;"><b id="criatura-luta-resultado"></b></td>
								</tr>
								<tr>
									<td style="text-align: center;" colspan="2">
										<div class="btn-group" role="group" aria-label="">
											<button type="button" id="btn-batalha-auto" style="margin-top: 10px;" disabled="disabled" onclick="fcnBatalharAutomatica(<?php echo $heroi->heroi_id; ?>)" class="btn btn-danger">Auto</button>
											<button type="button" id="btn-test-sort" style="margin-top: 10px;" disabled="disabled" onclick="fcnTestarSorte(<?php echo $heroi->heroi_id; ?>)" class="btn btn-secondary">Tentar Sorte</button>
											<button type="button" id="btn-batalha-criatura" style="margin-top: 10px;" disabled="disabled" onclick="fcnBatalhar(<?php echo $heroi->heroi_id; ?>)" class="btn btn-danger">Batalhar</button>
										</div>
										<?php if($heroi->aventura == 'O Guerreiro das Estradas'){  ?>	
										<div class="btn-group" role="group" aria-label="">
											<button type="button" id="btn-batalha-tiro" style="margin-top: 10px;" disabled="disabled" onclick="fcnBatalhar(<?php echo $heroi->heroi_id; ?>,1)" class="btn btn-danger">Batalhar com Arma de Fogo</button>
										</div>
										<?php } ?>										
									</td>
								</tr>								
							</table>
						</li>						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
