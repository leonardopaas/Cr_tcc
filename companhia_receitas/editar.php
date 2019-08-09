<?php 
include 'cabecalho.php';
include 'funcoes/class.php';
$t=new Query();
$txt='select * from usuario where cod_user = '.$_GET['id'].'';
$t->select($txt);
$dados=$t->dados;
?>
<section class="margem">
		<section class="mar">
			<section class="name">
				<h1>Editar Usuario</h1>
			</section>
		</section>
		<form method="post" action="controlers/controler.php?acao=editar">
			<section class="bar"></section>
			<div class="ui input tapa">
 				<input name='nome' type="text" placeholder="nome" value="<?php echo $dados[0]['nome']?>" required="">
			</div>
			<div class="ui input tapa1">
 				<input name='sobrenome' type="text" value="<?php echo $dados[0]['sobrenome']?>" placeholder="sobrenome">
			</div>
			<div class="ui input tapa2">
 				<input name='email' type="email" value="<?php echo $dados[0]['email']?>" placeholder="email" required="">
			</div>	
			<div class="ui input tapa3">
 				<input name='restricao' type="text" value="<?php echo $dados[0]['restricao']?>" placeholder="Restrição Alimentar">
			</div>
			<div class="ui input tapa4">
 				<input name='senha' type="text" value="<?php echo $dados[0]['senha']?>" placeholder="Senha" required="">
 				<input name='id' type="hidden" value="<?php echo $dados[0]['cod_user']?>" placeholder="Senha" required="">
			</div>
			</div>
			
			<div class="spa">
				<input type="submit" class="ui secondary button" value="Editar">
			</div>
</form>
</section>
<?php
