<?php
if(isset($_SESSION['rmCli'])){
	header('Location:index.php?link=6');
} else if(isset($_SESSION['codEtec'])){
	header('Location:index.php?link=9');
} else {
	header('Location:index.php?link=1');
}
?>