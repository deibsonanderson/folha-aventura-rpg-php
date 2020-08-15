<div class="modal" id="modal-manter-heroi-criar" tabindex="-1"	role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark text-white">
			<div class="modal-header">
				<h5 class="modal-title">Criar um novo herói</h5>
				<button type="button" class="close text-white" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="form-control" id="modal-criatura-heroi_id" >
				<div class="form-group">
					<label for="exampleFormControlInput1">Nome</label> <input
						type="text" class="form-control" id="modal-heroi-criar-nome"
						placeholder="Informe um nome para o heroi!">
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Habilidade:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-heroi-criar-habilidade',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" readonly="true" class="form-control text-center"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" id="modal-heroi-criar-habilidade">
						<div class="input-group-append">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-heroi-criar-habilidade',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Energia:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-heroi-criar-energia',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" readonly="true" class="form-control text-center"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" id="modal-heroi-criar-energia">
						<div class="input-group-append">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-heroi-criar-energia',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Sorte:</label>
					<div class="input-group ">
						<div class="input-group-prepend">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-heroi-criar-sorte',0)" type="button">Menos (-)</button>
						</div>
						<input type="number" readonly="true" class="form-control text-center"
							placeholder="" aria-label="Example text with two button addons"
							aria-describedby="button-addon3" id="modal-heroi-criar-sorte">
						<div class="input-group-append">
							<button class="btn btn-secondary" onclick="fncAlterarNumber('modal-heroi-criar-sorte',1)" type="button">Mais (+)</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="button-addon4" class="">Aventura:</label>
					<select class="form-control" id="modal-heroi-criar-aventura">
                        <option>A Cidadela do Caos</option>
                        <option>O Feiticeiro da Montanha de Fogo</option>
                        <option>A Floresta da Destruição</option>
                        <option>A Cidade dos Ladrões</option>
                        <option>O Calabouço da Morte</option>
                        <option>A Nave Espacial Traveller</option>
                        <option>O Templo do Terror</option>
                        <option>As Coligações de Kether</option>
                        <option>Mares de Sangue</option>
                        <option>Encontro Marcado com M.E.D.O.</option>
                        <option>Planeta Rebelde</option>
                        <option>Demônios das Profundezas</option>
                        <option>A Cripta do Vampiro</option>
                        <option>Robô Comando</option>
                        <option>Prova dos Campeões</option>
                        <option>O Guerreiro das Estradas</option>
                        <option>As Cavernas da Feiticeira da Neve</option>
                        <option>A Espada do Samurai</option>
                        <option>O Ladrão da Meia-Noite</option>
                        <option>Mansão das Trevas</option>
                        <option>Fantasmas do Medo</option>
                        <option>O Talismã da Morte</option>
                        <option>Fortaleza dos Pesadelos</option>
                        <option>Punhais da Escuridão</option>
                        <option>A Cripta do Feiticeiro</option>
                        <option>Exércitos da Morte</option>
                        <option>Escravos do Abismo</option>
                        <option>Sky Lord</option>
                        <option>Fúria de Príncipes - O Caminho do Guerreiro</option>
                        <option>Fúria de Príncipes - O Caminho do Feiticeiro</option>
                        <option>As Montanhas Shamutanti</option>
                        <option>Kharé - Porto dos Ardis</option>
                        <option>As Sete Serpentes</option>
                        <option>The Crown of Kings</option>
                        <option>Out of the Pit - Saídos do Inferno</option>
                        <option>Titan - O Mundo de Aventuras Fantásticas</option>
                        <option>RPG Aventuras Fantásticas - Uma introdução aos role-playing games</option>
                        <option>O Saqueador de Charadas</option>
                        <option>Dungeoneer</option>
                        <option>Blacksand</option>
                        <option>Allansia</option>
                        <option>As Guerras de Trolltooth</option>
                        <option>Demonstealer - Ladrão-Demônio</option>
                        <option>Shadowmaster</option>
                        <option>Outro</option>
                    </select>					
				</div>				
			</div>
			<div class="modal-footer">
				<button type="button"  onclick="fncGerarHeroi();" class="btn btn-primary" >Gerar Heroi</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="fncIncluirHeroi();" class="btn btn-danger">Confirmar</button>
			</div>
		</div>
	</div>
</div>

<script>
function fncGerarHeroi(){
		nomes = ['If','Tyunn','Aun','Tyorgrirn','Vorrus','Grafralf','Raslerd','Thrunskulr','Eirkmuvoth','Stappaekkag','Sguf','Smik','Fralf','Brelgaumm','Ghortmir','Rhendraek','Relpamm','Neredr','Norngestaet','Hofnolsaern','Gwo','Kiog','Gweih','Teigde','Fulhif','Velfhus','Algra','Ghindrin','Murkuta','Soymalhu','Trul','Grun','Rhi','Asvah','Grergi','Gridieh','Trifoth','Fraeymuh','Fegnirsti','Galgrieyma','Urhan','Ejamar','Qrutrix','Oruxeor','Ushan','Ugovras','Igoxium','Ataz','Ilrolius','Azadium','Oharad','Olozor','Qruprix','Qraqium','Oligron','Ophior','Equam','Grijahr','Aharis','Olzoxon','Aqinn','Aharise','Anydae','Atosh','Neharise','Estrea','Arexone','Nubis','Ulobelle','Rephaen','Udephyx','Ewaelle','Nughis','Chodeis','Asizith','Zivia','Phazohra','Nivile','Omiharise','Uzogaell'];

		$('#modal-heroi-criar-nome').val(nomes[Math.floor((Math.random() * 79)+1)])
	
	//habilidade
		habilidade = Math.floor((Math.random() * 6)+1);
		habilidade += 6;
		$('#modal-heroi-criar-habilidade').val(habilidade);	
	//energia
		energia = Math.floor((Math.random() * 6)+1);
		energia += Math.floor((Math.random() * 6)+1);
		energia += 12;
		$('#modal-heroi-criar-energia').val(energia);
	//sorte
		sorte = Math.floor((Math.random() * 6)+1);
		sorte += 6;
		$('#modal-heroi-criar-sorte').val(sorte);
		
}

</script>