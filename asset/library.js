function fnAbreArquivo(arquivo, local, userId) {
    if (arquivo === "")
        return;
    window.location = 'download_doc.php?d=' + local + '&f=' + arquivo+'&u='+userId;
}

function detectarMobile() {
  var check = false; //wrapper no check
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}

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

function rolarDado(heroiId){
	$('#imagem-dado').attr('src','image/dado-animado.gif');
	diceSound = document.getElementById("dice-song"); 
	qtdDados = parseInt($('#input-dados').val());
	isAtivo = $("input[name=dado-teste-sorte]").prop("checked");
	$('#dado-result-total').removeClass('text-success');
	$('#dado-result-total').removeClass('text-danger');
	ajuste = parseInt($('#input-dados-ajuste').val());
	
	if(qtdDados > 0){
		diceSound.play();
		//vibracao(500);
		setTimeout(function(){
			$('#dado-result').html('<span>Ajuste valor = <b>'+ajuste+'</b></span><br/>');
			total = 0;
			for(i=1; i<=qtdDados;i++){
				numero = Math.floor((Math.random() * 6)+1);
				if(qtdDados > 0){
					$('#dado-result').append('<span>Dado Nº'+i+' valor = <b>'+numero+'</b></span><br/>');
				}	
				total += numero;		
			}
			
			if(isAtivo == true){
				fcnTestarSorteSimples(heroiId, total);
			}
			total += ajuste;
			$('#dado-result-total').html('Resultado total + ajuste: <b>'+total+'</b>');
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
	$('#modal-heroi-criar-poder-fogo').val(0);
	$('#modal-heroi-criar-blindagem').val(0);		
	$('#modal-manter-heroi-criar').modal('show');
}

function fncIncluirHeroi(){
    
	nomeCriar = $('#modal-heroi-criar-nome').val();
	aventuraCriar = $('#modal-heroi-criar-aventura').val();
	habilidadeCriar = parseInt($('#modal-heroi-criar-habilidade').val());
	energiaCriar = parseInt($('#modal-heroi-criar-energia').val());
	sorteCriar = parseInt($('#modal-heroi-criar-sorte').val());
	userId = $('#modal-heroi-criar-user-id').val();
	
	poderFogo = parseInt($('#modal-heroi-criar-poder-fogo').val());
	blindagem = parseInt($('#modal-heroi-criar-blindagem').val());
	
	if(userId == null || userId == undefined || userId == ''){
		fcnCarregarModalMensagem('Não foi póssivel criar o heroi favor recarregar a pagina!');
		return;
    }
	
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
        data: 'controlador=ControladorHeroi&funcao=incluirHeroi&nome=' + nomeCriar + '&aventura='+aventuraCriar+ '&habilidade='+habilidadeCriar+ 
        '&energia='+energiaCriar+ '&sorte='+sorteCriar+ '&user_id='+userId+ '&poder_fogo='+ poderFogo + '&blindagem='+blindagem,
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
		case '6':
			$('#list-group-magias').prepend($html);
			break;
		case '7':
			$('#list-group-pericias').prepend($html);
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
	$("#btn-batalha-auto").prop( "disabled", false );
	
	$("#btn-test-sort").prop( "disabled", true );
	
	limparCor();
}

function fcnBatalharAutomatica(heroiId){
	$("#btn-batalha-criatura").prop( "disabled", true );
	$("#btn-batalha-auto").prop( "disabled", true );	
	$("#btn-test-sort").prop( "disabled", true );

	swordSound = document.getElementById("sword-song");
	wrongSound = document.getElementById("wrong-song");
	
	energiaHeroi = parseInt($('#heroi-luta-energia').html());
	energiaCriatura = parseInt($('#criatura-luta-energia').html());
	
	habilidadeHeroi = parseInt($('#heroi-luta-habilidade').html());
	habilidadeCriatura = parseInt($('#criatura-luta-habilidade').html());

	while(energiaHeroi > 0 && energiaCriatura > 0){

		sorteCriatura = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1) + habilidadeCriatura;
		sorteHeroi = Math.floor((Math.random() * 6)+1) + Math.floor((Math.random() * 6)+1) + habilidadeHeroi;
		
		if(sorteCriatura > sorteHeroi){ //Criatura Ataca
			energiaHeroi = energiaHeroi-2;
			if(energiaHeroi <= 0){
				energiaHeroi = 0;
				fcnCarregarModalMensagem('Fim da batalha o herói morreu!');
				fncEfeitoCombat(2);
				break;
			}
		}else if(sorteCriatura < sorteHeroi){ //Heroi Ataca
			energiaCriatura = energiaCriatura-2;
			if(energiaCriatura <= 0 ){
				energiaCriatura = 0;
				fcnCarregarModalMensagem('Fim da batalha o herói venceu!');
				fncEfeitoCombat(1);
				break;
			}		
		}		
	}

	$('#status-batalha').val(0);
	$('#status-energia').val(energiaHeroi);
	$('#heroi-luta-energia').html(energiaHeroi);
	$('#criatura-luta-energia').html(0);
	
	$.ajax({
        url: 'controlador.php',
        type: 'POST',
        data: 'controlador=ControladorHeroi&funcao=alterarHeroiEnergia&valor=' + energiaHeroi + '&heroi_id='+heroiId,
        success: function(result) {},
        beforeSend: function() {},
        complete: function() {},
        error: function (request, status, error) {}
    });
	
}

function sleep(milliseconds) {
	const date = Date.now();
	let currentDate = null;
	do {
		currentDate = Date.now();
	} while (currentDate - date < milliseconds);
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
		fncEfeitoCombat(2);
		energiaHeroi = energiaHeroi-2;
		$('#heroi-luta-energia').addClass('text-danger');
		$('#status-batalha').val(2);
		
		sorteHeroi = parseInt($('#heroi-luta-sorte').html());
		
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
		fncEfeitoCombat(1);
		energiaCriatura = energiaCriatura-2;
		$('#criatura-luta-energia').addClass('text-danger');		
		$('#criatura-luta-energia').html(energiaCriatura);
		$('#status-batalha').val(1);
		
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

function fcnTestarSorteSimples(heroiId,sorteDados){
	sorteHeroi = parseInt($('#status-sorte').val());
	wrongSound = document.getElementById("wrong-song");
	bellSound = document.getElementById("bell-song");
	energiaHeroi = parseInt($('#status-energia').val());
	
	if(sorteHeroi > 0){
		if(sorteDados <= sorteHeroi){
			bellSound.play();
			$('#dado-result-total').addClass('text-success');
		}else{
			wrongSound.play();
			$('#dado-result-total').addClass('text-danger');
		}
		sorteHeroi = sorteHeroi - 1;
		$('#status-sorte').val(sorteHeroi);
		$('#heroi-luta-sorte').html(sorteHeroi);
		
		
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

function fncEfeitoCombat(isHero){
	$('#hero-art').css('z-index', 5);
	$('#monster-art').css('z-index', 5);
	$('#monster-art').css('width', '400px');
	if(detectarMobile() == true){
		$('#monster-art').css('left','300px');
		$('#hero-art').css('left','-250px');
		if(isHero == 1){
			$('#hero-art').css('opacity','0.5');
			fncMoveActionCombatMobile(400,30,isHero);
		}else if(isHero == 2){
			$('#monster-art').css('opacity','0.5');	
			fncMoveActionCombatMobile(30,-400,isHero);
		}
	}else{
		$('#hero-art').css('left','0px');
		$('#monster-art').css('left','1000px');
		$('#hero-art').css('opacity','0.5');
		$('#monster-art').css('opacity','0.5');	
		if(isHero == 1){
			fncMoveActionCombat(1000,500,isHero);
		}else if(isHero == 2){
			fncMoveActionCombat(500,0,isHero);
		}
	}
	
}

function fncMoveActionCombatMobile(hero, monster,isHero){
	swordSound = document.getElementById("sword-song");
	wrongSound = document.getElementById("wrong-song");
	
	if(isHero == 1){
		$('#hero-art').animate({
	      left: hero+'px',
	      opacity: '0.5'
	    }, 1000, function(){
			$('#hero-art').animate({
				opacity: '0.0',
			},'fast',function(){
				
				$('#hero-art').css('z-index', -5);
				$('#monster-art').css('z-index', 5);
				$('#monster-art').css('left', '20px');
				$('#monster-art').animate({
					opacity: '0.5',
				},'fast',function(){
					
					$("#list-luta-criatura").effect("shake");
					swordSound.play();
					
					$("#monster-art").effect("shake",function(){
						$('#monster-art').animate({
							opacity: '0.0'
						},'fast',function(){
							$('#monster-art').css('z-index', -5);
						});						
					});
				});
				
			});
		});
	}else if(isHero == 2){
		$('#monster-art').animate({
	      left: monster+'px',
	      opacity: '0.5'
	    },1000, function(){
			$('#monster-art').animate({
				opacity: '0.0',
			},'fast',function(){
				
				$('#monster-art').css('z-index', -5);
				$('#hero-art').css('z-index', 5);
				$('#hero-art').css('left', '20px');
				$('#hero-art').animate({
					opacity: '0.5',
				},'fast',function(){
					
					$("#list-luta-heroi").effect("shake");
					swordSound.play();
					
					$("#hero-art").effect("shake",function(){
						$('#hero-art').animate({
							opacity: '0.0'
						},'fast',function(){
							$('#hero-art').css('z-index', -5);
						});						
					});
				});
				
			});
		});
	}
	
}

function fncMoveActionCombat(hero, monster,isHero){
	swordSound = document.getElementById("sword-song");
	wrongSound = document.getElementById("wrong-song");
	
	$('#hero-art').animate({
	  left: hero+'px',
	  opacity: '0.5'
	}, 800, 'linear');
	
	$('#monster-art').animate({
	  left: monster+'px',
	  opacity: '0.5'
	}, 800, function(){

		if(isHero == 1){
			
			swordSound.play();
			
			$(".monster-list-art").effect("shake",function(){
					
				$('#hero-art').animate({
					opacity: '0.0'
				}); 
				$('#monster-art').animate({
					opacity: '0.0',
				},'fast',function(){
					$('#hero-art').css('z-index', 0);
					$('#monster-art').css('z-index', 0);	
				});
			});		
		}else if(isHero == 2){
			
			swordSound.play();
			
			$(".heroi-list-art").effect("shake",function(){
				
				$('#hero-art').animate({
					opacity: '0.0'
				}); 
				$('#monster-art').animate({
					opacity: '0.0'
				},'fast',function(){
					$('#hero-art').css('z-index', 0);
					$('#monster-art').css('z-index', 0);	
				}); 			
			});
		}			
		
	});
	
	
	
//	if(isHero == 1){
//		$('#hero-art').animate({
//	      left: hero+'px'
//	    }, 1000, function(){
//			$('#hero-art').animate({
//				opacity: '0.0',
//			},'fast',function(){
//				
//				$('#hero-art').css('z-index', -5);
//				$('#monster-art').css('z-index', 5);
//				//$('#monster-art').css('left', '20px');
//				$('#monster-art').animate({
//					opacity: '0.5',
//					left: monster+'px'
//				},'fast',function(){
//					
//					$("#list-luta-criatura").effect("shake");
//					swordSound.play();
//					
//					$("#monster-art").effect("shake",function(){
//						$('#monster-art').animate({
//							opacity: '0.0'
//						},'fast',function(){
//							$('#monster-art').css('z-index', -5);
//						});						
//					});
//				});
//				
//			});
//		});
//	}else if(isHero == 2){
//		$('#monster-art').animate({
//	      left: monster+'px'
//	    },1000, function(){
//			$('#monster-art').animate({
//				opacity: '0.0',
//			},'fast',function(){
//				
//				$('#monster-art').css('z-index', -5);
//				$('#hero-art').css('z-index', 5);
//				//$('#hero-art').css('left', '20px');
//				$('#hero-art').animate({
//					opacity: '0.5',
//					left: hero+'px'
//				},'fast',function(){
//					
//					$("#list-luta-heroi").effect("shake");
//					swordSound.play();
//					
//					$("#hero-art").effect("shake",function(){
//						$('#hero-art').animate({
//							opacity: '0.0'
//						},'fast',function(){
//							$('#hero-art').css('z-index', -5);
//						});						
//					});
//				});
//				
//			});
//		});
//	}
	
	

	
}
//CRIATURA FIM