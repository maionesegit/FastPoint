function excluirProduto(pid) {
    var id= pid;
	$.ajax({
		url: 'api.php',
		method: 'POST',
		data: {action:'delete',domain: 'produto', id:pid}
	}).done(function(msg) {
		$("#liProduto"+id).remove();
	});
};

function eventos() {
    $(".btnEdit").click(function() {
    	var id = $(this).attr('idProduto');
    	$("#id").val(id);
    	$("#w3s").attr("value", "teste");
    	$("#prVen").val($("lst_pro_prVen_"+id).text());
    	$("#estoque").val($("lst_pro_estoque_"+id).text());
    	$('#modalproduto').modal('open');
    });

    $(".btnExcluir").click(function() {
         var id = $(this).attr('idProduto');
    	 var toastHTML = '<span>Deseja mesmo <b>EXCLUIR</b> o produto?</span><button class="btn-flat toast-action green white-text" onclick="M.Toast.dismissAll()">Cancelar</button><button class="btn-flat toast-action red white-text btnConfExcluir" onclick="excluirProduto('+id+');">Confirmar</button>';
         M.toast({html: toastHTML});
    });
};

document.addEventListener('DOMContentLoaded', function() {
	$('.modal').modal();
    eventos();
    //ESPERAR GERE
    if($('#tabProdCliMeuPed')){
        $('#estoque').addClass('hide');
    } else {
        $('#estoque').removeClass('hide');
        $('#pedidos').addClass('hide');
    }
});