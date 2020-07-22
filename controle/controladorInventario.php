<?php
class ControladorInventario{

    // construtor
    public function __construct(){}

    // destruidor
    public function __destruct(){}

    public function incluirInventario($post)
    {
        try {
            $inventario = new Inventario();
            $inventario->setDescricao($post['descricao']);
            $inventario->setQuantidade($post['quantidade']);
            $inventario->setHeroiId($post['heroi_id']);
            $inventario->setTipo($post['tipo']);
            $moduloInventario = new DaoInventario();
            $retorno = $moduloInventario->incluirInventario($inventario);
            $moduloInventario->__destruct();
            return $retorno;
        } catch (Exception $e) {}
    }

    public function alterarInventario($post)
    {
        try {
            $inventario = new Inventario();
            $inventario->setId($post['id']);
            $inventario->setDescricao($post['descricao']);
            $inventario->setQuantidade($post['quantidade']);
            $moduloInventario = new DaoInventario();
            $moduloInventario->alterarInventario($inventario);            
            $moduloInventario->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function excluirInventario($post)
    {
        try {
            $id = $post['id'];
            $moduloInventario = new DaoInventario();
            $moduloInventario->excluirInventario($id);
            $moduloInventario->__destruct();            
        } catch (Exception $e) {
            return $e;
        }
    }

}
?>
			