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
            $heroi->setPoder_fogo($post['poder_fogo']);
            $heroi->setBlindagem($post['blindagem']);            
            $heroi->setHonra(3);
            $heroi->setHonra_inicial(99);
            $heroi->setUserId($post['user_id']);
            $moduloHeroi = new DaoHeroi();
            $id = $moduloHeroi->incluirHeroi($heroi);
            $moduloHeroi->__destruct();
            
            $moduloRota = new DaoRota();            
            $rota = new Rota();
            $rota->setRota(1);
            $rota->setHeroiId($id);                        
            $moduloRota->incluirRota($rota);
            $moduloRota->__destruct();
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
    
    public function alterarHeroiHonra($post)
    {
        $heroi = new Heroi();
        $heroi->setHonra($post['valor']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiHonra($heroi);
        $modulo->__destruct();
    }
    
    public function alterarHeroiPoderFogo($post)
    {
        $heroi = new Heroi();
        $heroi->setPoder_fogo($post['valor']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiPoderFogo($heroi);
        $modulo->__destruct();
    }
    
    public function alterarHeroiBlindagem($post)
    {
        $heroi = new Heroi();
        $heroi->setBlindagem($post['valor']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiBlindagem($heroi);
        $modulo->__destruct();
    }
    
    public function alterarHeroiBlindagemSorte($post)
    {
        $heroi = new Heroi();
        $heroi->setSorte($post['sorte']);
        $heroi->setBlindagem($post['energia']);
        $heroi->setId($post['heroi_id']);
        
        $modulo = new DaoHeroi();
        $modulo->alterarHeroiBlindagemSorte($heroi);
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
			