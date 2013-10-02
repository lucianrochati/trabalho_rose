<?php 
require_once 'includes/Conexao.php';
class LoginDAO extends Conexao{
	
	public function __construct(){
		$this->conectar();
	}
	public function consultarUsuario($login, $senha){

		try{

			$sql = "SELECT login, senha FROM usuario WHERE login = '{$login}' AND senha = '{$senha}'";
			$exec = mysql_query($sql) or die(mysql_error());

			if(mysql_num_rows($exec) != ""){

				$_SESSION['usuario'] = $login;
					return true;
				}else{
					$retorno = false;
				}
			return $retorno;

		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}

	}
}
?>