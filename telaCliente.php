<div class='row'>
    <ul class="collection">
        <?php
            $obj = 'cliente';
            $action = 'read';
            require_once 'controller.php';
			
			$obj = 'produto';
			$action = 'show';
			require 'controller.php';
        ?>
        <li class="collection-item avatar">
            <img src="img/vb.png" alt="" class="circle">
            <span class="title"><b style="font-size: 3vh"><?=$cliente->rm?></b></span>
            <p>
                <u><i style="font-size: 2vh"><?=$cliente->nome?></i></u><br>
                ETEC <?=$cliente->etec?>
            </p>
            <a href="#!" class="secondary-content">
				<i class="material-icons right">face</i><br>
				R$ <span id="credCliente"><?=$cliente->cred?></span>
			</a>			
        </li>
    </ul>
	h
    <div class="col s12" style="margin-top: 3vh">
        <ul class="tabs tabs-transparent green lighten-1">
            <?php
                $action = 'pedCli';
                $obj = 'pedido';
                require 'controller.php';console_log($pedidoEx);
                if($pedidoEx){
					echo '<li class="tab col s12"><a class="white-text" id="tabProdCliMeuPed" href="#estoque">Meu Pedido</a></li>';
                } else {
					echo '<li class="tab col s12"><a class="white-text" id="tabProdCliFazPed" href="#pedidos">Fazer Pedido</a></li>';
				}
            ?>
        </ul>
    </div>	
    <div id="pedidos" class="col s12">
        <div class="card-panel grey darken-3">
            <div class='row'>
                <ul class="collapsible popout col s10 offset-s1">					
                    <li>
                        <div class="collapsible-header">
							<img src="img/sal.png" width="50" height="50" class="circle"></i>
                            <h6>Salgados</h6>
						</div>
                        <div class="collapsible-body white-text">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Valor unidade</th>
                                        <th>Quantidade</th>
                                        <th>Valor total</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										foreach($produto as $produtos) {
											if($produtos->tipo == "salgado"){
									?>
                                    <tr>
										<td class="hide idProd"><?=$produtos->id?></td>
                                        <td class="descricao"><?=$produtos->descr?></td>
                                        <td>R$ <span class="valUni"><?=$produtos->prVen?></span></td>
                                        <td>
                                            <div class="input-field col s6">
                                                <input value="1" name="quantidade" type="number" class="validate white-text quantPed">
                                                <label for="quantPed">Quantidade</label>
                                            </div>
                                        </td>
                                        <td>R$ <span class="valTotal"><!-- Não mexer --></span></td>
                                        <td><a href='#!' class='waves-effect btn green addCarrinho'><i class="material-icons">add</i></a></td>
                                    </tr>
									<?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><img src="img/ref.png" width="50" height="50" class="circle"></i>
                            <h6>Refrigerantes</h6></div>
                        <div class="collapsible-body white-text">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Valor unidade</th>
                                        <th>Quantidade</th>
                                        <th>Valor total</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										foreach ($produto as $produtos) {
											if($produtos->tipo == "bebida"){
									?>
                                    <tr>
										<td class="hide idProd"><?=$produtos->id?></td>
                                        <td class="descricao"><?=$produtos->descr?></td>
                                        <td>R$ <span class="valUni"><?=$produtos->prVen?></span></td>
                                        <td>
                                            <div class="input-field col s6">
                                                <input value="1" name="quantidade" type="number" class="validate white-text quantPed">
                                                <label for="quantPed">Quantidade</label>
                                            </div>
                                        </td>
                                        <td>R$ <span class="valTotal"><!-- Não mexer --></span></td>
                                        <td><a href='#!' class='waves-effect btn green addCarrinho'><i class="material-icons">add</i></a></td>
                                    </tr>
									<?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
							<img src="img/ot.png" width="50" height="50" class="circle"></i><h6>Outros</h6>
						</div>
                        <div class="collapsible-body white-text">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Valor unidade</th>
                                        <th>Quantidade</th>
                                        <th>Valor total</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										foreach ($produto as $produtos) {
											if($produtos->tipo == "outros" || $produtos->tipo == "Outros"){
									?>
                                    <tr>
										<td class="hide idProd"><?=$produtos->id?></td>
                                        <td class="descricao"><?=$produtos->descr?></td>
                                        <td>R$ <span class="valUni"><?=$produtos->prVen?></span></td>
                                        <td>
                                            <div class="input-field col s6">
                                                <input value="1" name="quantidade" type="number" class="validate white-text quantPed">
                                                <label for="quantPed">Quantidade</label>
                                            </div>
                                        </td>
                                        <td>R$ <span class="valTotal"><!-- Não mexer --></span></td>
                                        <td><a href='#!' class='waves-effect btn green addCarrinho'><i class="material-icons">add</i></a></td>
                                    </tr>
									<?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><img src="img/car.png" width="50" height="50" class="circle"></i>
                            <h6>Carrinho de compras</h6></div>
                        <div class="collapsible-body white-text">
							<form action="index.php?link=19" method='POST'>
								<table>
									<thead>
										<tr>
											<th>Produto</th>
											<th>Valor unidade</th>
											<th>Quantidade</th>
											<th>Valor total</th>
										</tr>
									</thead>
									<tbody id="carrinhoCompras"></tbody>
									<tfoot id="totalCarrinho" class="hide">
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th>R$ <span id="valTotalPed"></span></th>
											<input id="valorPed" type="hidden" name="valor" value="0.00"/>
										</tr>
									</tfoot>
								</table><br>
								<center>
									<p>Seu saldo atual: R$ <span id="cred"><?=$cliente->cred?></span><br>
									Saldo depois da compra: R$ <span id="credRes"></span>
									<input id="credRest" type="hidden" name="credRes" value="0.00"/></p>
									<a href='#modal1' class="waves-effect waves-light btn disabled color green modal-trigger center" id="realizarPedido">Concluir pedido</a>
								</center>
								<div id="modal1" class="modal">
									<div class="modal-content">
										<h4 class="black-text">Deseja Confirmar o Pedido?</h4>
										<p class="black-text">O seu pedido foi realizado, tem certeza que todas as infomações estão corretas? Deseja continuar?</p>
									</div>
									<div class="modal-footer">
										<button type='submit' href="#!" class="modal-close waves-effect waves-green btn-flat" id="btConfirma">Confirmar</button>
										<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
									</div>
								</div>
							</form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="estoque" class="col s12 hide">
        <div class="card-panel grey darken-3">
            <h5 class="green-text" style="margin-bottom: 3vh">Pedidos Pendentes</h5>
            <div class="card">
                <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab grey darken-3"><a href="#test4">Salgado</a></li>
                        <li class="tab grey darken-3"><a href="#test5">Refrigerante</a></li>
                        <li class="tab grey darken-3"><a href="#test6">Doces em geral</a></li>
                    </ul>
                </div>
                <div class="card-content grey darken-3 white-text"> <!-- FALTA PHP-->
                    <div id="test4">Coxinha R$ 4,50
                        <br> Enroladinho de Presunto e Queijo R$ 4,50
                        <br> Bolinha de Queijo R$ 1</div>
                    <div id="test5">Coca de 2L R$ 7,00 </div>
                    <div id="test6"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/principalLog.js" type="text/javascript"></script>