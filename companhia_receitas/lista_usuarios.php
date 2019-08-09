<?php
include "cabecalho.php";
include 'funcoes/class.php';

$teste=new Query();
$query='select * from usuario';
$teste->select($query);
//echo "<pre>";
//print_r($teste->dados[0]);
$blu=$teste->dados;
echo"<br>";

echo'<table class="ui celled table">
  	<thead>
    <tr><th>Cod User</th>
    <th>Nome</th>
    <th>Sobrenome</th>
    <th>Email</th>
    <th>Restricao</th>
    <th>Senha</th>
    <th>Editar</th>
    <th>Excluir</th>
 	 </tr></thead>
  <tbody>';
if(empty($blu)){
	echo'Sem dados';
}else{
foreach ($blu as $key => $value) {
echo'

    <tr>
    <td data-label="Cod User">'.$value['cod_user'].'</td>
      <td data-label="Nome">'.$value['nome'].'</td>
      <td data-label="Sobrenome">'.$value['sobrenome'].'</td>
      <td data-label="Email">'.$value['email'].'</td>
      <td data-label="Restricao">'.$value['restricao'].'</td>
      <td data-label="Senha">'.$value['senha'].'</td>
      <td data-label="Editar" >
      <a href="editar.php?id='.$value['cod_user'].'" >
		<button class="ui button">
  			Editar
		</button></a></td></a>
		<td data-label="Excluir" >
	<a href="controlers/controler.php?acao=excluir&id='.$value['cod_user'].'" >
			<button class="ui button red">
  			Excluir
		</button></a></td></a>
 
    </tr>';
}
echo '  </tbody>
		</table>';
	}
?>