<?php
include "cabecalho.php";
?>
<section class="margem">
		<section class="mar">
			<section class="name">
				<h1>Cadastro Usuario</h1>
			</section>
		</section>
		<form method="post" action="controlers/controler.php?acao=cadastrar">
			<section class="bar"></section>
			<div class="ui input tapa">
 				<input name='nome' type="text" placeholder="nome" required="">
			</div>
			<div class="ui input tapa1">
 				<input name='sobrenome' type="text" placeholder="sobrenome">
			</div>
			<div class="ui input tapa2">
 				<input name='email' type="email" placeholder="email" required="">
			</div>	
			<div class="ui input tapa3">
 				<input name='restricao' type="text" placeholder="Restrição Alimentar">
			</div>
			<div class="ui input tapa4">
 				<input name='senha' type="password" placeholder="Senha" required="">
			</div>
			
			<div class="spa">
				<input type="submit" class="ui secondary button" value="Enviar">
			</div>
</form>
	

	</section>