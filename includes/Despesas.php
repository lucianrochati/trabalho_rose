<?php
	
	require_once dirname(__FILE__).'/Financas.php';

	class Despesas extends Financas{

		public $termo = 1;
		
		function __construct($termo){
			if($termo)
				$this->termo = $termo;
			
			parent::__construct($this->termo);
		
		}
		public function listarDespesas(){

			$receitas = parent::getDados();
			return $receitas;
		}
	}
?>