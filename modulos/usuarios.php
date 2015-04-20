<?php 
require_once(dirname(dirname(__FILE__))."/functions.php");
protegeArquivo(basename(__FILE__));
loadJS('jquery.validate.min');
loadJS('jquery.validate-messages.min');
switch ($tela):
	case 'login':
		$sessao = new sessao();
		if($sessao->getNvars()>0 || $sessao->getVar('logado')==TRUE) redireciona('painel.php');
		if(isset($_POST['logar'])):
			$user = new usuarios();
			$user->setValor('login', $_POST['usuario']);
			$user->setValor('senha', $_POST['senha']);
			if($user->doLogin($user)):
				redireciona('painel.php');
			else:
				redireciona('?erro=2');
			endif;
		endif;	
		?>
			<script type="text/javascript">
			$(document).ready(function(){
				$(".userform").validate({
					rules:{
						usuario:{required:true, minlength:3},
						senha:{required:true, rangelength:[4,10]},
					}
				});
			});
			</script>
			<div id="loginform">
				<form class="userform" method="post" action="">
					<fieldset>
						<legend>Acesso restrito, identifique-se</legend>
						<ul>
							<li>
								<label for="usuario" >Usuário:</label>
								<input type="text" size="35" name="usuario" value="<?php $_POST['usuario']; ?>" >
							</li>
							<li>
								<label for="senha">Senha:</label>
								<input type="password" size="35" name="senha" value="<?php $_POST['senha']; ?>" >
							</li>
							<li class="center"><input type="submit" name="logar" value="Login" ></li>
						</ul>
						<?php 
							$erro = $_GET['erro'];
							switch ($erro):
								case 1:
									echo '<div class="sucesso">Você fez logoff do sistema.</div>';
									break;
								case 2:
									echo '<div class="erro">Dados incorretos ou usuário inativo.</div>';
									break;
								case 2:
									echo '<div class="erro">Faça login para acessar a página.</div>';
									break;	
								default:
									echo '<div class="sucesso">Faça o login e entre no sistema.</div>';
									break;
							endswitch;
						?>
					</fieldset>
				</form>
			</div>
		<?php
		break;
	default:
		echo '<p>A tela solicidade não existe no sistema.</p>';
		break;
endswitch;
	
?>