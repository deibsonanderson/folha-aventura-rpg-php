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
	<img alt="hero-art" id="hero-art" src="./image/hero-art.png" style="width:300px;position: absolute;z-index: -5;opacity:0.0;">
	<img alt="monster-art" id="monster-art" src="./image/monster-art.png" style="left:0px;width:300px;position: absolute;z-index: -5;opacity:0.0;">
	<?php include('view/abas.php'); ?>
	<div class="tab-content bg-dark text-white" id="tab-content">
		<?php include('view/status.php'); ?> <!-- status-tab -->
    	<?php include('view/inventario.php'); ?> <!-- inventory-tab -->
    	<?php include('view/criatura.php'); ?> <!-- enemy-tab -->
    	<?php include('view/rota.php'); ?> <!-- rota-tab -->
    	<?php include('view/dado.php'); ?> <!-- dado-tab -->
	</div>
	<?php include('view/modal-inventario.php'); ?>
	<?php include('view/modal-criatura.php'); ?>
	<?php include('view/modal-veiculo.php'); ?>
	<?php include('view/modal-rota.php'); ?>
	<?php include('view/modal-inventario-excluir.php'); ?>
	<?php include('view/modal-mensagem.php'); ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('view/required.php'); 
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