<?php 
require_once dirname(dirname(dirname(__FILE__))).'/includes/Conexao.php';

class FinancasDAO extends Conexao{
	
	public function __construct(){
		$this->conectar();
	}
	public function select($termo){

		try{

			$sql = "SELECT * FROM receitaDespesa WHERE idTipo IN ({$termo})";
			$exec = mysql_query($sql) or die(mysql_error());
			
			while($resultado = mysql_fetch_array($exec)){
				$dados[] = $resultado;
			}

			return $dados;


		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}

	}

	public function selectForId($termo){

		try{

			$sql = "SELECT * FROM receitaDespesa WHERE idReceitaDespesa  = {$termo}";
			$exec = mysql_query($sql) or die(mysql_error());
			
			while($resultado = mysql_fetch_array($exec)){
				$dados[] = $resultado;
			}

			return $dados;


		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}

	}

	public function update($Array){

		try{

			$sql = "UPDATE receitaDespesa SET 
					descReceitaDespesa = '{$Array['descReceitaDespesa']}',
					idTipo = {$Array['idTipo']},
					valor = {$Array['valor']},
					data = {$Array['data']}
					WHERE
						idReceitaDespesa = {$Array['codigo']}";
				;

			$exec = mysql_query($sql) or die(mysql_error());
		
			if($exec)
				return true;
				else
					return false;

		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}

	}

	public function insert($Array){

		try{

			$sql = "INSERT INTO receitaDespesa (idTipo,idUsuario,descReceitaDespesa,valor,data)
			VALUES 
			(
				{$Array['idTipo']},
				'1',
				'{$Array['descReceitaDespesa']}',
				{$Array['valor']},
				'".date("d/m/Y")."')";

			$exec = mysql_query($sql) or die(mysql_error());
			

		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}

	}

	public function remove($Array){

		try{

			$sql = "DELETE FROM receitaDespesa WHERE idReceitaDespesa = '{$Array['codigo']}'";
			$exec = mysql_query($sql) or die(mysql_error());

			if($exec)
					return true;
				else
					return false;


		 }catch (Exception $e) {
 			echo "Exceção pega: ",  $e->getMessage(), "\n";die;
  		}


	}
}
?>