<?php
$sql = "SELECT id,
		descricao,
		quantidade,
		tipo,
     	status
		FROM tb_aventura_inventario
WHERE heroi_id = " . $heroi->heroi_id. " ORDER BY id DESC ";
$query = mysqli_query($conexao, $sql) or die('erro listar inventario');
while ($objItem = mysqli_fetch_object($query)) {
    $inventarios[] = $objItem;
}

function carregarIventario($inventarios, $tipo, $heroi_id){
    if ($inventarios != null && count($inventarios) > 0 ) {
        foreach ($inventarios as $inventario) {
            if($inventario->tipo == $tipo){ ?>
			<li class="list-group-item d-flex justify-content-between align-items-center  bg-dark text-white border border-light"
				onclick="fcnCarregarModalInvent(this);"
				descricao="<?php echo $inventario->descricao; ?>"
				quantidade="<?php echo $inventario->quantidade; ?>"
				inventario-id="<?php echo $inventario->id; ?>"
				heroi_id="<?php echo $heroi_id; ?>"
				id="inventario-<?php echo $inventario->id; ?>">
				<span id="inventario-span-desc-<?php echo $inventario->id; ?>" ><?php echo $inventario->descricao; ?></span>
				<span id="inventario-span-quant-<?php echo $inventario->id; ?>" 
				class="badge badge-secondary badge-pill" style="color: #fff;background-color: #6c757d !important;"><?php echo $inventario->quantidade; ?></span>
			</li>
	<?php   } 
        }
	}    
}
?>
<div class="tab-pane fade" id="inventory" role="tabpanel"
	aria-labelledby="inventory-tab">
	<div class="card bg-dark text-white">
		<div class="card-body">
			<h5 class="card-title">
				
			</h5>
			<div class="row">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab"
						role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-ouro-tab" data-toggle="pill" href="#v-pills-ouro" role="tab" aria-controls="v-pills-ouro"     aria-selected="true" >
							<img alt="" src="image/Icons8_78.png" style="width: 30px;">
						</a> 
						<a class="nav-link" id="v-pills-provisao-tab" data-toggle="pill"	href="#v-pills-provisao"  role="tab" aria-controls="v-pills-provisao"  aria-selected="false">
							<img alt="" src="image/Icon.4_50.png" style="width: 30px;">
						</a> 
						<a class="nav-link" id="v-pills-equipamento-tab" data-toggle="pill" href="#v-pills-equipamento" role="tab" aria-controls="v-pills-equipamento" aria-selected="false">
							<img alt="" src="image/Icon.6_94.png" style="width: 30px;">
						</a> 
						<a class="nav-link" id="v-pills-bonus-penalidade-tab" data-toggle="pill" href="#v-pills-bonus-penalidade" role="tab" aria-controls="v-pills-bonus-penalidade" aria-selected="false">
							<img alt="" src="image/Icon.2_54.png" style="width: 30px;">
						</a> 
						<a class="nav-link" id="v-pills-pista-tab" data-toggle="pill" href="#v-pills-pista" role="tab" aria-controls="v-pills-pista"        aria-selected="false">
							<img alt="" src="image/Icon.5_85.png" style="width: 30px;">
						</a>
						<a class="nav-link" id="v-pills-magias-tab" data-toggle="pill" href="#v-pills-magias" role="tab" aria-controls="v-pills-magias" aria-selected="false">
							<img alt="" src="image/Icon.6_79.png" style="width: 30px;">
						</a>
						<a class="nav-link" id="v-pills-pericias-tab" data-toggle="pill" href="#v-pills-pericias" role="tab" aria-controls="v-pills-pericias" aria-selected="false">
							<img alt="" src="image/Icon.4_80.png" style="width: 30px;">
						</a>													
					</div>
				</div>
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-ouro"
							role="tabpanel" aria-labelledby="v-pills-ouro-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(1,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Ouro & Tesouros</i>
							<ul id="list-group-ouro" class="list-group">
								<?php echo carregarIventario($inventarios, 1,$heroi->heroi_id); ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="v-pills-provisao" role="tabpanel"
							aria-labelledby="v-pills-provisao-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(2,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Provisões & Poções</i>
							<ul id="list-group-provicao" class="list-group">
								<?php echo carregarIventario($inventarios, 2,$heroi->heroi_id); ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="v-pills-equipamento" role="tabpanel"
							aria-labelledby="v-pills-equipamento-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(3,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Equipamentos & Afins</i>
							<ul id="list-group-equipamento" class="list-group">
								<?php echo carregarIventario($inventarios, 3,$heroi->heroi_id); ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="v-pills-bonus-penalidade" role="tabpanel"
							aria-labelledby="v-pills-bonus-penalidade-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(4,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Bonus & Punições</i>
							<ul id="list-group-bonus" class="list-group">
								<?php echo carregarIventario($inventarios, 4,$heroi->heroi_id); ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="v-pills-pista" role="tabpanel"
							aria-labelledby="v-pills-pista-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(5,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Pistas & Anotações</i>
							<ul id="list-group-pista" class="list-group">
								<?php echo carregarIventario($inventarios, 5,$heroi->heroi_id); ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="v-pills-magias" role="tabpanel"
							aria-labelledby="v-pills-magias-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(6,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Magias & Feitiços</i>
							<ul id="list-group-magias" class="list-group">
								<?php echo carregarIventario($inventarios, 6, $heroi->heroi_id); ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="v-pills-pericias" role="tabpanel"
							aria-labelledby="v-pills-pericias-tab">
							<a href="#" style="margin-bottom: 10px;" class="btn btn-secondary" onclick="fcnCarregarModalIncluirInvent(7,<?php echo $heroi->heroi_id; ?>)">+</a>&nbsp;&nbsp;<i>Pericias & Modificações</i>
							<ul id="list-group-pericias" class="list-group">
								<?php echo carregarIventario($inventarios, 7, $heroi->heroi_id); ?>
							</ul>
						</div>													
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
.nav-link.active {
    color: #fff;
    background-color: #6c757d !important;
}
</style>