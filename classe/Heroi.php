
						<?php

							class Heroi{

								private $id;
								private $status;
              
								private $nome; 
								private $habilidade;
								
								private $habilidade_inicial;
								
								private $energia;
								
								private $energia_inicial;
								
								private $sorte;
								
								private $sorte_inicial;
								
								private $raca; 
			
								//construtor
								public function __construct(){}

								//destruidor
								public function __destruct(){}

								//Get And Sets
								public function getId(){
									return $this->id;
								}

								public function setId($id){                                
									$this->id = $id;
								}
								
								public function getStatus(){
									return $this->status;
								}

								public function setStatus($valor){
									$this->status = $valor;
								} 
								
								
								public function getNome(){
									return $this->nome;
								}

								public function setNome($valor){
									$this->nome = $valor;
								} 
								
			
								public function getRaca(){
									return $this->raca;
								}

								public function setRaca($valor){
									$this->raca = $valor;
								}
								
								public function getHabilidade(){
								    return $this->habilidade;
								}
								
								public function setHabilidade($valor){
								    $this->habilidade = $valor;
								}
								
								
								public function getHabilidade_inicial(){
								    return $this->habilidade_inicial;
								}
								
								public function setHabilidade_inicial($valor){
								    $this->habilidade_inicial = $valor;
								}
								
								
								public function getEnergia(){
								    return $this->energia;
								}
								
								public function setEnergia($valor){
								    $this->energia = $valor;
								}
								
								
								public function getEnergia_inicial(){
								    return $this->energia_inicial;
								}
								
								public function setEnergia_inicial($valor){
								    $this->energia_inicial = $valor;
								}
								
								
								public function getSorte(){
								    return $this->sorte;
								}
								
								public function setSorte($valor){
								    $this->sorte = $valor;
								}
								
								
								public function getSorte_inicial(){
								    return $this->sorte_inicial;
								}
								
								public function setSorte_inicial($valor){
								    $this->sorte_inicial = $valor;
								} 
								
					}
						?>