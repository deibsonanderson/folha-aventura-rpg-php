function fcnCarregarModalMensagem(msg) {
	$('#modal-span-mensagem').html(msg);
	$('#modal-mensagem').modal('show');
}

function irPagina(id){
	$('#heroi_id').val(id);
	$('#form-heroi').submit(); 
}

// DADOS
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

function validarLimite(valor, limite){
	if(valor > limite){
		return false;
	}else{
		return true;
	}
}

function rolarDado(){
	$('#imagem-dado').attr('src','image/dado-animado.gif');
	diceSound = document.getElementById("dice-song"); 
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
function fcnCarregarModalCriarHeroi() {
	$('#modal-heroi-criar-nome').val('');
	$('#modal-heroi-criar-habilidade').val(0);
	$('#modal-heroi-criar-energia').val(0);
	$('#modal-heroi-criar-sorte').val(0);	
	$('#modal-manter-heroi-criar').modal('show');
}

function fncIncluirHeroi(){
    
	nomeCriar = $('#modal-heroi-criar-nome').val();
	aventuraCriar = $('#modal-heroi-criar-aventura').val();
	habilidadeCriar = parseInt($('#modal-heroi-criar-habilidade').val());
	energiaCriar = parseInt($('#modal-heroi-criar-energia').val());
	sorteCriar = parseInt($('#modal-heroi-criar-sorte').val());	
	
	if(nomeCriar == null || nomeCriar == undefined || nomeCriar == ''){
		fcnCarregarModalMensagem('O campo da nome deve ser preenchido!');
		return;
    }
	
	if(habilidadeCriar == null || habilidadeCriar == undefined || habilidadeCriar == '' || habilidadeCriar <= 0){
    	fcnCarregarModalMensagem('O campo habilidade deve ser superior a "0"!');
    	return;
    }

	if(energiaCriar == null || energiaCriar == undefined || energiaCriar == '' || energiaCriar <= 0){
    	fcnCarregarModalMensagem('O campo energia deve ser superior a "0"!');
		return;
    }
	
	if(sorteCriar == null || sorteCriar == undefined || sorteCriar == '' || sorteCriar <= 0){
    	fcnCarregarModalMensagem('O campo sorte deve ser superior a "0"!');
		return;
    }

	$('#modal-manter-heroi-criar').modal('hide');
	
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorHeroi&funcao=incluirHeroi&nome=' + nomeCriar + '&aventura='+aventuraCriar+ '&habilidade='+habilidadeCriar+ '&energia='+energiaCriar+ '&sorte='+sorteCriar,
        success: function(result) {
        	location.reload();        	
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

function fcnCarregarModalHeroi(id) {
	$('#modal-heroi-id').val(id);
	$('#modal-manter-heroi').modal('show');
}

function fcnDeletarModalHeroi(){
	heroiId = $('#modal-heroi-id').val();	 	
	$('#modal-manter-heroi').modal('hide');
	
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorHeroi&funcao=excluirHeroi&id='+heroiId,
        success: function(result) {
       	 $('#list-heroi-'+heroiId).fadeOut( "slow", function() {
    		 $('#list-heroi-'+heroiId).remove();
    	 });
    	},
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}





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
    
    if(validarLimite(valor,parseInt($('#'+campo+'-inicial').html())) ){
    	
	    if(valor < 0){
	    	valor = 0;
	    }
	    $.ajax({
	        url: 'controlador.php',
	        type: 'POST',
	        data: 'retorno=' + retorno + '&controlador=' + controlador + '&funcao=' + funcao + '&valor=' + valor + '&heroi_id='+heroi_id,
	        success: function(result) {
	        	$('#'+campo).val(valor);
	        },
	        beforeSend: function() {},
	        complete: function() {},
	        error: function (request, status, error) {
	        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
	        }
	    });
    }else{
    	fcnCarregarModalMensagem('Não pode exceder o limite inicial!');
    }    
}

//HEROI FIM
//ROTA INICIO
function fncIncluirRotaHeroiTreeViewPai(id, rota, isExcluir){
    $('#pai-status-rota').val(rota);
    $('#pai-status-rota').attr('rota_id',id);
    $('#pai-status-rota').attr('is-excluir',isExcluir);
    $('#btn-status-rota').prop( "disabled", false );
    if(isExcluir == 1){
    	$("#btn-pai-status-rota").prop( "disabled", false );
    }else{
    	$("#btn-pai-status-rota").prop( "disabled", true );
    }
}

function fcnCarregarModalRotaTreeView(heroiId) {
	if($('#pai-status-rota').attr('is-excluir') == '1'){
		$('#modal-rota-id').val($('#pai-status-rota').attr('rota_id'));
		$('#modal-rota-heroi_id').val(heroiId);
		$('#modal-manter-rota').modal('show');		
	}else{
		fcnCarregarModalMensagem('Você não pode excluir posições superiores!');
	}
	$('#pai-status-rota').val('');
    $('#pai-status-rota').attr('rota_id','');
    
    $("#btn-pai-status-rota").prop( "disabled", true );
}

function fncIncluirRotaHeroiTreeView(element, campo){
    controlador = $(element).attr('controlador');
    funcao = $(element).attr('funcao');
    retorno = $(element).attr('retorno');
    heroi_id = $(element).attr('heroi_id');    
    rota = $('#'+campo).val();
    contexto = $('#contexto-rota-aventura').val();
    rota_id = $('#pai-status-rota').attr('rota_id');
    if(rota == null || rota == undefined || rota == ''){
    	fcnCarregarModalMensagem('O campo da roda deve ser preenchido!');
    	return;
    }
    
    rota = parseInt(rota);
    
    if(rota <= 0){
    	fcnCarregarModalMensagem('A rota deve ser superior a "0"!');
		return;
    }
    
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'retorno=' + retorno + '&controlador=' + controlador + '&funcao=' + funcao + '&rota=' + rota + '&heroi_id='+ heroi_id + '&rota_id='+rota_id+ '&contexto='+contexto,
        success: function(result) {
        	$('#'+campo).val('');
			//$('#'+campo).focus();
			$('#pai-status-rota').val('');
		    $('#pai-status-rota').attr('rota_id','');
		    $('#div-rota-card-body').html(result);
		    $("#btn-pai-status-rota").prop( "disabled", true );
		    $('#btn-status-rota').prop( "disabled", true );
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

/*
function fncIncluirRotaHeroi(element, campo){
    controlador = $(element).attr('controlador');
    funcao = $(element).attr('funcao');
    retorno = $(element).attr('retorno');
    heroi_id = $(element).attr('heroi_id');    
    rota = $('#'+campo).val();
    if(rota == null || rota == undefined || rota == ''){
    	fcnCarregarModalMensagem('O campo da roda deve ser preenchido!');
		return;
    }
    
    rota = parseInt(rota);
    
    if(rota <= 0){
    	fcnCarregarModalMensagem('A rota deve ser superior a "0"!');
		return;
    }
    
    $.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'retorno=' + retorno + '&controlador=' + controlador + '&funcao=' + funcao + '&rota=' + rota + '&heroi_id='+heroi_id,
        success: function(result) {
        	fcnAddTimeLineRota(rota, parseInt(result), heroi_id);
        	$('#'+campo).val('');
			$('#'+campo).focus();        	
        },
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {
        	$('#' + retorno).html('status:'+status+' messagem:'+request.responseText+' error:'+error);
        }
    });
}

function fcnAddTimeLineRota(rota, id, heroi_id){
	quantidade = parseInt($('#quantidade-rotas').val());
	position = $('#position-rota').val();
	if(position == 0){
		$('#position-rota').val(1);
		html = '<div class="row align-items-center justify-content-end how-it-works d-flex"><div class="col-2 text-center full d-inline-flex justify-content-center align-items-center"><div onclick="fcnCarregarModalRota('+id+','+heroi_id+');" class="circle font-weight-bold">'+rota+'</div></div></div>';
		if(quantidade > 0){
			html += '<div class="row timeline"><div class="col-2"><div class="corner right-bottom"></div></div><div class="col-8"><hr /></div><div class="col-2"><div class="corner top-left"></div></div></div>';
		}
	}else{
		$('#position-rota').val(0);
		html = '<div class="row align-items-center how-it-works d-flex"><div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center"><div onclick="fcnCarregarModalRota('+id+','+heroi_id+');"  class="circle font-weight-bold">'+rota+'</div></div></div>';
		if(quantidade > 0){
			html += '<div class="row timeline"><div class="col-2"><div class="corner top-right"></div></div><div class="col-8"><hr /></div><div class="col-2"><div class="corner left-bottom"></div></div></div>';
		}
	}
	$('#quantidade-rotas').val((quantidade+1));
	$('#div-rota-card-body').prepend(html);
}

function fcnCarregarModalRota(id,heroiId) {
	$('#modal-rota-id').val(id);
	$('#modal-rota-heroi_id').val(heroiId);
	$('#modal-manter-rota').modal('show');
}*/

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

function fcnCarregarModalInventExluir(id) {
	$('#modal-inventario-id').val($('#modal-invent-id').val());
	$('#modal-manter-invent').modal('hide');
	$('#modal-excluir-inventario').modal('show');	
}


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

function fncAlterarNumber(campo, propriedade, max){
	valor = parseInt($('#'+campo).val());
    if(propriedade == 0){
    	valor = valor-1;
    }else if(propriedade == 1){
    	valor = valor+1;
    }  
    
    if(valor < 0){
    	valor = 0;
    }
    
    if(max != undefined && max != null && max != '' && valor > max ){
    	valor = max;
    }
    
   	$('#'+campo).val(valor);
}

function fcnAtualizarModalInvent() {
	id = $('#modal-invent-id').val();
	descricao = $('#modal-invent-descricao').val();
	quantidade = $('#modal-invent-quantidade').val();
	tipo = $('#modal-invent-tipo').val();
	heroi_id = $('#modal-invent-heroi_id').val();
	
	if(descricao == '' || descricao == null || descricao == undefined){
		fcnCarregarModalMensagem('O campo descrição deve ser preenchido!');
		return;
	}
	
	if(quantidade == '' || quantidade == null || quantidade == undefined || parseInt(quantidade) <= 0){
		fcnCarregarModalMensagem('A quantidade deve ser maior que 0!');
		return;
	}
	
	
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
    		 $html += '<span id="inventario-span-quant-'+id+'" class="badge badge-secondary badge-pill">'+quantidade+'</span>';
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
		id = $('#modal-inventario-id').val();
		
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
	$('#modal-excluir-inventario').modal('hide');
	
}
//INVENTARIO FIM

//CRIATURA INICIO
function fcnAtualizarHeroiStatus(){
	$('#heroi-luta-energia').html($('#status-energia').val());
	$('#heroi-luta-habilidade').html($('#status-habilidade').val());
	$('#heroi-luta-sorte').html($('#status-sorte').val());
}


function fcnCarregarModalIncluirCriatura(heroi_id){
	$('#modal-criatura-nome').val('Monstro');
	$('#modal-criatura-habilidade').val(0);
	$('#modal-criatura-energia').val(0);
	$('#modal-criatura-heroi_id').val(heroi_id);
	$('#modal-manter-criatura').modal('show');
}

function fcnIniciarBatalhaModalCriatura(){
	nome = $('#modal-criatura-nome').val();
	habilidade = $('#modal-criatura-habilidade').val();
	energia = $('#modal-criatura-energia').val();
	
	if(nome == '' || nome == null || nome == undefined){
		fcnCarregarModalMensagem('O campo nome deve ser preenchido!');
		return;
	}
	
	if(habilidade == '' || habilidade == null || habilidade == undefined || parseInt(habilidade) <= 0){
		fcnCarregarModalMensagem('A habilidade deve ser superior a 0!');
		return;
	}
	
	if(energia == '' || energia == null || energia == undefined || parseInt(energia) <= 0){
		fcnCarregarModalMensagem('A energia deve ser superior a 0!');
		return;
	}	
	
	heroi_id = $('#modal-criatura-heroi_id').val();
	$('#modal-manter-criatura').modal('hide');
	$('#criatura-luta-resultado').html('-');
	$('#heroi-luta-resultado').html('-');
	$('#status-batalha').val(0);
	$('#criatura-luta-nome').html(nome);
	$('#criatura-luta-energia').html(energia);
	$('#criatura-luta-habilidade').html(habilidade);
	
	$("#btn-batalha-criatura").prop( "disabled", false );
	$("#btn-test-sort").prop( "disabled", true );
	
	limparCor();
}

function fcnBatalhar(heroiId){
	limparCor();
	swordSound = document.getElementById("sword-song");
	wrongSound = document.getElementById("wrong-song");
	
	energiaHeroi = parseInt($('#heroi-luta-energia').html());
	energiaCriatura = parseInt($('#criatura-luta-energia').html());
	
	habilidadeHeroi = parseInt($('#heroi-luta-habilidade').html());
	habilidadeCriatura = parseInt($('#criatura-luta-habilidade').html());
	
	sorteCriatura = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1) + habilidadeCriatura;
	sorteHeroi = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1) + habilidadeHeroi;

	$('#criatura-luta-resultado').html(sorteCriatura);
	$('#heroi-luta-resultado').html(sorteHeroi);

	$("#btn-batalha-criatura").prop( "disabled", false );
	$("#btn-test-sort").prop( "disabled", false );
	
	if(sorteCriatura > sorteHeroi){ //Criatura Ataca
		energiaHeroi = energiaHeroi-2;
		$('#heroi-luta-energia').addClass('text-danger');
		$('#status-batalha').val(2);
		$("#list-luta-heroi").effect("shake");
		sorteHeroi = parseInt($('#heroi-luta-sorte').html());
		swordSound.play();
		$.ajax({
	        url: 'controlador.php',
	        type: 'POST',
	        data: 'controlador=ControladorHeroi&funcao=alterarHeroiEnergia&valor=' + energiaHeroi + '&heroi_id='+heroiId,
	        success: function(result) {},
	        beforeSend: function() {},
	        complete: function() {},
	        error: function (request, status, error) {}
	    });

		if(energiaHeroi < 0){
			energiaHeroi = 0;
			$("#btn-batalha-criatura").prop( "disabled", true );
			$("#btn-test-sort").prop( "disabled", true );
			fcnCarregarModalMensagem('Fim da batalha o herói morreu!');
			$('#status-batalha').val(0);
		}else if(energiaHeroi == 0 && sorteHeroi > 0){
			$("#btn-batalha-criatura").prop( "disabled", true );
			$("#btn-test-sort").prop( "disabled", false );
			fcnCarregarModalMensagem('Tente a sorte!');
			$('#status-batalha').val(2);
		}else if(energiaHeroi == 0 && sorteHeroi <= 0){
			$("#btn-batalha-criatura").prop( "disabled", true );
			$("#btn-test-sort").prop( "disabled", true );
			fcnCarregarModalMensagem('Fim da batalha o herói morreu!');
			$('#status-batalha').val(0);

		}
		
		$('#status-energia').val(energiaHeroi);
		$('#heroi-luta-energia').html(energiaHeroi);
		
	}else if(sorteCriatura < sorteHeroi){ //Heroi Ataca
		energiaCriatura = energiaCriatura-2;
		$('#criatura-luta-energia').addClass('text-danger');		
		$('#criatura-luta-energia').html(energiaCriatura);
		$('#status-batalha').val(1);
		$("#list-luta-criatura").effect("shake");
		swordSound.play();
		
		if(energiaCriatura <= 0 ){
			energiaCriatura = 0;
			$("#btn-batalha-criatura").prop( "disabled", true );
			$("#btn-test-sort").prop( "disabled", true );
			fcnCarregarModalMensagem('Fim da batalha o herói venceu!');
			$('#status-batalha').val(0);
			$('#criatura-luta-energia').html(0);
		}		
		
	}else if(sorteCriatura == sorteHeroi){ //empate
		limparCor();
		$("#btn-test-sort").prop( "disabled", true );
		wrongSound.play();
	}
	
	
}

function limparCor(){
	$('#heroi-luta-energia').removeClass('text-success');
	$('#criatura-luta-energia').removeClass('text-success');
	$('#criatura-luta-energia').removeClass('text-danger');
    $('#heroi-luta-energia').removeClass('text-danger');
}

function fcnTestarSorte(heroiId){
	limparCor();
	wrongSound = document.getElementById("wrong-song");
	bellSound = document.getElementById("bell-song");
	energiaHeroi = parseInt($('#heroi-luta-energia').html());
	energiaCriatura = parseInt($('#criatura-luta-energia').html());
	sorteHeroi = parseInt($('#heroi-luta-sorte').html());
	statusBatalha = $('#status-batalha').val();
	sorte = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1);

	$('#criatura-luta-resultado').html('-');
	$('#heroi-luta-resultado').html(sorte);
	
	if(statusBatalha == 1){ //Heroi Atacou
		if(sorte <= sorteHeroi){ //BOM
			$('#criatura-luta-energia').addClass('text-danger');
			energiaCriatura = energiaCriatura-1;
			if(energiaCriatura <= 0){
				fcnCarregarModalMensagem('Fim da batalha o herói venceu!');
				energiaCriatura = 0;
				$("#btn-batalha-criatura").prop( "disabled", true );
			}
			$('#criatura-luta-energia').html(energiaCriatura);
			bellSound.play();
		}else{ //RUIM
			$('#criatura-luta-energia').addClass('text-success');
			energiaCriatura = energiaCriatura+1;		
			$('#criatura-luta-energia').html(energiaCriatura);
			wrongSound.play();
		}
	}else if(statusBatalha == 2){ //Monstro Atacou
		if(sorte <= sorteHeroi){ //BOM
			energiaHeroi = energiaHeroi+1;
			$("#btn-batalha-criatura").prop( "disabled", false );
			$('#heroi-luta-energia').addClass('text-success');
			$('#status-energia').val(energiaHeroi);
			$('#heroi-luta-energia').html(energiaHeroi);
			bellSound.play();
		}else{ //RUIM
			$('#heroi-luta-energia').addClass('text-danger');
			energiaHeroi = energiaHeroi-1;
			if(energiaHeroi <= 0){
				fcnCarregarModalMensagem('Fim da batalha o herói morreu!');
				energiaHeroi = 0;
			}			
			$('#status-energia').val(energiaHeroi);
			$('#heroi-luta-energia').html(energiaHeroi);
			wrongSound.play();
		}
	}
	
	sorteHeroi = sorteHeroi-1;
	$('#heroi-luta-sorte').html(sorteHeroi);
	$('#status-sorte').val(sorteHeroi);
	$('#status-batalha').val(0);
	$("#btn-test-sort").prop( "disabled", true );
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