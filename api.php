<?php	
@$action = isset($_POST['action'])?$_POST['action']:$action;
@$id = isset($_POST['id'])?$_POST['id']:$id;
@$domain = isset($_POST['domain'])?$_POST['domain']:$domain;

if($domain=='produto'){
	require 'controller/produto.controller.php';
}
?>