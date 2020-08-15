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