<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js"></script>
<script>
	$(document).ready(function(){
		$("#cadastrar").click(function() {
			$(this).closest('form').submit();
		});
		$("#cadastrarEmp").click(function() {
			$(this).closest('form').submit();
		});
	});
</script>
<div class="row">
	<div class="col s12" style="margin-top: 3vh">
		<ul class="tabs tabs-transparent green lighten-1">
			<li class='tab col s6' ><a class='active white-text' href="#clientet">Cliente</a></li>
			<li class="tab col s6" ><a class='white-text' href="#empresa">Empresa</a></li>
		</ul>
	</div>
	<div id='clientet' class="col s12">
		<form action="cadastrar.php" method="POST">
			<div class="card-panel grey darken-3">
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type="text" name="rm">
					<label for='rm'>RM do Aluno</label>
				</div>
				<br>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type='text' name='nome'>
					<label for='nome'>Nome do Aluno</label>
				</div>
				<br>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type='text' name='email'>
					<label for='email'>Email do Aluno</label>
				</div>
				<br>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type="password" name="senha">
					<label for='senha'>Senha do Aluno</label>
				</div>
				<br>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type='text' name='codEtec'>
					<label for='codEtec'>Código da ETEC</label>
				</div>
				<div class="btn waves-effect green darken-1 col s12" id="cadastrar">
					<input class="white-text" type="submit" value="Cadastrar">
				</div>
			</div>
		</form>
	</div>
	<div id='empresa' class="col s12">
		<form action="cadastrarEmp.php" method="POST">
			<div class='card-panel grey darken-3'>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type='text' name='codEtec'>
					<label for='codEtec'>Código da ETEC</label>
				</div>
				<br>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type="text" name="nomeEmp">
					<label for='nomeEmp'>Nome da ETEC</label>
				</div>
				<br>
				<div class='input-field'>
					<input class='grey-text text-lighten-4' type="password" name="senhaEmp">
					<label for='senha'>Senha da ETEC</label>
				</div>
				<div class="btn waves-effect green darken-1 col s12" id="cadastrarEmp">
					<input class="white-text" type="submit" value="Cadastrar">
				</div>
			</div>
		</form>
	</div>
</div>