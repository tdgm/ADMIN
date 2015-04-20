<?php
require_once("functions.php");
protegeArquivo(basename(__FILE__));
 ?>
 <div id="sidebar">
 	<ul id="accordion">
 		<li><a href="<?php echo BASEURL ?>">Home</a></li>
 		<li><a class="item" href="#">Usuários</a>
	 		<ul>
	 			<li><a href="?m=usuarios&t=incluir">Cadastrar</a></li>
	 			<li><a href="?m=usuarios&t=listar">Exibir</a></li>	
	 		</ul>
 		</li>
 		<li><a class="item" href="#">Uploads</a>
	 		<ul>
	 			<li><a href="?m=upload&t=incluir">Enviar</a></li>
	 			<li><a href="?m=upload&t=listar">Exibir</a></li>	
	 		</ul>
 		</li>
 		<li><a href="?logoff=true">Sair</a></li>
 	</ul>
 </div><!-- sidebar end -->