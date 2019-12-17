<div class="row">
	<br>
	<?php
		$obj='empresa';
		$action='show';
		require 'controller.php';
	?>
	<div class="col m2 hide-on-med-and-down">
		<div class="row">	
			<div class="card green">
				<div class="card-image">
					<img  src="img/etec.png" style="width: 100%; height: 200px; background-color: white;" class="responsive-img">
				</div>
				<div class="card-content white-text">
					<span class="card-title">
						<?=$empresa[1]->nome?>
					</span>
				</div>
				<div class="card-action green darken-1 white-text">
					Código da ETEC: <?=$empresa[1]->codEtec?>
				</div>
			</div>
		</div>	
		<div class="row">
			<ul class="collapsible">
				<li class="active">
					<div class="collapsible-header green"><i class="material-icons">filter_drama</i>Cadastros</div>
					<div class="collapsible-body padding0">
						<ul class="collection">
							<li class="collection-item">
								<a href="index.php?link=10">Produtos</a>
							</li>
							<li class="collection-item">
								<a href="index.php?link=15">Clientes</a>
							</li>
						</ul>	
					</div>
				</li>
			</ul>			  
		</div>	
	</div>
	<div class="col m9 s12 right" style="margin-top: 3vh">
		<ul class="tabs tabs-transparent green lighten-1">
			<li class='tab col s12'><a class='active white-text' href="#pedidos">Pedidos</a></li>
		</ul>
		<div id="pedidos">
			<br>
			<?php
			$obj = 'pedido';
			$action = 'read';
			require 'controller.php';
			foreach($pedidos as $ped) {
			?>
					<form action="index.php?link=20" method="POST">
				<ul class="collapsible grey darken-3">
						<input type="hidden" name="id" value="<?=$ped->id?>">
					<li>
								<div class="collapsible-header" style="padding-top: 0vh; padding-bottom: 1vh;">
									<h4 style="padding-left: 3vh"><img src="img/user.png" width="30px" height="30px" class="circle"> RM do aluno: <?=$ped->rmCli?></h4>
								</div>
								<div class="collapsible-body">
								<div class="container">
								<table>
									<thead>
										<tr class="grey-text text-lighten-2">
											<th>Produto</th>
											<th>Categoria</th>
											<th>Quant.</th>
											<th>Valor</th>
										</tr>
									</thead>
									<tbody class="white-text">
										<?php
											$obj = 'itemPed';
											$action = 'read';
											require 'controller.php';
											foreach ($items as $item) {
												$obj = 'produto';
												$action = 'mostrar';
												require 'controller.php';
										?>
										<tr>
											<th><?=$produtos[0]->descr?></th>
											<th style="text-transform: uppercase;"><?=$produtos[0]->tipo?></th>
											<th style="text-align: center;"><span class="pedQntProd"><?=$item->qtdProd?></span></th>
											<th>R$ 
												<span class="pedPrVen hide"><?=$produtos[0]->prVen?></span>
												<span class="pedTotal"></span>
											</th>
										</tr>
										<?php } ?> 
									</tbody>
									<tfoot>
										<tr class="grey-text text-lighten-2">
											<th></th>
											<th></th>
											<th style="text-align: center;">Total:</th>
											<th>R$ <span class="pedTotalFinal"></span></th>										
										</tr>
									</tfoot>
								</table>
								<br>
								<button class="btn btn-waves-effect green" type="submit">checar como entregue</button>
								</div>
								</div>
					</li>
				</ul>
					</form>
			<?php } ?>
		</div>
	</div>
</div>
<script src="js/telaEmpresa.js" type="text/javascript"></script>