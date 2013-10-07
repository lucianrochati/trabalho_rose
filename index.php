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
</body>
</html>