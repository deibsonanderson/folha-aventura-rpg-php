	<?php

class DaoHeroi extends Dados
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}
    
    public function incluirHeroi($heroi) {
        try {
            $conexao = $this->conectarBanco();
            
            $sql = "INSERT INTO tb_aventura_heroi (  id,
													  nome,
                 									  aventura,
                                                      habilidade,
                                                      energia,
                                                      sorte,
                                                      habilidade_inicial,
                                                      energia_inicial,
                                                      sorte_inicial,
                                                      user_id,
                                                      data_criacao,
                									  status
													)VALUES(
													NULL,
													'" . $heroi->getNome() . "',													    
													'" . $heroi->getAventura() . "',
                                                    '" . $heroi->getHabilidade() . "',
                                                    '" . $heroi->getEnergia() . "',
                                                    '" . $heroi->getSorte() . "',
                                                    '" . $heroi->getHabilidade() . "',
                                                    '" . $heroi->getEnergia() . "',
                                                    '" . $heroi->getSorte() . "',
                                                    '" . $heroi->getUserId() . "',
                                                    NOW(),													    
													'1')";

            mysqli_query($conexao,$sql) or die('Erro na execução do insert heroi!');
            sleep(0.5);
            $retorno = mysqli_insert_id($conexao);
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }	

    public function alterarHeroiHabilidade($heroi)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_heroi SET habilidade = '" . $heroi->getHabilidade() . "' WHERE id = " . $heroi->getId();
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update de status habilidade!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public function alterarHeroiEnergia($heroi)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_heroi SET energia = '" . $heroi->getEnergia() . "' WHERE id = " . $heroi->getId();
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update de status habilidade!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public function alterarHeroiEnergiaSorte($heroi)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_heroi SET energia = '" . $heroi->getEnergia() . "' , sorte = '" . $heroi->getSorte() . "' WHERE id = " . $heroi->getId();
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update de status habilidade!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public function alterarHeroiSorte($heroi)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_heroi SET sorte = '" . $heroi->getSorte() . "' WHERE id = " . $heroi->getId();
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update de status habilidade!');
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
            
            $sql = "DELETE FROM tb_aventura_inventario WHERE heroi_id = " . $id;
            mysqli_query($conexao, $sql) or die('Erro na execução do delet!');
            
            $sql = "DELETE FROM tb_aventura_rota WHERE heroi_id = " . $id . "";
            mysqli_query($conexao, $sql) or die('Erro na execução do delet rota!');
            
            $sql = "DELETE FROM tb_aventura_heroi WHERE id = " . $id . "";
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do delet rota!');
            
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
}

?>		
		