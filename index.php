<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();

function carregarHeroi($conexao){
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
        WHERE h.`status` = 1";
    
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar heroi e status');
    $herois = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $herois[] = $objItem;
    }
    return $herois;
}

$herois = carregarHeroi($conexao);
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
    							<table border="0">
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
function detectarMobile() {
  var check = false; //wrapper no check
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
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