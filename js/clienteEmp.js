document.addEventListener('DOMContentLoaded', function() {
    clienteEmp();
});

function clienteEmp() {
	$('.credClie').each(function() {
		if($(this).text() == ""){
			$(this).text('0.00');
		};
	});

	$('.credQuantidade').each(function() {
		$(this).change(function() {
			$(this).val(parseFloat($(this).val()).toFixed(2));
		});
	});
};