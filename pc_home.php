<?php
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();
?>


<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<body class="bg-dark text-white">
	<?php include('view/navegador.php'); ?>
	<br/>
	<img alt="hero-art" id="hero-art" class="heroi-list-art" src="./image/hero-art.png" style="width:300px;position: absolute;z-index: 0;opacity:0.0;">
	<img alt="monster-art" id="monster-art" class="monster-list-art" src="./image/monster-art.png" style="left:1000px;width:400px;position: absolute;z-index: 0;opacity:0.0;">
	<div class="container">
		<div class="row">
    		<div class="col-4">
            	<?php include('view/pc_status.php'); ?> 
            </div>
    		<div class="col-4">
            	<?php include('view/pc_criatura.php'); ?>            	
            </div>
    		<div class="col-4">
            	<?php include('view/pc_dado.php'); ?>
            </div>
		</div>			
		<br/>
		<div class="row">
			<div class="col-6">
          		<?php include('view/pc_inventario.php'); ?>          		
        	</div>
			<div class="col-6">
          		<?php include('view/pc_rota.php'); ?>          		
        	</div>
		</div>
		<div class="row">
			<div class="col-12">
      			<div class="card bg-dark text-white" style="border: none;">
            		<div class="" style="margin: auto;">
            			<div id="div-rota-card-body" style="overflow: auto;max-width: 1024px;">	
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
                        
                        echo '<ul class="tree"><li id="'.$rotas[0]->id.'"><code onclick="fncIncluirRotaHeroiTreeViewPai('.$rotas[0]->id.', '.$rotas[0]->rota.',0)" class="text-white" style="font-size:100%;background-color:GREEN;">'.$rotas[0]->rota.'</code>';
                        function montarTreview($rotas){
                            echo '<ul>';
                            if ($rotas != null && count($rotas) > 0) {
                                foreach ($rotas as $rota) {
                                    $isExluir = ($rota->filhos == null || count($rota->filhos) <= 0)?'1':'0';                        
                                    if($rota->filhos != null){
            							echo '<li><code onclick="fncIncluirRotaHeroiTreeViewPai('.$rota->id.', '.$rota->rota.','.$isExluir.')" class="text-white" style="font-size:100%;'.retornoCor($rota).'">'.$rota->rota.'</code>';
                                        echo montarTreview($rota->filhos);
                                    }else{
            							echo '<li><code onclick="fncIncluirRotaHeroiTreeViewPai('.$rota->id.', '.$rota->rota.','.$isExluir.')" class="text-white" style="font-size:100%;'.retornoCor($rota).'">'.$rota->rota.'</code>';
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
		</div>
	</div>
	<?php include('view/modal-inventario.php'); ?>
	<?php include('view/modal-criatura.php'); ?>
	<?php include('view/modal-rota.php'); ?>
	<?php include('view/modal-inventario-excluir.php'); ?>
	<?php include('view/modal-mensagem.php'); ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php

include ('view/required.php');
$dados->FecharBanco($conexao);
?>
<audio id="dice-song" style="display: none;">
	<source src="./asset/dice.jpg" type="audio/mpeg">
</audio>
<audio id="sword-song" style="display: none;">
	<source src="./asset/swosh-sword-swing.jpg" type="audio/mpeg">
</audio>

<audio id="wrong-song" style="display: none;">
	<source src="./asset/wrong.jpg" type="audio/mpeg">
</audio>

<audio id="bell-song" style="display: none;">
	<source src="./asset/bell.jpg" type="audio/mpeg">
</audio>

</html>