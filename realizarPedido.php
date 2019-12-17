<?php

/*
for($i = 0; $i < sizeof($_POST['idProd']); $i++){
	var_dump($_POST['idProd'][$i]);
	echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			$("#temp").append("<input class=\'hide\' name=\'idProd[]\' value=\'' . $_POST['idProd'][$i] . '\'>");
		});
	</script>';
}
echo '<script> $("#temp").submit(); </script>'
*/

$action = 'create';
$obj = 'pedido';
require('controller.php');

$action = 'create';
$obj = 'itemPed';
require('controller.php');

$action = 'updateCred2';
$obj = 'cliente';
require('controller.php');
?>