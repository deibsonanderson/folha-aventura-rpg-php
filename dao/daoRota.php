<?php

class DaoRota extends Dados
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

    
    public function listarRota($heroiId) {
        try {
            $retorno = array();
            $conexao = $this->conectarBanco();
            $sql = "SELECT id, rota, heroi_id FROM tb_aventura_rota WHERE `heroi_id` = ".$heroiId." ORDER BY `id` DESC ";
            $query = mysqli_query($conexao,$sql) or die('Erro na execução do listar rota!');
            while ($objetoRota = mysqli_fetch_object($query)) {
                $rota = new Rota();
                $rota->setId($objetoRota->id);
                $rota->setRota($objetoRota->rota);
                $rota->setHeroiId($objetoRota->heroi_id);
                $retorno[] = $rota;
            }
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
    
    
    
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
            sleep(0.5);
            $retorno = mysqli_insert_id($conexao);
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
		