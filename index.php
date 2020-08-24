<?php 
session_start();
unset($_SESSION["login"]);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

require_once "classe/Dados.php";
$dados = new Dados();
$conexao = $dados->conectarBanco();

if(isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])  &&  $_POST["inputEmail"] != null && $_POST["inputPassword"] != null){
    
    $email = trim($_POST["inputEmail"]);
    $password = md5(trim($_POST["inputPassword"]));
    
    $sql = "SELECT u.`id`,
                   u.`email`,
                   u.`password`               
        FROM `tb_aventura_user` u
        WHERE u.`email` = '".$email."' AND u.password = '".$password."'";
    
    $query = mysqli_query($conexao,$sql) or die('erro nos carregar login');
    $user = null;
    while ($objItem = mysqli_fetch_object($query)) {
        $user = $objItem;
        break;
    }
    
    if($user != null && $user->id != null){
        $_SESSION["login"] = $user->id;
        header('Location: main.php');
    }else{
        echo '<script>alert("Não foi possivel logar favor checar o email e password!"); history.back();</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<?php include('view/head.php'); ?>
<link rel="stylesheet" href="./asset/signin.css">
  <body class="text-center bg-dark text-white" cz-shortcut-listen="true">
    <form class="form-signin" method="POST" action="#">
      <img class="mb-4" src="./image/fighting_fantasy_logo.png" alt="" width="100">
      <h1 class="h3 mb-3 font-weight-normal">Favor se logar</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="required">
      <div class="checkbox mb-3">
        <!-- label>
          <input type="checkbox" value="remember-me"> Lembrar-me
        </label-->
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      <a class="btn btn-lg btn-danger btn-block" href="usuario.php" >Criar</a>
      <p class="mt-5 mb-3 text-muted">© 2020</p>
    </form>
  

</body></html>
<?php 
include('view/required.php');
$dados->FecharBanco($conexao);
?>