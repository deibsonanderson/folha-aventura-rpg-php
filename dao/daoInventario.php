<?php
class DaoInventario extends Dados{

    // construtor
    public function __construct(){}

    // destruidor
    public function __destruct(){}

    public function incluirInventario($inventario)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "INSERT INTO tb_aventura_inventario ( id,
    													 descricao,
    													 quantidade,
                                                         heroi_id,
                                                         tipo,
    													 status	
    													 )VALUES(
    													 NULL,													
    													 '" . $inventario->getDescricao() . "',
    													 '" . $inventario->getQuantidade() . "',
                                                         '" . $inventario->getHeroiId() . "',
                                                         '" . $inventario->getTipo() . "',
    													 '1')";
           
            mysqli_query($conexao, $sql) or die('Erro na execução do insert!');
            sleep(0.5);
            $retorno = mysqli_insert_id($conexao); 
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function alterarInventario($inventario)
    {
        try {
            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_aventura_inventario SET descricao = '" . $inventario->getDescricao() . "',
											         quantidade = '" . $inventario->getQuantidade() . "',
   												     status = '1' WHERE id = " . $inventario->getId() . "";
            $retorno = mysqli_query($conexao, $sql) or die('Erro 8na execução do update inventario!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function excluirInventario($id){
        try {
            $conexao = $this->conectarBanco();

            $sql = "DELETE FROM tb_aventura_inventario WHERE id = " . $id;
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do delet!');

            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }
}

?>		
		