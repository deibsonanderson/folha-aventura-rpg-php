<?php
class ControladorRota
{

    // construtor
    public function __construct()
    {}

    // destruidor
    public function __destruct()
    {}

    public function incluirRota($post)
    {
        try {
            $rota = new Rota();
            $rota->setRota($post['rota']);
            $rota->setHeroiId($post['heroi_id']);
            $moduloRota = new DaoRota();
            if($post['rota'] != '0' || $post['rota'] != null || $post['rota'] != ''){
                $retorno = $moduloRota->incluirRota($rota);
            }
            $moduloRota->__destruct();
            return $retorno;
        } catch (Exception $e) {}
    }

    public function excluirRota($post)
    {
        try {
            $id = $post['id'];
            $moduloRota = new DaoRota();
            $moduloRota->excluirRota($id);
            $moduloRota->__destruct();
            return $this->telaListaRota($post);
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public function listarRota($heroiId){
        try {
            sleep(0.5);
            $moduloRota = new DaoRota();
            return $moduloRota->listarRota($heroiId);
            $moduloRota->__destruct();
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public function telaListaRota($post) {
        $html = '';
        try {
            $rotas = $this->listarRota($post['heroi_id']);
            if ($rotas != null && count($rotas) > 0 ) {
                foreach ($rotas as $key => $rota) {
                    if($key % 2 == 0){
                        $justify = 'justify-content-end';
                        $full = 'full';
                        $cornerCima = 'top-right';
                        $cornerBaixo = 'left-bottom';
                    }else{
                        $justify = '';
                        $full = 'bottom';
                        $cornerCima = 'right-bottom';
                        $cornerBaixo = 'top-left';
                    }
                    
                    if($key > 0){
                        $html .= '<div class="row timeline rota-'.$rota->getId().'">';
                            $html .= '<div class="col-2 rota-'.$rota->getId().'">';
                                $html .= '<div class="corner '.$cornerCima.'"></div>';
                            $html .= '</div>';
                            $html .= '<div class="col-8 rota-'.$rota->getId().'">';
                                $html .= '<hr />';
                            $html .= '</div>';
                            $html .= '<div class="col-2 rota-'.$rota->getId().'">';
                                $html .= '<div class="corner '.$cornerBaixo.'"></div>';
                            $html .= '</div>';
                        $html .= '</div>';
                        
                    }                
                        $html .= '<div class="row align-items-center how-it-works d-flex '.$justify.' rota-'.$rota->getId().'">';
                			$html .= '<div class="col-2 text-center '.$full.' d-inline-flex justify-content-center align-items-center rota-'.$rota->getId().'">';
                				$html .= '<div onclick="fcnCarregarModalRota('.$rota->getId().','.$rota->getHeroiId().');" class="circle font-weight-bold rota-'.$rota->getId().'">'.$rota->getRota().'</div>';
                			$html .= '</div>';
                		$html .= '</div>';   		
                }
    		}
        } catch (Exception $e) {
            return $e;
        }
        return $html;
    }

}
?>
			