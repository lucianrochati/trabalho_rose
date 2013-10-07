<?php 
	session_start();
	require 'admin/header.php';
	require 'includes/Login.php';

	if(isset($_POST['logar']) == "true"){
		$Login = new Login();

		$Login->usuario = $_POST['usuario'];
		$Login->senha   = $_POST['senha'];

		$logar = $Login->validarDados();
	}

?>

<!-- Form Name -->
<legend>Cadastro Receita/Despesa</legend>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="descRceitaDespesa">Descrição</label>
  <div class="controls">                     
    <textarea id="descRceitaDespesa" name="descRceitaDespesa">Descrição...</textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="idTipo">Tipo</label>
  <div class="controls">
    <select id="idTipo" name="idTipo" class="input-medium">
      <option>Receitas Fixas</option>
      <option>Receitas Variáveis</option>
      <option>Despesas Fixas</option>
      <option>Despesas Variáveis</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="valor">Valor</label>
  <div class="controls">
    <input id="valor" name="valor" type="text" placeholder="R$120,50" class="input-medium" required="">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="salvar"></label>
  <div class="controls">
    <button id="salvar" name="salvar" class="btn btn-success">Cadastrar</button>
  </div>
</div>
<div class="container">
	<div class="meioLogin">
		<form class="form-inline" role="form" method="post">
			<input type="hidden" name="logar" value="true">
		  <div class="form-group">
		    <label for="exampleInputEmail2">E-mail</label>
		    <input name="usuario" type="email" class="form-control" id="exampleInputEmail2" placeholder="E-mail">
		  </div>
		  <div class="form-group">
		    <label  for="exampleInputPassword2">Senha</label>
		    <input name="senha" type="password" class="form-control" id="exampleInputPassword2" placeholder="Senha">
		  </div>
		<button type="submit" class="btn btn-default">Entrar</button>
		</form>
	</div>
</div>
<a href="http://localhost/rose">testE</a>
</body>
</html>