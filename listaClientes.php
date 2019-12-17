<div class="row">
	<div class="col s12 l8 offset-l2">
		<a href='index.php?link=9' class="btn waves-effect green left">VOLTAR</a>
		<div class="card-panel grey darken-2">
			<h5 class="white-text">LISTA DE ALUNOS</h5>
			<h6 class="white-text">Clique em cada aluno para exibir os seus pedidos.</h6><br>
			<ul class="collapsible popout">
				<?php
					$obj = 'cliente';
					$action = 'listEmp';
					require 'controller.php';

					foreach ($clientes as $cliente) {
				?>
				<li>
					<div style="position: relative;" class="collapsible-header"><img src="img/user.png" width="50" height="50" class="circle">
						<h6 style="padding-left: 10px;"><?=$cliente->nome?></h6>
						<h6 style="position: absolute; right: 25px;">RM: <span><?=$cliente->rm?></span></h6>
					</div>
					<div class="collapsible-body white-text">
						<h6>
							Quantidade de créditos atual: <b>R$ <span class="credClie"><?=$cliente->cred?></span></b><br>
							Adicionar créditos à conta:
							<form action='index.php?link=16' method="POST">
								<input hidden name="rm" value="<?=$cliente->rm?>">
								<input hidden name="credAtual" value="<?=$cliente->cred?>">
								<div class="input-field inline">
									<input name="cred" type="number" value='0.00' min="0" step="0.10" class="validate white-text credQuantidade col m4 credinput">
								</div>
								<button type='submit' class='waves-effect btn green right'>Adicionar</button>
							</form>
						</h6>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<script src="js/clienteEmp.js" type="text/javascript"></script>