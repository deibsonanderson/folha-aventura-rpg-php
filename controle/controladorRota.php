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
                        ?>
                        <div class="row timeline rota-<?php echo $rota->getId(); ?>">
                        	<div class="col-2 rota-<?php echo $rota->getId(); ?>">
                        		<div class="corner <?php echo $cornerCima; ?>"></div>
                        	</div>
                        	<div class="col-8 rota-<?php echo $rota->getId(); ?>">
                        		<hr />
                        	</div>
                        	<div class="col-2 rota-<?php echo $rota->getId(); ?>">
                        		<div class="corner <?php echo $cornerBaixo; ?>"></div>
                        	</div>
                        </div>			
    <?php           } ?>
    		<div class="row align-items-center how-it-works d-flex <?php echo $justify; ?> rota-<?php echo $rota->getId(); ?>">
    			<div class="col-2 text-center <?php echo $full; ?> d-inline-flex justify-content-center align-items-center rota-<?php echo $rota->getId(); ?>">
    				<div onclick="fcnCarregarModalRota(<?php echo $rota->getId(); ?>,<?php echo $rota->getHeroiId(); ?> );" class="circle font-weight-bold rota-<?php echo $rota->getId(); ?>"><?php echo $rota->getRota(); ?></div>
    			</div>
    		</div>   		
    		<?php    		      
                }
    		}
        } catch (Exception $e) {
            return $e;
        }
    }

}
?>
			