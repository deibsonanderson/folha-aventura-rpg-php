<?php

    class Inventario
    {

        private $id;

        private $status;

        private $descricao;
        
        private $tipo;

        private $quantidade;

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

        public function getStatus()
        {
            return $this->status;
        }

        public function setStatus($valor)
        {
            $this->status = $valor;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

        public function setDescricao($valor)
        {
            $this->descricao = $valor;
        }

        public function getQuantidade()
        {
            return $this->quantidade;
        }

        public function setQuantidade($valor)
        {
            $this->quantidade = $valor;
        }

        public function getHeroiId()
        {
            return $this->heroiId;
        }

        public function setHeroiId($valor)
        {
            $this->heroiId = $valor;
        }
        
        public function getTipo()
        {
            return $this->tipo;
        }
        
        public function setTipo($valor)
        {
            $this->tipo = $valor;
        }
        
    }
    ?>