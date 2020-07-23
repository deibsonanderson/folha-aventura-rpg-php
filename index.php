<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();
?>


<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<body class="bg-dark text-white">
	<?php include('view/navegador.php'); ?>
	<div class="tab-content bg-dark text-white" id="tab-content">
		<div id="div_retorno"></div>
    	<?php include('view/status.php'); ?> <!-- status-tab -->
    	<?php include('view/inventario.php'); ?> <!-- inventory-tab -->
    	<?php include('view/criatura.php'); ?> <!-- enemy-tab -->
    	<?php include('view/rota.php'); ?> <!-- rota-tab -->
    	<?php include('view/dado.php'); ?> <!-- dado-tab -->
	</div>
	<?php include('view/modal-inventario.php'); ?>
	<?php include('view/modal-criatura.php'); ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('view/required.php'); 
$dados->FecharBanco($conexao);
?>
<audio id="myAudio" style="display: none;">
  <source src="./asset/dice.jpg" type="audio/mpeg">
</audio>

</html>