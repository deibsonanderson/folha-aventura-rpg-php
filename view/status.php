<?php 
function carregarHeroi($conexao){
    $sql = "SELECT h.`id` as heroi_id,
               h.`nome`,
               h.`raca`,
               h.`status`,
               h.`habilidade`,
               h.`habilidade_inicial`,
               h.`energia`,
               h.`energia_inicial`,
               h.`sorte`,
               h.`sorte_inicial`
        FROM `tb_aventura_heroi` h
        WHERE h.`id` = 1 AND h.`status` = 1";
    
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar heroi e status');
    $heroi = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $heroi = $objItem;
    }
    return $heroi;
}

function carregarCampoStatus($id, $funcao, $controlador, $campo, $valor){
?>
<div class="input-group-prepend">
	<button class="btn btn-outline-secondary" 
	        onclick="fncAlterarHeroi(this,'<?php echo $campo; ?>',0)" 
		    funcao="<?php echo $funcao; ?>" 
		    controlador="<?php echo $controlador; ?>"
		    heroi_id="<?php echo $id; ?>" 
		    retorno="div_retorno" 
		    type="button">Menos (-)</button>
</div>
<input id="<?php echo $campo; ?>" type="number" readonly="true" class="form-control"
	placeholder="" aria-label="Example text with two button addons"
	aria-describedby="button-addon3" value="<?php echo $valor; ?>">
<div class="input-group-append">
	<button class="btn btn-outline-secondary" 
			onclick="fncAlterarHeroi(this,'<?php echo $campo; ?>',1)" 
		    funcao="<?php echo $funcao; ?>" 
		    controlador="<?php echo $controlador; ?>" 
		    heroi_id="<?php echo $id; ?>"
		    retorno="div_retorno" type="button">Mais (+)</button>
</div>    
<?php 
}

//inicio
$heroi = carregarHeroi($conexao);
?>
<div class="tab-pane fade show active" id="status" role="tabpanel"
	aria-labelledby="status-tab">
	<div class="card">
		<div class="card-body">
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Habilidade:</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiHabilidade', 
						    'ControladorHeroi', 'status-habilidade', $heroi->habilidade); ?>
					</div>
				</div>
			</div>
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Energia:</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiEnergia', 
						    'ControladorHeroi', 'status-energia', $heroi->energia); ?>
					</div>
				</div>
			</div>
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Sorte:</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiSorte', 
						    'ControladorHeroi', 'status-sorte', $heroi->sorte); ?>
					</div>
				</div>
			</div>

			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Rota:</label>
					<div class="input-group col-md-12">
						<input type="number" class="form-control" id="status-rota"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" 
									onclick="fncIncluirRotaHeroi(this,'status-rota')" 
                        		    funcao="incluirRota" 
                        		    controlador="ControladorRota" 
                        		    heroi_id="<?php echo $heroi->heroi_id; ?>"
                        		    retorno="div_retorno"
							type="button">Incluir</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('view/rota.php'); ?>
</div>