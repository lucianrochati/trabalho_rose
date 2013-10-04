<?php 
ini_set("display_errors",1);
  require 'header.php';
  require '../includes/Despesas.php';    

  $despesas = new Despesas("1,2");
  $dados = $despesas->listarDespesas();

?>
<div class="container" style="margin-top:0px; ">
  <?php require 'menu.php';?>
  <div class="meio">
  <h2>Listando todas as Despesas</h2><br>
   
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
            <td><?php echo $get->getTipo();?></td>
            <td><?php echo $get->getDescricao();?></td>
            <td><?php echo $get->getValor();?></td>
            <td><?php echo $get->getData();?></td>
            <td>
                <span class="glyphicon glyphicon-edit"></span>
                <span class="glyphicon glyphicon-remove"></span>
            </td>
            
          
        <?php }
          }else{?>
          Nenhuma despesa encontrada
          <?php }?>
          </tr>
        </tbody>
    </table>
  </div>
  <div class="rodape">
      <span>Todos os direitos reservados a TADSN40</span>
  </div>
</div>