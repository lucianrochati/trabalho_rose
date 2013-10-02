<?php

class Conexao{

	private $usuario = "root";
	private $senha = "mais123";
	private $host = "localhost";
	private $banco = "financas";

	public function __construct(){
		$this->conectar();
	}

	protected function conectar(){
		mysql_connect($this->host, $this->usuario, $this->senha) or die(mysql_error());
			mysql_select_db($this->banco);
	}

}

?>