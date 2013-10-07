<?php 
  ini_set("display_errors",1);
  require 'header.php';
  require '../includes/Financas.php';
  
  $financas = new Financas($_GET['codigo']);
  $dados = $financas->getDadosForId();

  if(isset($_POST['acao']) == "editar"){
    $financas->updateDados($_POST);
  }
?>
<div class="container" style="margin-top:0px; ">
  <?php require 'menu.php';?>
  <div class="meio clearfix">
    <br>
 <ul class="breadcrumb">
  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
  <li><a href="receitas_despesas.php">Listar todas Receitas/Despesas</a> <span class="divider">/</span></li>
  <li class="active">Editando registro</li>
</ul>
  <form class="form-horizontal" action="" name="editar" method="post">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="codigo" value="<?php echo $dados->getCodigo();?>">
    <fieldset>

    <!-- Form Name -->
    <legend>Cadastro Receita/Despesa</legend>

    <!-- Select Basic -->
    <div class="control-group">
      <label class="control-label" for="idTipo">Tipo</label>
      <div class="controls">
        <select id="idTipo" name="idTipo" class="input-large">
          <option value="1" <?php if($dados->getTipo() == "1") echo "selected";?>>Receitas Fixas</option>
          <option value="2" <?php if($dados->getTipo() == "2") echo "selected";?>>Receitas Variáveis</option>
          <option value="3" <?php if($dados->getTipo() == "3") echo "selected";?>>Despesas Fixas</option>
          <option value="4" <?php if($dados->getTipo() == "4") echo "selected";?>>Despesas Variáveis</option>
        </select>
      </div>
    </div>

    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="valor">Valor</label>
      <div class="controls">
        <input id="valor" name="valor" type="text" value="<?php echo $dados->getValor();?>"  class="input-large" required="">
        
      </div>
    </div>
    <div class="control-group">
         <label class="control-label" for="data">Data</label>
        <div class="controls">
         <div id="datetimepicker1" class="input-append date">
        <input data-format="dd/MM/yyyy hh:mm:ss" name="data" value="<?php echo $dados->getData();?>" id="data" type="text"></input>
        <span class="add-on">
          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
          </i>
        </span>
      </div>
    </div>

    <!-- Textarea -->
    <div class="control-group" style="margin-top:20px;">
      <label class="control-label" for="descReceitaDespesa">Descrição</label>
      <div class="controls">                     
        <textarea id="descReceitaDespesa" name="descReceitaDespesa"><?php echo $dados->getDescricao();?></textarea>
      </div>
    </div>

    <script type="text/javascript">
      $(function() {
        $("#valor").maskMoney();

        $('#datetimepicker1').datepicker({
          format: "dd/mm/yy",
         language: 'pt-BR'
         });
      });
    </script>
    </div>
    <!-- Button -->
    <div class="control-group">
      <label class="control-label" for="salvar"></label>
      <div class="controls">
        <button id="salvar" name="salvar" class="btn btn-success">Atualizar</button>
      </div>
    </div>

    </fieldset>

    </form>

  </div>
 </div>