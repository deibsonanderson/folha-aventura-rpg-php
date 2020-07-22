<?php
    class Criatura
    {

        private $id;

        private $status;

        private $nome;

        private $habilidade;

        private $heroiId;

        private $energia;

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

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($valor)
        {
            $this->nome = $valor;
        }

        public function getHabilidade()
        {
            return $this->habilidade;
        }

        public function setHabilidade($valor)
        {
            $this->habilidade = $valor;
        }

        public function getEnergia()
        {
            return $this->energia;
        }

        public function setEnergia($valor)
        {
            $this->energia = $valor;
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