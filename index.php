<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();
?>


<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<body>
	<?php include('view/navegador.php'); ?>
	<div class="tab-content" id="tab-content">
		<div id="div_retorno"></div>
    	<?php include('view/status.php'); ?>
    	<?php include('view/inventario.php'); ?>
    	<?php include('view/criatura.php'); ?>    	
		<!--div class="tab-pane fade" id="path" role="tabpanel" aria-labelledby="path-tab">...</div-->
	</div>
	<?php include('view/modal-inventario.php'); ?>
	<?php include('view/modal-criatura.php'); ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('view/required.php'); 
$dados->FecharBanco($conexao);
?>
</html>