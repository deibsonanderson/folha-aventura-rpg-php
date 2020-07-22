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
<div class="card">
	<input id="position-rota" type="hidden" value="1">
	<div id="div-card-body" class="card-body"
		style="padding-left: 50px; padding-right: 50px; overflow: auto; height: 300px;">
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
            		<div class="row timeline">
                    	<div class="col-2">
                    		<div class="corner <?php echo $cornerCima; ?>"></div>
                    	</div>
                    	<div class="col-8">
                    		<hr />
                    	</div>
                    	<div class="col-2">
                    		<div class="corner <?php echo $cornerBaixo; ?>"></div>
                    	</div>
                    </div>			
<?php           } ?>
		<div class="row align-items-center how-it-works d-flex <?php echo $justify; ?>">
			<div
				class="col-2 text-center <?php echo $full; ?> d-inline-flex justify-content-center align-items-center">
				<div class="circle font-weight-bold"><?php echo $rota->rota; ?></div>
			</div>
		</div>   		
		<?php 
            }
		}
		?>
	</div>
</div>