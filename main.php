<?php
session_start();
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
if (isset($_SESSION["login"])) {
    
require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();

function carregarHeroi($conexao,$userId){
    $sql = "SELECT h.`id` as heroi_id,
               h.`nome`,
               h.`aventura`,
               h.`status`,
               h.`habilidade`,
               h.`habilidade_inicial`,
               h.`energia`,
               h.`energia_inicial`,
               h.`sorte`,
               h.`sorte_inicial`
        FROM `tb_aventura_heroi` h
        WHERE h.`status` = 1 AND user_id = ".$_SESSION["login"];
    
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar heroi e status');
    $herois = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $herois[] = $objItem;
    }
    return $herois;
}

$herois = carregarHeroi($conexao,$_SESSION["login"]);
?>
<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<body class="bg-dark text-white">
	<?php include('view/navegador.php'); ?>
	<div class="tab-content bg-dark text-white" id="tab-content">		
    	<div class="card bg-dark text-white">
    	
    		<form id="form-heroi" method="post" action="home.php">
    			<input type="hidden" id="heroi_id" name="heroi_id">
    		</form>
    		<div class="card-body">
    			<div class="btn-toolbar justify-content-between"
						role="toolbar" aria-label="Toolbar with button groups">
						<div class="btn-group" role="group" aria-label="First group">
							<h5 style="margin-top: 5px;"><a class="">Heróis</a></h5>												
						</div>
						<div class="input-group">
							<!-- a href="#" class="btn btn-secondary" onClick="fnAbreArquivo('import.json', './imports/','<?php echo $_SESSION["login"]; ?>')"><b>import</b></a>
							&nbsp;-->
							<a href="#" class="btn btn-secondary" onclick="fcnCarregarModalCriarHeroi()"><b>+</b></a>														
						</div>											
					</div>
    			
    			<h5 class="card-title text-align: center;">
    			</h5>
    			<h5 class="card-title">				
    								
    			</h5>
    			<div class="row">
    				<div class="col-md-12">
    					<ul class="list-group" id="list-group-heroi" style="align-items: center;">
    						<?php 
    						if ($herois != null && count($herois) > 0 ) {
    						    foreach ($herois as $heroi) {
    						    $colorHeroi = ($heroi->energia > 0)?'text-danger':'';    
    						?>
    						<li id="list-heroi-<?php echo $heroi->heroi_id; ?>" class="list-group-item bg-dark text-white border border-light">
    							<table>
    								<tr>
    									<td style="min-width: 270px; text-align: center;" colspan="2">
    										<div class="btn-toolbar justify-content-between"
    											role="toolbar" aria-label="Toolbar with button groups">
    											<div class="btn-group" role="group" aria-label="First group">
    												<h5 style="margin-top: 5px;" onclick="irPagina(<?php echo $heroi->heroi_id; ?>)" id="criatura-luta-nome"><a class="<?php echo $colorHeroi; ?>"><b><?php echo $heroi->nome; ?></b></a></h5>												
    											</div>
    											<div class="input-group">
    												<button onclick="fcnCarregarModalHeroi(<?php echo $heroi->heroi_id; ?>);"						                				
    														type="button" class="btn btn-danger"><b>x</b></button>
    											</div>											
    										</div>
    									</td>
    								</tr>
    								<tr>
    									<td style="min-width: 135px;">Habilidade: (<?php echo $heroi->habilidade_inicial; ?>)</td>
    									<td style="min-width: 135px; text-align: right;"><b id="criatura-luta-habilidade"><?php echo $heroi->habilidade; ?></b></td>
    								</tr>
    								<tr>
    									<td>Energia: (<?php echo $heroi->energia_inicial; ?>)</td>
    									<td style="text-align: right;"><b id="criatura-luta-energia"><?php echo $heroi->energia; ?></b></td>
    								</tr>
    								<tr>
    									<td>Sorte: (<?php echo $heroi->sorte_inicial; ?>)</td>
    									<td style="text-align: right;"><b id="criatura-luta-resultado"><?php echo $heroi->sorte; ?></b></td>
    								</tr>
    								<tr>
    									<td colspan="2" style="text-align: center;"><?php echo $heroi->aventura; ?></td>    									
    								</tr>							
    							</table>
    						</li>
    						
    						<?php }
    						}?>						
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>	
	</div>
	<?php include('view/modal-heroi.php'); ?>
	<?php include('view/modal-heroi-criar.php'); ?>
	<?php include('view/modal-mensagem.php'); ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('view/required.php'); 
$dados->FecharBanco($conexao);
?>
<audio id="myAudio" style="display: none;">
  <source src="./asset/dice.jpg" type="audio/mpeg">
</audio>
<script>
$( document ).ready(function() {
	var isMobile = detectarMobile();
    if(isMobile == true){
		$('#form-heroi').attr('action','home.php');
    }else if(isMobile == false){
    	$('#form-heroi').attr('action','pc_home.php');
    }
});

</script>

</html>
<?php }else{
    header('Location: index.php?m=1');
} ?>