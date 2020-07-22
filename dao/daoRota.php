<?php

class DaoRota extends Dados
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

    public function incluirRota($rota)
    {
        try {
            $conexao = $this->conectarBanco();

            $sql = "INSERT INTO tb_aventura_rota (  id,
													rota,
													heroi_id
    												)VALUES(
    												NULL,												
    												'" . $rota->getRota() . "',
    												'" . $rota->getHeroiId() . "')";

            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do insert rota!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function excluirRota($id)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "DELETE FROM tb_aventura_rota WHERE id = " . $id . "";
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do delet rota!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
}

?>		
		