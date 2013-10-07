<?php 
  ini_set("display_errors",1);
  require 'header.php';
  require '../includes/Financas.php';

 if(isset($_POST['acao']) == "cadastrar"){
    $financas = new Financas();
    $financas->insertDados($_POST);
 }
?>

<div class="container" style="margin-top:0px; ">
  <?php require 'menu.php';?>
  <div class="meio clearfix">
    <br>
    <ul class="breadcrumb">
  <li><a href="index.php">Home</a> <span class="divider">/</span></li>
  <li><a href="receitas_despesas.php">Listar todas Receitas/Despesas</a> <span class="divider">/</span></li>
  <li class="active">Nova Receita/Despesa</li>
</ul>
  <form class="form-horizontal" action="" name="cadastro" method="post">
    <input type="hidden" name="acao" value="cadastrar">
    <fieldset>

    <!-- Form Name -->
    <legend>Cadastro Receita/Despesa</legend>

    

    <!-- Select Basic -->
    <div class="control-group">
      <label class="control-label" for="idTipo">Tipo</label>
      <div class="controls">
        <select id="idTipo" name="idTipo" class="input-medium">
          <option value="1">Receitas Fixas</option>
          <option value="2">Receitas Variáveis</option>
          <option value="3">Despesas Fixas</option>
          <option value="4">Despesas Variáveis</option>
        </select>
      </div>
    </div>

    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="valor">Valor</label>
      <div class="controls">
        <input id="valor" name="valor" id="valor"type="text" placeholder="R$120,50" class="input-medium" required="">
        
      </div>
    </div>
    <div class="control-group">
         <label class="control-label" for="data">Data</label>
        <div class="controls">
         <div id="datetimepicker1" class="input-append date">
        <input data-format="dd/MM/yyyy hh:mm:ss" name="data" id="data" type="text"></input>
        <span class="add-on">
          <i class="icon-calendar" data-date-icon="icon-calendar">
          </i>
        </span>
      </div>
    </div>
    <!-- Textarea -->
    <div class="control-group" style="margin-top:20px;">
      <label class="control-label" for="descReceitaDespesa">Descrição</label>
      <div class="controls">                     
        <textarea id="descReceitaDespesa" name="descReceitaDespesa" placeholder="Descrição.."></textarea>
      </div>
    </div>
 
    </div>
    <!-- Button -->
    <div class="control-group">
      <label class="control-label" for="salvar"></label>
      <div class="controls">
        <button id="salvar" name="salvar" class="btn btn-success">Cadastrar</button>
      </div>
    </div>

    </fieldset>

    </form>

  </div>
 </div>
    <script type="text/javascript">
      $(function() {

         $('#datetimepicker1').datepicker({
          format: "dd/mm/yy",
         language: 'pt-BR'
         });


        $("#valor").maskMoney();
        $('#datetimepicker1').datetimepicker({
          language: 'pt-BR'
        });
      });
    </script>