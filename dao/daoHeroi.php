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
													'1')";

            $retorno = mysqli_query($conexao,$sql) or die('Erro na execução do insert heroi!');
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
            $sql = "UPDATE tb_aventura_heroi SET status = '0' WHERE id = " . $id;
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do delet rota!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
}

?>		
		