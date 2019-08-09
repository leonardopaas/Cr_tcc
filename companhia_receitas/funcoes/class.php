<?php
//include 'conection.php';

class Conection{
	private $conn;
	public $dados;

	public function __construct(){
		 try {
		$this->conn= new PDO('mysql:host=localhost;dbname=receitas', 'root', '');
	}catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
	}

	/*public function select($query){

		 try {
		$this->conn= new PDO('mysql:host=localhost;dbname=receitas', 'root', 'root');
	
    $stm=prepare($query);
     print_r($stm);


    while($conteudo =$stmt->fetch(PDO::FETCH_ASSOC)){
    	$this->dados[]=$conteudo;
    }
    }
  }*/
}

class Query{

  	public $dados;
  	//public $query

   public function select($query){
  try {

    $conn = new PDO('mysql:host=localhost;dbname=receitas', 'root', '');
    $stmt = $conn->prepare($query);
     $stmt->execute();


    while($conteudo =$stmt->fetch(PDO::FETCH_ASSOC)){
    	$this->dados[]=$conteudo;
    	//print_r($this->dados);
    }
  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
  }

  public function input($query){
  	try {
    $conn = new PDO('mysql:host=localhost;dbname=receitas', 'root', '');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($query);

     echo $stmt->rowCount();
     $stmt->execute();
  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
  }
  }

/*$con=new Query;
$con->select('select * from cidade');
print_r($con);*/


class Usuario{
	private $id_usuario;
	public $nome;
	public $sobrenome;
	public $email;
	public $senha;
	public $tipo_usuario;
	//public $ftperfil;


	public function logar($email,$senha){
		$query=new Query();
		$query->select('select * from usuario where email_usuario = "'.$email.'"');
		$ab=$query->dados[0]['senha'];
		echo'<pre>';
		//print_r($query->dados);
		if ($ab==$senha) {
			
			$_SESSION['logado']=array('id_usuario' => $query->dados[0]['id_usuario'],
						  				'nome' => $query->dados[0]['nome_usuario'],
						  				'sobrenome' => $query->dados[0]['sobrenome'],
						  			'email' => $query->dados[0]['email_usuario'],
						  			'data_nasc' => $query->dados[0]['data_nascimento'],
						  			'senha' => $query->dados[0]['senha']
						  			);




			header("Refresh: 0; url = index.php");
		}else{
			header("Refresh: 0; url = login.php?s=i");
		}


		/*$this->nome=$nome;
		$this->sobrenome=$sobrenome;
		$this->email=$email;
		$this->senha=$senha;
		$this->tipo_usuario=$tipo_usuario;*/
	}

	public function editar($nome,$sobrenome,$email,$restricao,$senha,$id){
		$insert='update usuario set nome= "'.$nome.'",sobrenome ="'.$sobrenome.'",email="'.$email.'",restricao ="'.$restricao.'",senha="'.$senha.'" where cod_user = '.$id.'';
		//print_r($insert);
		$query=new Query();
		$query->input($insert);
		unset($query);
		header("Refresh: 0; url = ../lista_usuarios.php");	
		//header("Refresh: 0; url = controler.php?acao=logout");

	}

	public function cadastrar($nome,$sobrenome,$email,$restricao,$senha){
		
		$insert='insert into usuario(nome,tipo_user,sobrenome,email,restricao,senha) values("'.$nome.'",0,"'.$sobrenome.'","'.$email.'","'.$restricao.'","'.$senha.'")';

		//echo'<pre>';
	//print_r($insert);
		$query=new Query();
		$query->input($insert);
		unset($query);

		//print_r($insert);
	}
	public function excluir($id){
		$delete='delete from usuario where cod_user ='.$id.'';
		$query=new Query;
		$query->input($delete);
		unset($query);
		header("Refresh: 0; url = ../lista_usuarios.php");	
		//header("Refresh: 0; url = controler.php?acao=logout");
	}

}



