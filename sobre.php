<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<body class="bg-dark text-white">
	<?php include('view/navegador.php'); ?>
	<div class="tab-content bg-dark text-white" id="tab-content">
		<div class="card bg-dark text-white">
			<div class="card-body">
				<h5 class="card-title">Sobre</h5>
				<p>Esse aplicativo tem como objetivo facilitar o uso das aventuras de livro jogo da serie fighting fantasy (aventuras fantásticas), nela você poderá criar seu personagem e salvar todo seu progresso. Incluindo: rotas, inventario dados e modo de batalha.</p>
			</div>
		</div>
	</div>
	<?php include('view/modal-heroi.php'); ?>
	<?php include('view/modal-heroi-criar.php'); ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include ('view/required.php');
?>
<audio id="myAudio" style="display: none;">
	<source src="./asset/dice.jpg" type="audio/mpeg">
</audio>

</html>