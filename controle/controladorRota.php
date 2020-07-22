<?php
class ControladorRota
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

    public function incluirRota($post)
    {
        try {
            $rota = new Rota();
            $rota->setRota($post['rota']);
            $rota->setHeroiId($post['heroi_id']);
            $moduloRota = new DaoRota();
            $moduloRota->incluirRota($rota);
            $moduloRota->__destruct();
        } catch (Exception $e) {}
    }

    public function excluirRota($post)
    {
        try {
            $id = $post['id'];
            $moduloRota = new DaoRota();
            $moduloRota->excluirRota($id);
            $moduloRota->__destruct();
            return $this->telaListarRota();
        } catch (Exception $e) {
            return $e;
        }
    }

}
?>
			