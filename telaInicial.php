<div class='row'>
	<div class='col s12 l7'>
		<br>
		<img class='responsive-img' src="img/cantina.png" style=''>
	</div>
	<div class="col s12 l5 grey-text text-lighten-2">
		<h4>Bem-vindo ao FastPoint</h3>
		<h6><i>Agilize seu refeitório. A fome não espera!</i></h6>
		<p>Estamos aqui para integrar a cantina da sua escola com você.<br>
		Utilizando nosso site, permitiremos que você:</p>
		<ul style="list-style-type:square;">
			<li>● Realize pedidos com facilidades</li>
			<li>● Adicone créditos à sua conta</li>
			<li>● Dê uma olhada no cardápio da escola</li>
		</ul>
		<p>Para começar, faça login através dos botões abaixo.</p>
		<div class="row" style="margin-bottom: 0px;">
			<div class='row left' style="margin: 0px 0px 3px 8px;">
				<a href='#!' class='waves-effect btn green' id='btnLogin'>Login Aluno</a>
			</div>
			<div class='row right' style="margin-bottom: 3px;">
				<a href='#!' class='waves-effect btn green' id='btnLoginEmp'>Login ETEC</a>
			</div>
		</div>
		<div class="row" style='display:none' id='loginBox'>
			<form action="index.php?link=3" method='POST'>
				<div class='row'>
					<center>
						<div class='input-field' style="width: 90%">
							<input class='validate white-text' type="text" id="login" name='rm'>
							<label for='rm'>RM do Aluno</label>
						</div>
					</center>
				</div>
				<div class='row'>
					<center>
						<div class='input-field' style="width: 90%">
							<input class='validate white-text' type="password" id="senha" name='senha'>
							<label for='senha'>Senha do Aluno</label>
						</div>
					</center>
				</div>
				<div class='row right-align'>
					<button type='submit' id='btnLogar' name='btnLogar' class='btn waves-effect waves-light green'>Logar</button>
				</div>
			</form>
		</div>
		<div class="row" style='display:none' id='loginBoxEmp'>
			<form action='index.php?link=7' method='POST'>
				<div class='row'>
					<center>
						<div class='input-field' style="width: 90%">
							<input class='validate white-text' type="text" id="codEtec" name='codEtec'>
							<label for='codEtec'>Código da ETEC</label>
						</div>
					</center>
				</div>
				<div class='row'>
					<center>
						<div class='input-field' style="width: 90%">
							<input class='validate white-text' type="password" id="senhaEmp" name='senhaEmp'>
							<label for='senha'>Senha da ETEC</label>
						</div>
					</center>
				</div>
				<div class='row right-align'>
					<button type='submit' id='btnLogar' name='btnLogar' class='btn waves-effect waves-light green'>Logar</button>
				</div>
			</form>
		</div>
		<!-- <p class="grey-text text-lighten-1"><i>Imagens retiradas: Shutterstock. Disponível em: https://www.shutterstock.com. Acesso em: 14 agosto 2019.</i></p> -->
	</div>
</div>