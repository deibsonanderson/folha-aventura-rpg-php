<?php  
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once "classe/Dados.php";
$caminho = $_GET['d'];
$arquivo = $_GET['f'];
$userId = $_GET['u'];
$file = $caminho."/".$arquivo;


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
        WHERE h.`status` = 1 AND user_id = ".$userId;
    
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar heroi e status');
    $herois = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $herois[] = $objItem;
    }
    return $herois;
}

//Criando arquivo
$herois = carregarHeroi($conexao,$userId);
$newFile = fopen($file,'w');
if ($arquivo == false){
    echo '<script>alert("O arquivo requisitado não foi encontrado neste servidor."); history.back();</script>';
    die();
}
fwrite($newFile, json_encode($herois));
fclose($newFile);
sleep(1);
//Baixando arquivo
if (file_exists($file)){
	header('Content-Type: application/save');
	header('Content-Length:'.filesize($file));
	header('Content-Disposition: attachment; filename="'.$arquivo.'"');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Pragma: no-cache');
	
	// nesse momento ele le o arquivo e envia
	$fp = fopen($file, "r");
	fpassthru($fp);
	fclose($fp);
} else {
	echo '<script>alert("O arquivo requisitado não foi encontrado neste servidor."); history.back();</script>';
}

$dados->FecharBanco($conexao);
?>