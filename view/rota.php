<?php 
function carrgarRota($conexao, $heroiId){
    $sql = "SELECT r.`id`,
                   r.`rota`
        FROM `tb_aventura_rota` r
        WHERE r.`heroi_id` = ".$heroiId." ORDER BY r.`id` DESC ";
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
					<label for="button-addon4" class="col-md-12">Rota:</label>
					<div class="input-group col-md-12">
						<input type="number" class="form-control" id="status-rota"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3">
						<div class="input-group-append">
							<button class="btn  btn-secondary" 
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

    <div class="card bg-dark text-white">
    	<input id="position-rota" type="hidden" value="1">
    	<div id="div-rota-card-body" class="card-body" style="padding-left: 50px; padding-right: 50px; overflow: auto; height: 300px;">
    		<?php 
    		if ($rotas != null && count($rotas) > 0 ) {
    		    foreach ($rotas as $key => $rota) {
    		        if($key % 2 == 0){
    		            $justify = 'justify-content-end';
    		            $full = 'full';
    		            $cornerCima = 'top-right';
    		            $cornerBaixo = 'left-bottom';		            
    		        }else{
    		            $justify = '';
    		            $full = 'bottom';
    		            $cornerCima = 'right-bottom';
    		            $cornerBaixo = 'top-left';		            
    		        }
    		        
    		        if($key > 0){
    ?>
                		<div class="row timeline rota-<?php echo $rota->id; ?>">
                        	<div class="col-2 rota-<?php echo $rota->id; ?>">
                        		<div class="corner <?php echo $cornerCima; ?>"></div>
                        	</div>
                        	<div class="col-8 rota-<?php echo $rota->id; ?>">
                        		<hr />
                        	</div>
                        	<div class="col-2 rota-<?php echo $rota->id; ?>">
                        		<div class="corner <?php echo $cornerBaixo; ?>"></div>
                        	</div>
                        </div>			
    <?php           } ?>
    		<div class="row align-items-center how-it-works d-flex <?php echo $justify; ?> rota-<?php echo $rota->id; ?>">
    			<div class="col-2 text-center <?php echo $full; ?> d-inline-flex justify-content-center align-items-center rota-<?php echo $rota->id; ?>">
    				<div onclick="fcnCarregarModalRota(<?php echo $rota->id; ?>, <?php echo $heroi->heroi_id; ?>);" class="circle font-weight-bold rota-<?php echo $rota->id; ?>"><?php echo $rota->rota; ?></div>
    			</div>
    		</div>   		
    		<?php    		      
                }
    		}
    		?>    		
    	</div>
    </div>
</div>