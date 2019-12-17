document.addEventListener('DOMContentLoaded', function() {
    principal();
});

function principal() {
	if($('#cred').text() == ""){
		$('#cred').text('0.00');
		$('#credCliente').text('0.00');
	};
	$('#credRes').html($('#cred').text());
	
	$('.quantPed').on('input', function() {
		var varUni = $(this).closest('tr').find('.valUni').text();
		var valTotal = $(this).val() * varUni;
		console.log(varUni, valTotal);
		$(this).closest('tr').find('.valTotal').text(valTotal.toFixed(2));
	});
	
	$('.valTotal').each(function() {
		var valUni = $(this).closest('tr').find('.valUni').text();
		$(this).text(parseFloat(valUni).toFixed(2));
	});
	
	$('.addCarrinho').click(function(){
		var tr = $(this).closest('tr');
		var id = tr.find('.idProd').text();
		var descricao = tr.find('.descricao').text();
		var valUni = tr.find('.valUni').text();
		var quant = tr.find('.quantPed').val();
		var valTotal = tr.find('.valTotal').text();
		var repetido = false;
		
		$('#carrinhoCompras').find('tr').each(function() {
			var desc = $(this).find('.carrinhoDesc').text();
			if(descricao == desc) {
				repetido = true;
				var quanti = $(this).find('.carrinhoQuant').text();
				var valT = $(this).find('.totalItem').text();
				console.log(valT)
				var novoQuant = parseInt(quanti) + parseInt(quant);
				var novoTotal = parseFloat(valT) + parseFloat(valTotal);
				$(this).find('.carrinhoQuant').text(novoQuant);
				$(this).find('.qtdProdu').val(novoQuant);
				$(this).find('.totalItem').text(novoTotal.toFixed(2));
			};
		});
		
		if(!repetido) {
			M.toast({html: 'Produto Adicionado!'});
			$('#carrinhoCompras').append(
				'<tr>'
					+'<input type="hidden" name="idProd[]" value="'+id+'"/>'
					+'<td class="carrinhoDesc">'+descricao+'</td>'
					+'<td class="carrinhoUni">R$ '+valUni+'</td>'
					+'<td class="carrinhoQuant">'+quant+'</td>'
					+'<input type="hidden" class="qtdProdu" name="qtdProd[]" value="'+quant+'"/>'
					+'<td class="carrinhoTotal">R$ <span class="totalItem">'+valTotal+'</span></td>'
					+'<td><a href="#!" onclick="removeCarrinho(this)" class="waves-effect btn green"><i class="material-icons">remove</i></td>'
				+'</tr>'
			);
		};
		
		calcNovoTotal();
	});
	
	$('#realizarPedido').click(function() {
		$('.modal').modal();
	});

	$('.credinput').change(function() {
		this.value = parseFloat(this.value).toFixed(2);
	});
	
	$("#btConfirma").on("click", function() {
		M.toast({html:'Pedido Confirmado' });
	});
};
	
function removeCarrinho(t) {
	M.toast({html: 'Produto Removido!'});
	$(t).closest('tr').remove();
	
	calcNovoTotal();
};

function calcNovoTotal() {
	var novoTotalPed = 0;
	$('#carrinhoCompras').find('.totalItem').each(function() {
		novoTotalPed += parseFloat($(this).text());
	});
	/*
	$('#carrinhoCompras').find('.carrinhoTotal').each(function() {
		novoTotalPed += parseFloat($(this).text());
	});
	*/
	novoTotalPed = novoTotalPed.toFixed(2);
	$('#valorPed').val(novoTotalPed);
	$('#valTotalPed').text(novoTotalPed);
	
	var credResult = (parseFloat($('#cred').text()) - novoTotalPed).toFixed(2);
	$('#credRes').html(credResult);
	$('#credRest').val(credResult);

	if($('#carrinhoCompras').children().length == 0) {
		$('#realizarPedido').addClass('disabled');
		$('#totalCarrinho').addClass('hide');
		if($('#credRes').parent('p').css('color', '#ff3232')){
			$('#credRes').parent('p').css('color', 'white')
		};
		return;
	} else {
		if($('#totalCarrinho').hasClass('hide')) {
			$('#totalCarrinho').removeClass('hide');
		};
	};
	
	if(credResult < 0) {
		$('#credRes').parent('p').css('color', '#ff3232');
		if(!$('#realizarPedido').hasClass('disabled')) {
			$('#realizarPedido').addClass('disabled');
		};
	} else {
		if($('#realizarPedido').hasClass('disabled')) {
			$('#realizarPedido').removeClass('disabled');
		};
		if($('#credRes').parent('p').css('color', '#ff3232')){
			$('#credRes').parent('p').css('color', 'white')
		};
	};
};	