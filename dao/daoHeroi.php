	<?php

class DaoHeroi extends Dados
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

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
}

?>		
		