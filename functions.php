<?php 
inicializa();
protegeArquivo(basename(__FILE__));

function inicializa(){
	if(file_exists(dirname(__FILE__).'/config.php')):
		require_once(dirname(__FILE__).'/config.php');
	else:
		die(utf8_decode('O arquivo de configuração não foi localizado, contate o administrador.'));
	endif;
	$constantes = array('BASEPATH','BASEURL','ADMURL','CLASSESPATH','MODULOSPATH','CSSPATH','JSPATH','DBHOST','DBUSER','DBPASS','DBNAME');
	foreach ($constantes as $valor):
		if(!defined($valor)):
			die(utf8_decode('Faltam configurações básicas do sistema,'.$valor));
		endif;
	endforeach;
	require_once(BASEPATH.CLASSESPATH.'autoload.php');
	if($_GET['logoff']==TRUE):
		$user = new usuarios();
		$user->doLogout();
		exit;
	endif;			
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
function loadModulo($modulo=NULL,$tela=NULL){
	if ($modulo==NULL || $tela==NULL):
		echo '<p>Errona função <strong>'.__FUNCTION__.'</strong>: faltam parâmetros para execução.';
	else:
		if(file_exists(MODULOSPATH."$modulo.php")):
			include_once(MODULOSPATH."$modulo.php");
		else:
			echo '<p>Módulo inexistente neste sistema, contate o administrador.</p>';
		endif;
	endif;
}//loadModulo
function protegeArquivo($nomeArquivo,$redirPara='index.php?erro=3'){
	$url = $_SERVER["PHP_SELF"];
	if(preg_match("/$nomeArquivo/i", $url)):
		redireciona($redirPara);
	endif;
}//protegeArquivo
function redireciona($url=''){
	header("Location: ".BASEURL.$url);
}//redireciona
function codificaSenha($senha){
	return md5($senha);
}//codificaSenha
function verificaLogin(){
	$sessao = new sessao();
	if($sessao->getNvars()<=0 || $sessao->getVar('logado')!=TRUE):
		redireciona('?erro=3');
	endif;
}//verificLogin

?>