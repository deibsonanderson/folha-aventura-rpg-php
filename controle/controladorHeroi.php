<?php

class ControladorHeroi
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

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
    
    public function alterarHeroiSorte($post)
    {
        $heroi = new Heroi();
        $heroi->setSorte($post['valor']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiSorte($heroi);
        $modulo->__destruct();
    }
}
?>
			