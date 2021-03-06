<?php 
  ini_set("display_errors",1);
  require 'header.php';
  require '../includes/Despesas.php';    

  $despesas = new Despesas("1,2,3,4");
  $financas = new Financas();

  $dados = $despesas->listarDespesas();

  if(isset($_GET['acao']) && $_GET['acao'] == "remover" && $_GET['codigo'] >= 1){
      $financas->removeDados($_GET);
  }elseif(isset($_POST['acao']) == "buscar"){
      $dados = $financas->search($_POST);
  }else{
    $dados = $despesas->listarDespesas();
  }
?>
<div class="container" style="margin-top:0px; ">
  <?php require 'menu.php';?>
  <div class="meio">
   <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Todas Despesas/Receitas por Tipo/Período</li>
    
  </ul>
  <h2>Listando todas as Receitas/Despesas por Tipo/Período</h2><br>
  <form name="buscar" action="" method="post">
    <input type="hidden" name="acao" value="buscar"/>
  <div class="well">
  <div id="datetimepicker1" class="input-append date">
    <input data-format="dd/MM/yyyy" type="text" name="data1" placeholder="<?php echo date("d/m/y");?>"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" class="icon-calendar">
      </i>
    </span>
    entre
  </div>
  <div id="datetimepicker2" class="input-append date">
    <input data-format="dd/MM/yyyy" type="text" name="data2" placeholder="<?php echo date("d/m/y");?>"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" class="icon-calendar">
      </i>
    </span>
  </div>
  <div class="input-append date">

    <select id="subject" name="tipo" class="span3">
         <option value="0" selected="">Selecione</option>
        <option value="1">Despesas Fixas:</option>
        <option value="2">Despesas Variáveis</option>
        <option value="3">Receitas Fixas</option>
        <option value="4">Receitas Variáveis</option>
      </select>
    <span class="add-on">
      <i data-time-icon="icon-time" class="icon-list-alt">
      </i>
    </span>
    <button id="salvar" name="salvar" class="btn btn-success">Atualizar</button>
  </div>
 </form>
</div>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datepicker({
      format: "dd/mm/yy",
      language: 'pt-BR'
    });

     $('#datetimepicker2').datepicker({
      format: "dd/mm/yy",
      language: 'pt-BR'
    });
  });
</script>
    <table class="table table-striped" style="margin-top:10px;">
      <tr>
            <th>Código</th>
            <th>Código Usuário</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
     <tbody>
         <?php 
          if($dados != ""){
            foreach($dados as $k => $get){

          ?>

          <tr>
            <td><?php echo $get->getCodigo();?></td>
            <td><?php echo $get->getIdUsuario();?></td>
             <td><?php if($get->getTipo() == "1") echo "Receitas Fixas"; elseif($get->getTipo() == "2") echo "Receitas Variáveis"; elseif($get->getTipo() == "3") echo "Despesas Fixas"; else echo "Receitas Variáveis"; ?></td>
            <td><?php echo $get->getDescricao();?></td>
            <td><?php echo $get->getValor();?></td>
            <td><?php echo $get->getData();?></td>
            <td>
                <a href="editar.php?codigo=<?php echo $get->getCodigo();?>"><span class="icon-edit"></span></a>
                <a href="?acao=remover&codigo=<?php echo $get->getCodigo();?>"><span class="icon-remove-sign"></span></a>
            </td>
        <?php }
          }else{?>
          <td>Nenhum regustri encontrado</td>
          <?php }?>
          </tr>
        </tbody>
    </table>
  </div>
  <div class="rodape">
      <span>Todos os direitos reservados a TADSN40</span>
  </div>
</div>