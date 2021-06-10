<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once "classe/Dados.php";

require_once "controle/controladorCriatura.php";
require_once "dao/daoCriatura.php";
require_once "classe/Criatura.php";

require_once "controle/controladorInventario.php";
require_once "dao/daoInventario.php";
require_once "classe/Inventario.php";

require_once "controle/controladorRota.php";
require_once "dao/daoRota.php";
require_once "classe/Rota.php";

require_once "controle/controladorHeroi.php";
require_once "dao/daoHeroi.php";
require_once "classe/Heroi.php";

new Controlador();

class Controlador {
    
    public $funcao;
    public $controlador;
    
    public function __construct() {
        $funcao = $_POST["funcao"];
        $controlador = $_POST["controlador"];
        
        unset($_POST["funcao"]);
        unset($_POST["controlador"]);
        unset($_POST["retorno"]);
        //unset($_POST["mensagem"]);
        
        $this->chamarControle($_POST,$funcao,$controlador);
    }
    
    
    private function chamarControle($post,$funcao,$controlador){
        try {
            $class = new $controlador();
            echo $class->$funcao($post);
        } catch (Exception $e) {
            echo $e;
        }
    }
    
}

?>