<?php

class Rota{

    private $id;

    private $rota;

    private $heroiId;
    
    private $rotaId;
    
    private $filhos;
    
    private $contexto;

    /**
     * @return mixed
     */
    public function getContexto()
    {
        return $this->contexto;
    }

    /**
     * @param mixed $contexto
     */
    public function setContexto($contexto)
    {
        $this->contexto = $contexto;
    }

    /**
     * @return mixed
     */
    public function getFilhos()
    {
        return $this->filhos;
    }

    /**
     * @param mixed $filhos
     */
    public function setFilhos($filhos)
    {
        $this->filhos = $filhos;
    }

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

    // Get And Sets
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRota()
    {
        return $this->rota;
    }

    public function setRota($valor)
    {
        $this->rota = $valor;
    }

    public function getHeroiId()
    {
        return $this->heroiId;
    }

    public function setHeroiId($valor)
    {
        $this->heroiId = $valor;
    }
    
    public function setRotaId($valor)
    {
        $this->rotaId = $valor;
    }
    
    public function getRotaId()
    {
        return $this->rotaId;
    }
    
    
    
}
?>