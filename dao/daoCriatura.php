<?php
class DaoCriatura extends Dados
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}


    public function incluirCriatura($criatura)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "INSERT INTO tb_aventura_criatura (  id,
    													nome,
    													habilidade,
    													energia,
                                                        heroi_id,
 													    status	
														)VALUES(
														NULL,														
														'" . $criatura->getNome() . "',
														'" . $criatura->getHabilidade() . "',
														'" . $criatura->getEnergia() . "', 
                                                        '" . $criatura->getHeroiId() . "',
														'1')";

            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do insert!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function alterarCriatura($criatura)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_criatura SET nome = '" . $criatura->getNome() . "', habilidade = '" . $criatura->getHabilidade() . "' ,energia = '" . $criatura->getEnergia() . "' WHERE id = " . $criatura->getId();
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function alterarEnergiaCriatura($criatura)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_criatura SET energia = '" . $criatura->getEnergia() . "' WHERE id = " . $criatura->getId();
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }  
    

    public function excluirCriatura($id)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "DELETE FROM tb_aventura_criatura WHERE id = " . $id;
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do delet!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
}

?>		
		