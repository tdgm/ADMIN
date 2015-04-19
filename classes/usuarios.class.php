<?php 
	require_once(dirname(__FILE__).'/autoload.php');
	protegeArquivo(basename(__FILE__));

	class usuarios extends base {
		public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "usuarios";
			if(sizeof($campos)<=0):
				$this->campos_valores = array (
					"nome" => NULL,
					"email" => NULL,
					"login" => NULL,
					"senha" => NULL,
					"ativo" => NULL,
					"administrador" => NULL,
					"datacad" => NULL
				);
			else:
				$this->campos_valores = $campos;
			endif;
			$this->campoPk = "id";	
		}//construct
		public function doLogin($objeto){
			$objeto->extras_select = " WHERE login='".$objeto->getValor('login')."' AND senha='".codificaSenha($objeto->getValor('senha'))."' AND ativo='s'";
			$this->selecionaTudo($objeto);
			if($this->linhasAfetadas==1):
				return TRUE;
			else:
				return FALSE;
			endif;
		}//doLogin
	}//fim classe usuarios
?>

