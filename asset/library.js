function vibracao(time){
	navigator.vibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate;
    if (!navigator.vibrate) {
        $('#supported').hide();
        return;
    }

    $('#unsupported').hide();
    navigator.vibrate(time);
  
//    // Stop all vibrations
//    $('#stop').click(function () {
//        navigator.vibrate(0);
//    });
}

function rolarDado(){
	$('#imagem-dado').attr('src','image/dado-animado.gif');
	diceSound = document.getElementById("myAudio"); 
	qtdDados = parseInt($('#input-dados').val());
	if(qtdDados > 0){
		diceSound.play();
		//vibracao(500);
		setTimeout(function(){ 
				
				$('#dado-result').html('');
				total = 0;
				for(i=1; i<=qtdDados;i++){
					numero = Math.floor((Math.random() * 6)+1);
					if(qtdDados > 1){
						$('#dado-result').append('<span>Dado Nº'+i+' valor = <b>'+numero+'</b></span><br/>');
					}	
					total += numero;		
				}
				$('#dado-result-total').html('Resultado total: <b>'+total+'</b>');
				$('#imagem-dado').attr('src','image/dado-static.png');
		}, 1500);
	}else{
		$('#dado-result-total').html('Resultado total: inválido!');
	}
}

//HEROI INICIO
function fncAlterarHeroi(element, campo, propriedade){
    controlador = $(element).attr('controlador');
    funcao = $(element).attr('funcao');
    retorno = $(element).attr('retorno');
    heroi_id = $(element).attr('heroi_id');    
    valor = parseInt($('#'+campo).val());
    
    if(propriedade == 0){
    	valor = valor-1;
    }else if(propriedade == 1){
    	valor = valor+1;
    }  
    
    if(valor < 0){
    	valor = 0;
    }
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'retorno=' + retorno + '&controlador=' + controlador + '&funcao=' + funcao + '&valor=' + valor + '&heroi_id='+heroi_id,
        success: function(result) {
        	$('#'+campo).val(valor);
        	//$('#' + retorno).html(result);
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

function fncIncluirRotaHeroi(element, campo){
    controlador = $(element).attr('controlador');
    funcao = $(element).attr('funcao');
    retorno = $(element).attr('retorno');
    heroi_id = $(element).attr('heroi_id');    
    rota = parseInt($('#'+campo).val());
 	$.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'retorno=' + retorno + '&controlador=' + controlador + '&funcao=' + funcao + '&rota=' + rota + '&heroi_id='+heroi_id,
        success: function(result) {
        	fcnAddTimeLineRota(rota, parseInt(result), heroi_id);
        	$('#'+campo).val('');        	
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

//HEROI FIM
//ROTA INICIO
function fcnAddTimeLineRota(rota, id, heroi_id){
	position = $('#position-rota').val();
	if(position == 0){
		$('#position-rota').val(1);
		html = '<div class="row align-items-center justify-content-end how-it-works d-flex"><div class="col-2 text-center full d-inline-flex justify-content-center align-items-center"><div onclick="fcnCarregarModalRota('+id+','+heroi_id+');" class="circle font-weight-bold">'+rota+'</div></div></div><div class="row timeline"><div class="col-2"><div class="corner right-bottom"></div></div><div class="col-8"><hr /></div><div class="col-2"><div class="corner top-left"></div></div></div>';
	}else{
		$('#position-rota').val(0);
		html = '<div class="row align-items-center how-it-works d-flex"><div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center"><div onclick="fcnCarregarModalRota('+id+','+heroi_id+');"  class="circle font-weight-bold">'+rota+'</div></div></div><div class="row timeline"><div class="col-2"><div class="corner top-right"></div></div><div class="col-8"><hr /></div><div class="col-2"><div class="corner left-bottom"></div></div></div>';

	}
	$('#div-rota-card-body').prepend(html);
}

function fcnCarregarModalRota(id,heroiId) {
	$('#modal-rota-id').val(id);
	$('#modal-rota-heroi_id').val(heroiId);
	$('#modal-manter-rota').modal('show');
}

function fcnDeletarModalRota(){
	id = $('#modal-rota-id').val();	
	heroiId = $('#modal-rota-heroi_id').val();	 	
	$('#modal-manter-rota').modal('hide');
	
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorRota&funcao=excluirRota&heroi_id='+heroiId+'&id='+id,
        success: function(result) {
        	$('#div-rota-card-body').html(result);
    	},
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}


//ROTA FIM
//INVENTARIO INICIO
function fcnCarregarModalInvent(element) {
	$('#modal-invent-id').val($(element).attr('inventario-id'));
	$('#modal-invent-descricao').val($(element).attr('descricao'));
	$('#modal-invent-quantidade').val($(element).attr('quantidade'));
	$('#modal-invent-tipo').val($(element).attr('tipo'));
	$('#modal-manter-invent').modal('show');
}

function fcnCarregarModalIncluirInvent(tipo,heroi_id){
	$('#modal-invent-descricao').val('');
	$('#modal-invent-quantidade').val(0);
	$('#modal-invent-tipo').val(tipo);
	$('#modal-invent-heroi_id').val(heroi_id);
	$('#modal-manter-invent').modal('show');
}

function fncAlterarNumber(campo, propriedade){
	valor = parseInt($('#'+campo).val());
    if(propriedade == 0){
    	valor = valor-1;
    }else if(propriedade == 1){
    	valor = valor+1;
    }  
    
    if(valor < 0){
    	valor = 0;
    }
   	$('#'+campo).val(valor);
}

function fcnAtualizarModalInvent() {
	id = $('#modal-invent-id').val();
	descricao = $('#modal-invent-descricao').val();
	quantidade = $('#modal-invent-quantidade').val();
	tipo = $('#modal-invent-tipo').val();
	heroi_id = $('#modal-invent-heroi_id').val();
	$('#modal-manter-invent').modal('hide');
	
	if(id == null || id == undefined || id == ""){
		funcao = 'incluirInventario';
	}else{
		funcao = 'alterarInventario';
	}
	
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorInventario&funcao='+funcao+'&tipo=' + tipo + '&id='+id+ '&descricao=' + descricao + '&quantidade='+quantidade+' &heroi_id='+heroi_id,
        success: function(result) {
        	 if(funcao == 'incluirInventario'){
        		 addInventario(parseInt(result), descricao, quantidade, heroi_id, tipo );
        	 }else{
            	 $('#inventario-'+id).attr('descricao',descricao);
        		 $('#inventario-'+id).attr('quantidade',quantidade);
        		 $('#inventario-span-desc-'+id).html(descricao);
        		 $('#inventario-span-quant-'+id).html(quantidade);
        	 }
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

function addInventario(id, descricao, quantidade, heroi_id, tipo){
	 $html = '';
	 $html += '<li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border border-light"';
		 $html += 'onclick="fcnCarregarModalInvent(this);"';
			 $html += 'descricao="'+descricao+'"';
			 $html += 'quantidade="'+quantidade+'"';
		 $html += 'inventario-id="'+id+'"';
		 $html += 'heroi_id="'+heroi_id+'"';
		 $html += 'id="inventario-'+id+'">';
    		 $html += '<span id="inventario-span-desc-'+id+'" >'+descricao+'</span>';
    		 $html += '<span id="inventario-span-quant-'+id+'" class="badge badge-primary badge-pill">'+quantidade+'</span>';
	 $html += '</li>';
	 
	 switch (tipo) {
		case '1':
			$('#list-group-ouro').prepend($html);		
			break;
		case '2':
			$('#list-group-provicao').prepend($html);
			break;
		case '3':
			$('#list-group-equipamento').prepend($html);
			break;
		case '4':
			$('#list-group-bonus').prepend($html);
			break;
		case '5':
			$('#list-group-pista').prepend($html);
			break;
	}	 

}

function fcnDeletarModalInvent(id) {
	if(id == null || id == undefined || id == ''){
		id = $('#modal-invent-id').val();	
	}
	$('#modal-manter-invent').modal('hide');
	
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorInventario&funcao=excluirInventario&id='+id,
        success: function(result) {        	 
        	 $('#inventario-'+id).fadeOut( "slow", function() {
        		 $('#inventario-'+id).remove();
        	 });
    	},
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}
//INVENTARIO FIM

//CRIATURA INICIO
function fcnCarregarModalIncluirCriatura(heroi_id){
	$('#modal-criatura-nome').val('');
	$('#modal-criatura-habilidade').val(0);
	$('#modal-criatura-energia').val(0);
	$('#modal-criatura-heroi_id').val(heroi_id);
	$('#modal-manter-criatura').modal('show');
}

function fcnIniciarBatalhaModalCriatura(){
	nome = $('#modal-criatura-nome').val();
	habilidade = $('#modal-criatura-habilidade').val();
	energia = $('#modal-criatura-energia').val();
	heroi_id = $('#modal-criatura-heroi_id').val();
	$('#modal-manter-criatura').modal('hide');
	$('#criatura-luta-resultado').html('');
	$('#heroi-luta-resultado').html('');
	$('#status-batalha').val(0);
	$('#criatura-luta-nome').html(nome);
	$('#criatura-luta-energia').html(energia);
	$('#criatura-luta-habilidade').html(habilidade);
	decorarSorte(3);
}

function fcnBatalhar(heroiId){
	energiaHeroi = parseInt($('#heroi-luta-energia').html());
	energiaCriatura = parseInt($('#criatura-luta-energia').html());
	
	habilidadeHeroi = parseInt($('#heroi-luta-habilidade').html());
	habilidadeCriatura = parseInt($('#criatura-luta-habilidade').html());
	
	valorCriatura = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1) + habilidadeCriatura;
	valorHeroi = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1) + habilidadeHeroi;

	$('#criatura-luta-resultado').html(valorCriatura);
	$('#heroi-luta-resultado').html(valorHeroi);
	
	if(valorCriatura > valorHeroi){
		energiaHeroi = energiaHeroi-2;
		
		decorarSorte(2);
		
		$('#status-energia').val(energiaHeroi);
		$('#heroi-luta-energia').html(energiaHeroi);
		$('#status-batalha').val(2);
		$.ajax({
	        url: 'controlador.php',
	        type: 'POST',
	        data: 'controlador=ControladorHeroi&funcao=alterarHeroiEnergia&valor=' + energiaHeroi + '&heroi_id='+heroiId,
	        success: function(result) {},
	        beforeSend: function() {},
	        complete: function() {},
	        error: function (request, status, error) {}
	    });

		
	}else if(valorCriatura < valorHeroi){
		energiaCriatura = energiaCriatura-2;
		
		decorarSorte(1);
		$('#criatura-luta-energia').html(energiaCriatura);
		$('#status-batalha').val(1);
	}else if(valorCriatura == valorHeroi){
		decorarSorte(3);
	}
	
}

function decorarSorte(key){
	$('#heroi-luta-energia').removeClass('text-success');
	$('#criatura-luta-energia').removeClass('text-success');
	$('#criatura-luta-energia').removeClass('text-danger');
    $('#heroi-luta-energia').removeClass('text-danger');

	switch (key) {
		case 1:
			$('#criatura-luta-energia').addClass('text-danger');
			$('#heroi-luta-energia').addClass('text-success');
			break;
		case 2:
			$('#heroi-luta-energia').addClass('text-danger');
			$('#criatura-luta-energia').addClass('text-success');
			break;			
		default:
		break;
	}

}

function fcnTestarSorte(heroiId){
	energiaHeroi = parseInt($('#heroi-luta-energia').html());
	energiaCriatura = parseInt($('#criatura-luta-energia').html());
	sorteHeroi = parseInt($('#heroi-luta-sorte').html());
	statusBatalha = $('#status-batalha').val();
	valorHeroi = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1);

	$('#criatura-luta-resultado').html('');
	$('#heroi-luta-resultado').html(valorHeroi);
	
	if(statusBatalha == 1){ //Bateu
		if(valorHeroi <= sorteHeroi){ //BOM
			decorarSorte(1);
			energiaCriatura = energiaCriatura-1;		
			$('#criatura-luta-energia').html(energiaCriatura);
		}else{ //RUIM
			decorarSorte(2);
			energiaCriatura = energiaCriatura+1;		
			$('#criatura-luta-energia').html(energiaCriatura);
		}
	}else if(statusBatalha == 2){ //Apanhou
		if(valorHeroi <= sorteHeroi){ //BOM
			energiaHeroi = energiaHeroi+1;
			decorarSorte(1);
			$('#status-energia').val(energiaHeroi);
			$('#heroi-luta-energia').html(energiaHeroi);
		}else{ //RUIM
			decorarSorte(2);
			energiaHeroi = energiaHeroi-1;
			$('#status-energia').val(energiaHeroi);
			$('#heroi-luta-energia').html(energiaHeroi);
		}
	}
	
	sorteHeroi = sorteHeroi-1;
	$('#heroi-luta-sorte').html(sorteHeroi);
	$('#status-sorte').val(sorteHeroi);
	$('#status-batalha').val(0);
	
	$.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorHeroi&funcao=alterarHeroiEnergiaSorte&energia=' + energiaHeroi + '&sorte=' + sorteHeroi + '&heroi_id='+heroiId,
        success: function(result) {},
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {}
    });	
}


function fncAlterarEnergiaCriatura(id, campo, propriedade){
    energia = parseInt($('#'+campo).html());
    
    if(propriedade == 0){
    	energia = energia-1;
    }else if(propriedade == 1){
    	energia = energia+1;
    }  
    
    if(energia <= 0){
    	energia = 0;
    }
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorCriatura&funcao=alterarEnergiaCriatura&energia=' + energia + '&id='+id,
        success: function(result) {
        	if(energia == 0){
	        	fcnDeletarModalCriatura(id);	        	
        	}else{        	
	        	$('#criatura-'+id).attr('energia',energia);
	   		    $('#criatura-td-energia-'+id).html(energia);
	        	$('#'+campo).html(energia);
        	}
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

function addCriatura(id, nome, habilidade, energia, heroi_id, nome){
	 $html = '';
     $html +='<li class="list-group-item bg-dark text-white border border-light" id="list-criatura-'+id+'">';
	 $html +='	<table>';
	 $html +='		<tr>';
	 $html +='			<td style="min-width: 270px; text-align: center;" colspan="2">';
	 $html +='				<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">';
	 $html +='					<div class="btn-group" role="group" aria-label="First group">';
	 $html +='						<h5 style="margin-top: 5px;" id="criatura-td-nome-'+id+'" >'+nome+'</h5>';
	 $html +='					</div>';
	 $html +='					<div class="input-group">';
	 $html +='						<button type="button" onclick="fcnCarregarModalCriatura(this);" ';
	 $html +='								nome="'+nome+'"';
	 $html +='								habilidade="'+habilidade+'"';
	 $html +='								energia="'+energia+'"';
	 $html +='								criatura-id="'+id+'"';
	 $html +='								heroi_id="'+heroi_id+'"';
	 $html +='								id="criatura-'+id+'"';
	 $html +='								class="btn btn-danger" >Editar</button>';
	 $html +='					</div>';
	 $html +='				</div>';
	 $html +='			</td>';
	 $html +='		</tr>';
	 $html +='		<tr>';
	 $html +='			<td style="min-width: 135px;">Habilidade:</td>';
	 $html +='			<td style="min-width: 135px; text-align: right;"><b id="criatura-td-habilidade-'+id+'">'+habilidade+'</b></td>';
	 $html +='		</tr>';
	 $html +='		<tr>';
	 $html +='			<td>Energia:</td>';
	 $html +='			<td style="text-align: right;"><b id="criatura-td-energia-'+id+'">'+energia+'</b></td>';
	 $html +='		</tr>';
	 $html +='		<tr>';
	 $html +='			<td style="min-width: 270px; text-align: center;" colspan="2">';
	 $html +='				<div class="btn-group" role="group" aria-label="Basic example">';
	 $html +='					<button type="button" onclick="fncAlterarEnergiaCriatura('+id+',\'criatura-td-energia-'+id+'\',0)" class="btn btn-secondary">Menos (-)</button>';
	 $html +='					<button type="button" onclick="fncAlterarEnergiaCriatura('+id+',\'criatura-td-energia-'+id+'\',1)" class="btn btn-secondary">Mais (+)</button>';
	 $html +='				</div>';
	 $html +='			</td>';
	 $html +='		</tr>';
	 $html +='	</table>';
	 $html +='</li>';        		 
	 
	 $('#list-group-criatura').prepend($html);
	
}
//CRIATURA FIM