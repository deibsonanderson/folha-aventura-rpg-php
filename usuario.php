<?php 
session_start();
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
unset($_SESSION["login"]);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();

if(isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])  &&  $_POST["inputEmail"] != null 
    && $_POST["inputPassword"] != null && $_POST["inputConfirmPassword"] != null){

    $email = trim($_POST["inputEmail"]);
    $password = md5(trim($_POST["inputPassword"]));
    $passwordConfirm = md5(trim($_POST["inputConfirmPassword"]));
        
    
    $sql = "SELECT u.`email`               
        FROM `tb_aventura_user` u
        WHERE u.`email` = '".$email."'";
    
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar login');
    $user = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $user = $objItem;
        break;
    }
    
    if($user != null || $user->id != null){
        echo '<script>alert("Email ja existe!"); history.back();</script>';
    }else{
        if($password != $passwordConfirm){
            echo '<script>alert("Password não coincidem!"); history.back();</script>';
        }else{
            $sql = "INSERT INTO `tb_aventura_user` (email,password) VALUES ('".$email."','".$password."')";
            $query = mysqli_query($conexao,$sql) or die('erro nos carregar login');
            echo '<script>alert("Usuário cadastrado com sucesso");
			window.location.href = "http://dicaseprogramacao.com.br/aventura/index.php";
			</script>';            
        }
    }
}
?>

<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<link rel="stylesheet" href="./asset/signin.css">
  <body class="text-center bg-dark text-white" cz-shortcut-listen="true">
    <form class="form" method="POST" action="#">
      <img class="mb-4" src="./image/fighting_fantasy_logo.png" alt="" width="100">
      <h1 class="h3 mb-3 font-weight-normal">Cadastrar um novo usuário</h1>
      <input name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
      <br/>
      <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="required">
      <input type="password" name="inputConfirmPassword" id="inputConfirmPassword" class="form-control" placeholder="Confirme o Password" required="required">
      <br/>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
      <a class="btn btn-lg btn-secondary btn-block" href="index.php">Voltar</a>
      <p class="mt-5 mb-3 text-muted">© 2020</p>
    </form>
  

</body></html>
<?php 
include('view/required.php');
$dados->FecharBanco($conexao);
?>