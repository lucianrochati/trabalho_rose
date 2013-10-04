<?php
	require_once dirname(dirname(__FILE__)).'/includes/dao/FinancasDAO.php';

	class Financas{

		public $FinancasDAO;
		public $codigo;
		public $codUsuario;
		public $tipo;
		public $idUsuario;
		public $descricao;
		public $valor;
		public $data;
		public $termo = "";

		public function __construct($termo){

			if($termo)
				$this->termo = $termo;

			$this->FinancasDAO = new FinancasDAO();
		}

		public function getDados(){

			$retorno = $this->FinancasDAO->select($this->termo);
			if($retorno)
				$receitas = $this->montarObjeto($retorno);
			return $receitas;
	
		}

		public function montarObjeto(Array $array){
			
			foreach($array as $k => $get){
				$Financas = new self(1);
				$Financas->setCodigo($get['idReceitaDespesa']);
				$Financas->setTipo($get['idTipo']);
				$Financas->setIdUsuario($get['idUsuario']);
				$Financas->setDescricao($get['descReceitaDespesa']);
				$Financas->setValor($get['valor']);
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

	}
?>