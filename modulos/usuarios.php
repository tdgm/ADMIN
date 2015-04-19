<?php 
require_once(dirname(dirname(__FILE__))."/functions.php");
protegeArquivo(basename(__FILE__));
switch ($tela):
	case 'login':
		?>
			<div id="loginform">
				<form class="userform" method="post" action="">
					<fieldset>
						<legend>Acesso restrito, identifique-se</legend>
						<ul>
							<li class="center">
								<label for="usuario" >Usuário:</label>
								<input type="text" size="35" name="usuario" value="<?php echo $_POST['usuario']; ?>" />
							</li>
							<li class="center">
								<label for="senha">Senha:</label>
								<input type="password" size="35" name="senha" value="<?php echo $_POST['senha']; ?>" />
							</li>
							<li class="center"><input type="submit" name="logar" value="Login" /></li>
						</ul>
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