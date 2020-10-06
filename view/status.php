<?php 
function carregarHeroi($conexao,$heroiId ){
   
    $sql = "SELECT h.`id` as heroi_id,
               h.`nome`,
               h.`aventura`,
               h.`status`,
               h.`habilidade`,
               h.`habilidade_inicial`,
               h.`energia`,
               h.`energia_inicial`,
               h.`honra`,
               h.`honra_inicial`,
               h.`sorte`,
               h.`sorte_inicial`,
               h.`poder_fogo`,
               h.`poder_fogo_inicial`,
               h.`blindagem`,
               h.`blindagem_inicial`
        FROM `tb_aventura_heroi` h
        WHERE h.`id` = ".$heroiId." AND h.`status` = 1";
    
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
	<button class="btn  btn-secondary" 
	        onclick="fncAlterarHeroi(this,'<?php echo $campo; ?>',0)" 
		    funcao="<?php echo $funcao; ?>" 
		    controlador="<?php echo $controlador; ?>"
		    heroi_id="<?php echo $id; ?>" 
		    type="button">Menos (-)</button>
</div>
<input id="<?php echo $campo; ?>" type="number" readonly="true" class="form-control text-center"
	placeholder="" aria-label="Example text with two button addons"
	aria-describedby="button-addon3" value="<?php echo $valor; ?>">
<div class="input-group-append">
	<button class="btn  btn-secondary" 
			onclick="fncAlterarHeroi(this,'<?php echo $campo; ?>',1)" 
		    funcao="<?php echo $funcao; ?>" 
		    controlador="<?php echo $controlador; ?>" 
		    heroi_id="<?php echo $id; ?>"
		    type="button">Mais (+)</button>
</div>    
<?php 
}

//inicio
if(isset($_POST["heroi_id"])){
    $heroiId = $_POST["heroi_id"];    
}
$heroi = carregarHeroi($conexao, $heroiId);
?>
<div class="tab-pane fade show active" id="status" role="tabpanel" aria-labelledby="status-tab">
	<div class="card bg-dark text-white">
		<div class="card-body">
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Habilidade: (inicial: 
						<span id="status-habilidade-inicial"><?php echo $heroi->habilidade_inicial; ?></span>)
					</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiHabilidade', 
						    'ControladorHeroi', 'status-habilidade', $heroi->habilidade); ?>
					</div>
				</div>
			</div>
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Energia: (inicial: 
						<span id="status-energia-inicial"><?php echo $heroi->energia_inicial; ?></span>)
					</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiEnergia', 
						    'ControladorHeroi', 'status-energia', $heroi->energia); ?>
					</div>
				</div>
			</div>
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Sorte: (inicial: 
						<span id="status-sorte-inicial"><?php echo $heroi->sorte_inicial; ?></span>)
					</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiSorte', 
						    'ControladorHeroi', 'status-sorte', $heroi->sorte); ?>
					</div>
				</div>
			</div>
			<?php if($heroi->aventura == 'A Espada do Samurai'){  ?>
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Honra: (máximo: 
						<span id="status-honra-inicial"><?php echo $heroi->honra_inicial; ?></span>)
					</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiHonra', 
						    'ControladorHeroi', 'status-honra', $heroi->honra); ?>
					</div>
				</div>
			</div>				
			<?php } ?>
			<?php if($heroi->aventura == 'O Guerreiro das Estradas'){  ?>	
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Poder de Fogo: (inicial: 
						<span id="status-poder-fogo-inicial"><?php echo $heroi->poder_fogo_inicial; ?></span>)
					</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiPoderFogo', 
						    'ControladorHeroi', 'status-poder-fogo', $heroi->poder_fogo); ?>
					</div>
				</div>
			</div>	
			<br />
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Blindagem: (inicial: 
						<span id="status-blindagem-inicial"><?php echo $heroi->blindagem_inicial; ?></span>)
					</label>
					<div class="input-group col-md-12">
						<?php echo carregarCampoStatus($heroi->heroi_id, 'alterarHeroiBlindagem', 
						    'ControladorHeroi', 'status-blindagem', $heroi->blindagem); ?>
					</div>
				</div>
			</div>							
			<?php } ?>												
		</div>
	</div>	
</div>