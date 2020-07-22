<?php

class ControladorCriatura
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

    public function incluirCriatura($post)
    {
        try {
            $criatura = new Criatura();
            $criatura->setNome($post['nome']);
            $criatura->setHabilidade($post['habilidade']);
            $criatura->setEnergia($post['energia']);
            $criatura->setHeroiId($post['heroi_id']);
            $moduloCriatura = new DaoCriatura();
            $retorno = $moduloCriatura->incluirCriatura($criatura);            
            $moduloCriatura->__destruct();
            return $retorno;
        } catch (Exception $e) {}
    }

    public function alterarCriatura($post)
    {
        try {
            $criatura = new Criatura();
            $criatura->setId($post['id']);
            $criatura->setHeroiId($post['heroi_id']);
            $criatura->setNome($post['nome']);
            $criatura->setHabilidade($post['habilidade']);
            $criatura->setEnergia($post['energia']);
            $moduloCriatura = new DaoCriatura();
            $moduloCriatura->alterarCriatura($criatura);
            $moduloCriatura->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }

    
    public function alterarEnergiaCriatura($post)
    {
        try {
            $criatura = new Criatura();
            $criatura->setId($post['id']);
            $criatura->setEnergia($post['energia']);
            $moduloCriatura = new DaoCriatura();
            $moduloCriatura->alterarEnergiaCriatura($criatura);
            $moduloCriatura->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }
    
    
    public function excluirCriatura($post)
    {
        try {
            $id = $post['id'];
            $moduloCriatura = new DaoCriatura();
            $moduloCriatura->excluirCriatura($id);
            $moduloCriatura->__destruct();
            return $this->telaListarCriatura();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function telaCadastrarCriatura($post = null)
    {
        try {
            $viewCriatura = new ViewCriatura();
            return $viewCriatura->telaCadastrarCriatura($post);
            $viewCriatura->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function telaListarCriatura($post = null)
    {
        try {
            $viewCriatura = new ViewCriatura();
            return $viewCriatura->telaListarCriatura($this->listarCriatura(null));
            $viewCriatura->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function telaAlterarCriatura($post = null)
    {
        try {
            $viewCriatura = new ViewCriatura();
            return $viewCriatura->telaAlterarCriatura($this->listarCriatura($post['id']));
            $viewCriatura->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function telaVisualizarCriatura($post = null)
    {
        try {
            $viewCriatura = new ViewCriatura();
            return $viewCriatura->telaVisualizarCriatura($this->listarCriatura($post['id']));
            $viewCriatura->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }
}
?>
			