<?php 
function carrgarRota($conexao, $heroiId){
    $sql = "SELECT r.`id`,
                   r.`rota`,
                   r.`rota_id`,
                   r.`contexto` 
        FROM `tb_aventura_rota` r
        WHERE r.`heroi_id` = ".$heroiId." ORDER BY r.`id` ASC ";
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar rotas');
    $rotas = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $rotas[] = $objItem;
    }
    return $rotas;
}

function retornoCor($rota){
	if($rota->contexto == 0){
			if($rota->filhos != null){
				return 'background-color:DIMGREY;';	
			}else{
				return '';
			}
	}else if($rota->contexto == 1){
		return 'background-color:darkblue;';
	}else if($rota->contexto == 2){
		return 'background-color:black;';
	}else if($rota->contexto == 3){
		return 'background-color:saddlebrown';
	}else if($rota->contexto == 4){
		return 'background-color:RED;';
	}else if($rota->contexto == 5){
		return 'background-color:GREEN;';
	}
}

$rotas = carrgarRota($conexao, $heroi->heroi_id);
?>
<div class="" id="rota" role="tabpanel" aria-labelledby="rota-tab">
	<div class="bg-dark text-white">
		<div class="">
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Rota Origem:</label>
					<div class="input-group col-md-12">
						<input type="number" style="text-align: center;" class="form-control" 
						    rota="" rota_id="" id="pai-status-rota" is-excluir=""
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" readonly="readonly">
						<div class="input-group-append">
							<button class="btn btn-danger" id="btn-pai-status-rota"
								onclick="fcnCarregarModalRotaTreeView(<?php echo $heroi->heroi_id; ?>)"
								funcao="incluirRota" controlador="ControladorRota" disabled="disabled"
								type="button">Excluir</button>
						</div>							
					</div>
				</div>
			</div>
			<br/>
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Rota:</label>
					<div class="input-group col-md-12">
						<input type="number" class="form-control" id="status-rota"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3">
						<div class="input-group-append">
							<button class="btn  btn-secondary"
								onclick="fncIncluirRotaHeroiTreeView(this,'status-rota')" disabled="disabled"
								funcao="incluirRota" controlador="ControladorRota" id="btn-status-rota"
								heroi_id="<?php echo $heroi->heroi_id; ?>"
								type="button">Incluir</button>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<div class="form-row">
				<div class="col-md-12">
					<label for="button-addon4" class="col-md-12">Contexto:</label>
    				<div class="input-group col-md-12">
    					<select class="form-control" id="contexto-rota-aventura">
                            <option value="0">Normal</option>
                            <option value="1">Bom</option>
                            <option value="2">Ruim</option>
                            <option value="3">Batalha</option>
                            <option value="4">Morte</option>
                            <option value="5">Final</option>
                        </select>					
                    </div>
    			</div>
			</div>			
		</div>
	</div>
</div>
