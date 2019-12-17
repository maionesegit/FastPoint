<div class="row">
	<div class="col s12 card-panel grey darken-3" style="padding: 30px 50px;">
		<form action='index.php?link=13' method='POST' class="white-text">
			<h4>Faça o cadastro de um novo produto:</h4>
			<div class="col s5">
				<div class="input-field">
					<input type="text" name="descr">
					<label for="descr">Descrição</label>
				</div>
				<div class="input-field grey-text">
					<select name="tipo">
						<option disabled selected class="grey-text">Escolha o tipo</option>
						<option value="salgado">Salgado</option>
						<option value="Bebida">Bebida</option>
						<option value="Outros">Outros</option>
					</select>
				</div>
			</div>
			<div class="col s1"></div>
			<div class="col s5">
				<div class="input-field">
					<input type="number" name="estoque">
					<label for="estoque">Estoque</label>
				</div>
				<div class="input-field">
					<input type="number" name="prVen" step=".01">
					<label for="prVen">Preço de Venda</label>
				</div>
				<button type="submit" class="btn waves-effect green right" style="width: 15vh;height:5vh;margin-bottom:2vh">
					<i style='font-size:30px' class="material-icons">check</i>
				</button>
			</div>
		</form>
	</div>
</div>