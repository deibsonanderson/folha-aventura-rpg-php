<?php 
$sql = "SELECT id,
		nome,
		habilidade,
		energia,
     	status
		FROM tb_aventura_criatura
WHERE heroi_id = ".$heroi->heroi_id. " ORDER BY id DESC ";
$query = mysqli_query($conexao,$sql) or die('erro listar criatuas');
while ($objItem = mysqli_fetch_object($query)) {
   $criaturas[] = $objItem;
}
?>
<div class="tab-pane fade" id="enemy" role="tabpanel"
	aria-labelledby="enemy-tab">
	<div class="card bg-dark text-white">
		<div class="card-body">
			<h5 class="card-title">
				<a href="#" class="btn btn-secondary" onclick="fcnCarregarModalIncluirCriatura(<?php echo $heroi->heroi_id; ?>);">+</a>
			</h5>
			<div class="row">
				<div class="col-md-12">
					<ul class="list-group" id="list-group-criatura">
					<?php 
					
					if ($criaturas != null && count($criaturas) > 0 ) {
					    foreach ($criaturas as $criatura) {
                    ?>   						
						<li class="list-group-item bg-dark text-white border border-light" id="list-criatura-<?php echo $criatura->id; ?>">
							<table>
								<tr>
									<td style="min-width: 270px; text-align: center;" colspan="2">
										<div class="btn-toolbar justify-content-between"
											role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group" role="group" aria-label="First group">
												<h5 style="margin-top: 5px;" id="criatura-td-nome-<?php echo $criatura->id; ?>" ><?php echo $criatura->nome; ?></h5>
											</div>
											<div class="input-group">
												<button type="button" 
														onclick="fcnCarregarModalCriatura(this);" 
						    							nome="<?php echo $criatura->nome; ?>"
						        						habilidade="<?php echo $criatura->habilidade; ?>"
						                				energia="<?php echo $criatura->energia; ?>"
						                				criatura-id="<?php echo $criatura->id; ?>"
						                				heroi_id="<?php echo $heroi->heroi_id; ?>"
						                				id="criatura-<?php echo $criatura->id; ?>"
														class="btn btn-danger" >Editar</button>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td style="min-width: 135px;">Habilidade:</td>
									<td style="min-width: 135px; text-align: right;"><b id="criatura-td-habilidade-<?php echo $criatura->id; ?>"><?php echo $criatura->habilidade; ?></b></td>
								</tr>
								<tr>
									<td>Energia:</td>
									<td style="text-align: right;"><b id="criatura-td-energia-<?php echo $criatura->id; ?>"><?php echo $criatura->energia; ?></b></td>
								</tr>
								<tr>
									<td style="min-width: 270px; text-align: center;" colspan="2">
										<div class="btn-group" role="group" aria-label="">
											<button type="button" style="margin-top: 10px;" onclick="fncAlterarEnergiaCriatura(<?php echo $criatura->id; ?>,'criatura-td-energia-<?php echo $criatura->id; ?>',0)" class="btn btn-secondary">Menos (-)</button>
											<button type="button" style="margin-top: 10px;" onclick="fncAlterarEnergiaCriatura(<?php echo $criatura->id; ?>,'criatura-td-energia-<?php echo $criatura->id; ?>',1)" class="btn btn-secondary">Mais (+)</button>
										</div>
									</td>
								</tr>
							</table>
						</li>
						<?php }
					       } 
					   ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
