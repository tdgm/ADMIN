<?php 
inicializa();
function inicializa(){
	if(file_exists(dirname(__FILE__).'/config.php')):
		require_once(dirname(__FILE__).'/config.php');
	else:
		die(utf8_decode('O arquivo de configuração não foi localizado, contate o administrador.'));
	endif;
	if(!defined("BASEPATH") || !defined("BASEURL")):
		die(utf8_decode('Faltam configurações básicas do sistema, contate o administrador.'));
	endif;
	require_once(BASEPATH.CLASSESPATH.'autoload.php');		
}//inicializa
function loadCSS($arquivo=NULL,$media='all',$import=FALSE){
	if($arquivo !=NULL):
		if($import==TRUE):
			echo '<style type="text/css">@import url("'.BASEURL.CSSPATH.$arquivo.'.css");</style>'; 
		else:
			echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />';
		endif;
	endif;
}//loadCSS
function loadJS($arquivo=NULL,$remoto=FALSE){
	if($arquivo != NULL):
		if($remoto != TRUE) $arquivo = BASEURL.JSPATH.$arquivo.'.js';
		echo '<script type="text/javascript" src="'.$arquivo.'"></script>';
	endif;
}//loadJS	
?>