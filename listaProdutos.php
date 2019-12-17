<div class="row">
	<div class="col s12 l8 offset-l2">
		<a href='index.php?link=9' class="btn waves-effect green left">VOLTAR</a>
		<div class="card-panel grey darken-2">
			<h4 class="white-text">Produtos</h4>
			<?php
				$obj = 'produto';
				$action = 'show';
				require_once 'controller.php';
				
				foreach ($produto as $produto) {
			?>
			<ul class="collection white" id="liProduto<?=$produto->id?>">
				<li class="collection-item avatar">
					<!-- campo comuns -->
					<div id='campos'>
						<p>
							<h5 style="margin-top: 0px" id="lst_pro_descr_<?=$produto->id?>"><?=$produto->descr?></h5>
							Tipo: <span style="text-transform: uppercase;" id="lst_pro_tipo_<?=$produto->id?>"><?=$produto->tipo?></span><br>
							Preço de Venda: <span id="lst_pro_prVen_<?=$produto->id?>"><?=$produto->prVen?></span><br>
							Estoque: <span id="lst_pro_estoque_<?=$produto->id?>"><?=$produto->estoque?></span>
						</p>
					</div>
					<!--
					<div id='camposEdit' style="display: none">
					</div>
					<form id="form-del" action='index.php?link=12' method="POST" style="margin-bottom: 5px">
						<div  style="display: none" class="white" id='delBox<?=$produto->id?>'  >
							<p>
								<input name='id' hidden value=<?php echo "'$produto->id'";?>>
								Tem certeza que deseja <b>EXCLUIR</b> este produto?<br>
								<div style="margin-bottom:8vh; margin-top:2vh;">
									<a href="#!" class="btn waves-effect right white black-text btnCancelarExclusao" idProduto="<?=$produto->id?>" style="margin-left:1vh">Cancelar</a>
									<button type="submit" class="btn waves-effect red lighten-1 right">DELETAR</button>
								</div>
							</p>
						</div>
					</form>
					-->
					<div id="prodButtons" class="secondary-content">
						<a href="#!" class="btn-floating waves-effect green btnEdit" idProduto="<?=$produto->id?>"><i class="material-icons">edit</i></a>
						<a href="#!" class="btn-floating waves-effect green btnExcluir" idProduto="<?=$produto->id?>"><i class="material-icons">delete</i></a>
					</div>
				</li>
			</ul>
			<?php } ?>
			<a class="btn waves-effect green right" href="index.php?link=11">+</a>
		</div>
	</div>
</div>
<div id="modalproduto" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4>Alterar Produto</h4>
		<form action='index.php?link=14' method="POST">
			<p>
				<input name='id' id="id" type='hidden' value="0">
				Descrição:<b><input name='descr' ></b><br>
				Tipo: <input name='tipo' ><br>
				Preço de Venda: <input name="prVen" type='number' step='.01' ><br>
				Estoque: <input name="estoque" type='number' ><br>
			</p>
		</form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect waves-green btn-flat btnConfirma">Confirmar</a>
		<a href="#!" class="modal-close waves-effect waves-green btn-flat btnCancela">Cancelar</a>      
	</div>
</div>
<script src="js/produto.js" type="text/javascript"></script>