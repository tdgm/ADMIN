<?php
require_once("functions.php");
protegeArquivo(basename(__FILE__));
verificaLogin();
$sessao = new sessao();
 ?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
	  	<meta charset="UTF-8"/>
	 	<title>Thiago Del | Desenvolvimento Web</title>
	 	<link rel="shortcut icon" href="img/favicon.ico"/>
	 	<?php 
	 		loadCSS('reset');
	 		loadCSS('style');
	 	 	loadJS('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',true);
	 	 	loadJS('functions');
	 	 ?>
	</head>
	<body>
		<div class="painel">
			<div id="wrapper">
				<div id="header">
					<h1>Painel de Controle</h1>
				</div><!-- header -->
				<div id="wrap-content">
					
				