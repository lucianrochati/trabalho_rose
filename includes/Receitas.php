<?php
	
	require_once dirname(__FILE__).'/Financas.php';

	class Receitas extends Financas{

		public $termo = 1;
		
		function __construct($termo){
			if($termo)
				$this->termo = $termo;
			
			parent::__construct($this->termo);
		
		}
		public function listarReceitas(){

			$receitas = parent::getDados();
			return $receitas;
		}
	}
?>