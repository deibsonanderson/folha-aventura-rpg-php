<?php

class Rota{

    private $id;

    private $rota;

    private $heroiId;

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
}
?>