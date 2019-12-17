document.addEventListener('DOMContentLoaded', function() {
    principalEmp();
});

function principalEmp() {
	$('.pedTotal').each(function() {
		var pedVal = $(this).parent().find('.pedPrVen').text();
		var pedQnt = $(this).closest('tr').find('.pedQntProd').text();
		var pedTot = pedVal * pedQnt;
		$(this).text(parseFloat(pedTot).toFixed(2));
	});
	
	$('.pedTotalFinal').each(function() {
		var sum = 0.00;
		$(this).closest('table').find('.pedTotal').each(function() {
			sum += parseFloat($(this).text());
		});
		$(this).text(parseFloat(sum).toFixed(2));
	});
};