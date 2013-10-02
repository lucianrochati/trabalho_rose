<?php
require_once 'dao/LoginDAO.php';
class Login{

	public $usuario;
	public $senha;
	private $login;

	public function __construct(){
		$this->login  = new LoginDAO();
	}

	public function validarDados(){
		$retorno = $this->login->consultarUsuario($this->usuario, $this->senha);
		if($retorno)
			echo "<script>window.location='admin/index.php';</script>";
		else
			echo "<script>alert('Login ou senha incorretos, tente novamente');</script>";	
	}

}
?>