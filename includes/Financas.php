<?php
	require_once dirname(dirname(__FILE__)).'/includes/dao/FinancasDAO.php';

	class Financas{

		private $FinancasDAO;
		private $codigo;
		private $codUsuario;
		private $tipo;
		private $idUsuario;
		private $descricao;
		private $valor;
		private $data;
		private $termo = "";

		public function __construct($termo = false){

			if($termo)
				$this->termo = $termo;

			$this->FinancasDAO = new FinancasDAO();
		
		}

		public function getDados(){
	
			$retorno = $this->FinancasDAO->select($this->termo);
			
			if($retorno)
				$objeto = $this->montarObjeto($retorno);
			if(isset($objeto))
				return $objeto;
	
		}

		public function getDadosForId(){
	
			$retorno = $this->FinancasDAO->selectForId($this->termo);

			if($retorno)
				$objeto = $this->montarObjeto($retorno);
			return $objeto[0];
	
		}

		
		public function updateDados($Array){

			$retorno = $this->FinancasDAO->update($Array);
			if($retorno)
					$this->retornoJS("", "Edição realizada com sucesso!!!");
				else
					$this->retornoJS("", "Houve um erro ao tentar executar sua solicitação");

		}

		public function insertDados($Array){
	
			if($Array){
				$retorno = $this->FinancasDAO->insert($Array);
				return $this->retornoJS("","Registro inserido com sucesso!!!");
			}
			

		}

		public function removeDados($Array){

			if($Array){
				$retorno = $this->FinancasDAO->remove($Array);
				if($retorno)
						$this->retornoJS("","Remoção realizada com sucesso!!");
					else
						$this->retornoJS("","Houve ao tentar remover esse registro, tente novamente mais tarde!!");
			}


		}
		public function search($array){

			$this->termo = $array;
			$retorno = $this->FinancasDAO->search($this->termo);
			
			if($retorno)
				$objeto = $this->montarObjeto($retorno);
			if(isset($objeto))
				return $objeto;

		}
		protected function montarObjeto(Array $Array){
		
			foreach($Array as $k => $get){
				$Financas = new self(1);

				if(isset($get['idReceitaDespesa']))
					$Financas->setCodigo($get['idReceitaDespesa']);
				if(isset($get['idTipo']))
					$Financas->setTipo($get['idTipo']);
				if(isset($get['idUsuario']))
					$Financas->setIdUsuario($get['idUsuario']);
				if(isset($get['descReceitaDespesa'])) 
					$Financas->setDescricao($get['descReceitaDespesa']);
				if(isset($get['valor']))
					$Financas->setValor($get['valor']);
				if(isset($get['data']))
					$Financas->setData($get['data']);

				$list[] = $Financas;
			}

			return $list;
		}

		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		public function getCodigo(){
			return $this->codigo;
		}

		public function setCodUsuario($codUsuario){
			$this->codUsuario = $codUsuario;
		}

		public function setTipo($tipo){
			$this->tipo = $tipo;
		}

		public function getTipo(){
			return $this->tipo;
		}

		public function setIdUsuario($id){
			$this->idUsuario = $id;
		}

		public function getIdUsuario(){
			return $this->idUsuario;
		}

		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function setValor($valor){
			$this->valor = $valor;
		}

		public function getValor(){
			return $this->valor;
		}

		public function setData($data){
			$this->data = $data;
		}

		public function getData(){
			return $this->data;
		}

		public function retornoJS($url, $msg){

			if(!$url && !$msg){
				
				$url  = $_SERVER['HTTP_REFERER'];
				$msg  = "Comando executado com sucesso!";
				die("<script>alert('{$msg}');window.location='{$url}';</script>");

			}else{
				die("<script>alert('{$msg}');window.location='{$_SERVER['HTTP_REFERER']}';</script>");
			}

			
		}

	}
?>