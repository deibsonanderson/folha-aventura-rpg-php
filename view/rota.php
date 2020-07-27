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
$rotas = carrgarRota($conexao, $heroi->heroi_id);
?>
<div class="tab-pane fade" id="rota" role="tabpanel" aria-labelledby="rota-tab">
	<div class="card bg-dark text-white">
		<div class="card-body">
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
								heroi_id="<?php echo $heroi->heroi_id; ?>" retorno="div_retorno"
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
                            <option value="4">Sorte</option>
                            <option value="5">Morte</option>
                            <option value="6">Final</option>
                        </select>					
                    </div>
    			</div>
			</div>			
		</div>
	</div>

	<div class="card bg-dark text-white">
		<div class="card-body" style="margin: auto;">
			<div id="div-rota-card-body" style="overflow: auto">	
            <?php 
            foreach ($rotas as $rota) {
                $array = null;  
                foreach($rotas as $rota2){
                    if($rota2->rota_id == $rota->id){
                        $array[] = $rota2;
                    }
                }
                $rota->filhos = $array;
            }
            
            echo '<ul class="tree"><li id="'.$rotas[0]->id.'"><code onclick="fncIncluirRotaHeroiTreeViewPai('.$rotas[0]->id.', '.$rotas[0]->rota.',0)" class="text-white">'.$rotas[0]->rota.'</code>';
            function montarTreview($rotas){
                echo '<ul>';
                if ($rotas != null && count($rotas) > 0) {
                    foreach ($rotas as $rota) {
                        $isExluir = ($rota->filhos == null || count($rota->filhos) <= 0)?'1':'0';                        
                        echo '<li><code onclick="fncIncluirRotaHeroiTreeViewPai('.$rota->id.', '.$rota->rota.','.$isExluir.')" class="text-white" style="font-size:100%">'.$rota->rota.'</code>';
                        if($rota->filhos != null){
                            echo montarTreview($rota->filhos);
                        }
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
            echo montarTreview($rotas[0]->filhos);
            echo '</li></ul>';
            ?>	
			</div>
		</div>
	</div>    			
	
</div>