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
            $rota->setRotaId($post['rota_id']);
            $rota->setContexto($post['contexto']);
            $moduloRota = new DaoRota();
            if($post['rota'] != '0' || $post['rota'] != null || $post['rota'] != ''){
                $moduloRota->incluirRota($rota);
            }
            $moduloRota->__destruct();
            return $this->telaListaRotaTreeView($post);
        } catch (Exception $e) {}
    }

    public function excluirRota($post)
    {
        try {
            $id = $post['id'];
            $moduloRota = new DaoRota();
            $moduloRota->excluirRota($id);
            $moduloRota->__destruct();
            //return $this->telaListaRota($post);
            return $this->telaListaRotaTreeView($post);
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
    
    public function telaListaRotaTreeView($post) {
        $rotas = $this->listarRota($post['heroi_id']);
        foreach ($rotas as $rota) {
            $filhos = null;
            foreach($rotas as $rota2){
                if($rota2->getRotaId() == $rota->getId()){
                    $filhos[] = $rota2;
                }
            }
            $rota->setFilhos($filhos);
        }
        
        $html = '';
        $html .= '<ul class="tree"><li id="'.$rotas[0]->getId().'">';
        $html .= '<code onclick="fncIncluirRotaHeroiTreeViewPai('.$rotas[0]->getId().', '.$rotas[0]->getRota().',0)" class="text-white">'.$rotas[0]->getRota().'</code>';
        $html .= $this->montarTreview($rotas[0]->getFilhos());
        $html .= '</li></ul>';
        
        return $html;
    }
    
    public function montarTreview($rotas){
        $html = '';
        $html .=  '<ul>';
        if ($rotas != null && count($rotas) > 0) {
             foreach ($rotas as $rota) {
                 $isExluir = ($rota->getFilhos() == null || count($rota->getFilhos()) <= 0)?'1':'0';
                 $html .=  '<li><code onclick="fncIncluirRotaHeroiTreeViewPai('.$rota->getId().', '.$rota->getRota().','.$isExluir.')" class="text-white" style="font-size:100%">'.$rota->getRota().'</code>';
                 if($rota->getFilhos() != null){
                     $html .=  $this->montarTreview($rota->getFilhos());
                }
                 $html .=  '</li>';
            }
        }
        $html .=  '</ul>';
        return $html;
    }
    
    public function telaListaRota($post) {
        $html = '';
        try {
            $rotas = $this->listarRota($post['heroi_id']);
            $html .= '<input type="hidden" id="quantidade-rotas" value="'.count($rotas).'">';
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
			