<?php

class ControladorHeroi
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}
    
    public function incluirHeroi($post){
        try {
            $heroi = new Heroi();
            
            $heroi->setNome($post['nome']);
            $heroi->setAventura($post['aventura']);
            $heroi->setHabilidade($post['habilidade']);
            $heroi->setEnergia($post['energia']);
            $heroi->setSorte($post['sorte']);
            $moduloHeroi = new DaoHeroi();
            $moduloHeroi->incluirHeroi($heroi);            
            $moduloHeroi->__destruct();
        } catch (Exception $e) {
        }
    }	

    public function alterarHeroiHabilidade($post)
    {
        $heroi = new Heroi();
        $heroi->setHabilidade($post['valor']);
        $heroi->setId($post['heroi_id']);

        $modulo = new DaoHeroi();
        $modulo->alterarHeroiHabilidade($heroi);
        $modulo->__destruct();
    }
    
    public function alterarHeroiEnergia($post)
    {
        $heroi = new Heroi();
        $heroi->setEnergia($post['valor']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiEnergia($heroi);
        $modulo->__destruct();
    }
    
    public function alterarHeroiEnergiaSorte($post)
    {
        $heroi = new Heroi();
        $heroi->setSorte($post['sorte']);
        $heroi->setEnergia($post['energia']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiEnergiaSorte($heroi);
        $modulo->__destruct();
    }
    
    public function alterarHeroiSorte($post)
    {
        $heroi = new Heroi();
        $heroi->setSorte($post['valor']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiSorte($heroi);
        $modulo->__destruct();
    }
    
    public function excluirHeroi($post)
    {
        try {
            $id = $post['id'];
            $modulo = new DaoHeroi();
            $modulo->excluirRota($id);
            $modulo->__destruct();
            return $this->telaListaRota($post);
        } catch (Exception $e) {
            return $e;
        }
    }
}
?>
			