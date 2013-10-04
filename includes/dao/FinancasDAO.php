<?php 
require_once dirname(dirname(dirname(__FILE__))).'/includes/Conexao.php';

class FinancasDAO extends Conexao{
	
	public function __construct(){
		$this->conectar();
	}
	public function select($termo){

		try{

			$sql = "SELECT * FROM receitaDespesa WHERE idTipo IN ('{$termo}')";
			$exec = mysql_query($sql) or die(mysql_error());
			
			while($resultado = mysql_fetch_array($exec)){
				$dados[] = $resultado;
			}

			return $dados;


		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}

	}
}
?>