<?php

class Dados{

	private $local = "localhost";
	private $usuario = "root";
	private $senha  = "";
	private $banco = "aventura";

	public function __construct(){
	}

	public function __destruct(){
	}
	//metodos********************************************************************


	public function conectarBanco(){

		$conexao = mysqli_connect($this->local,$this->usuario,$this->senha) or die( "nao foi possivel conectar" );
		mysqli_set_charset($conexao,"utf8");

		mysqli_select_db($conexao,$this->banco) or die ("Nao foi possivel selecionar o banco de dados");
		return $conexao;
	}

	public function fecharBanco($conexao){
		mysqli_close($conexao);
	}



}
?>