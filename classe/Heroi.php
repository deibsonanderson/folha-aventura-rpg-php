
						<?php

    class Heroi
    {

        private $id;

        private $status;

        private $nome;

        private $habilidade;

        private $habilidade_inicial;

        private $energia;

        private $energia_inicial;

        private $sorte;

        private $sorte_inicial;

        private $aventura;
        
        private $userId;
        
        private $honra;
        
        private $honra_inicial;
        
        private $poder_fogo;
        
        private $poder_fogo_inicial;
        
        private $blindagem;
        
        private $blindagem_inicial;

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

        public function getAventura()
        {
            return $this->aventura;
        }

        public function setAventura($valor)
        {
            $this->aventura = $valor;
        }

        public function getHabilidade()
        {
            return $this->habilidade;
        }

        public function setHabilidade($valor)
        {
            $this->habilidade = $valor;
        }

        public function getHabilidade_inicial()
        {
            return $this->habilidade_inicial;
        }

        public function setHabilidade_inicial($valor)
        {
            $this->habilidade_inicial = $valor;
        }

        public function getEnergia()
        {
            return $this->energia;
        }

        public function setEnergia($valor)
        {
            $this->energia = $valor;
        }

        public function getEnergia_inicial()
        {
            return $this->energia_inicial;
        }

        public function setEnergia_inicial($valor)
        {
            $this->energia_inicial = $valor;
        }

        public function getSorte()
        {
            return $this->sorte;
        }

        public function setSorte($valor)
        {
            $this->sorte = $valor;
        }

        public function getSorte_inicial()
        {
            return $this->sorte_inicial;
        }

        public function setSorte_inicial($valor)
        {
            $this->sorte_inicial = $valor;
        }
        
        public function getUserId()
        {
            return $this->userId;
        }
        
        public function setUserId($valor)
        {
            $this->userId = $valor;
        }
        
        public function getHonra()
        {
            return $this->honra;
        }
        
        public function getHonra_inicial()
        {
            return $this->honra_inicial;
        }
        
        public function setHonra($honra)
        {
            $this->honra = $honra;
        }
        
        public function setHonra_inicial($honra_inicial)
        {
            $this->honra_inicial = $honra_inicial;
        }
        
        public function getPoder_fogo()
        {
            return $this->poder_fogo;
        }
        
        public function getPoder_fogo_inicial()
        {
            return $this->poder_fogo_inicial;
        }
        
        public function getBlindagem()
        {
            return $this->blindagem;
        }
        
        public function getBlindagem_inicial()
        {
            return $this->blindagem_inicial;
        }
        
        public function setPoder_fogo($poder_fogo)
        {
            $this->poder_fogo = $poder_fogo;
        }
        
        public function setPoder_fogo_inicial($poder_fogo_inicial)
        {
            $this->poder_fogo_inicial = $poder_fogo_inicial;
        }
        
        public function setBlindagem($blindagem)
        {
            $this->blindagem = $blindagem;
        }
        
        public function setBlindagem_inicial($blindagem_inicial)
        {
            $this->blindagem_inicial = $blindagem_inicial;
        }   
        
        
    }
    ?>