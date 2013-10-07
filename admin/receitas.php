<?php 
ini_set("display_errors",1);
  require 'header.php';
  require '../includes/Receitas.php';    

  $receitas = new Receitas("3,4");
  $dados = $receitas->listarReceitas();

  if(isset($_GET['acao']) && $_GET['acao'] == "remover" && $_GET['codigo'] >= 1){
      $financas->removeDados($_GET);
  }
?>
<div class="container" style="margin-top:0px; ">
  <?php require 'menu.php';?>
  <div class="meio">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Receitas</li>
    
  </ul>
  <h2>Listando todas as Receitas</h2><br>
   
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
          <td>Nenhuma receita encontrada</td>
          <?php }?>
             </tr>
        </tbody>
    </table>
  </div>
  <div class="rodape">
      <span>Todos os direitos reservados a TADSN40</span>
  </div>
</div>