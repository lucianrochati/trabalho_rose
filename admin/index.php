<?php require 'header.php';?>
<div class="container" style="margin-top:0px; ">
  <?php require 'menu.php';?>
  <div class="meio">
  <h2>Listando todas as Finanças</h2><br>
        <fieldset>
          <form class="bs-docs-example">
           Tipos
           <select>
              <option>Receitas Fixas</option>
              <option>Receitas Variáveis</option>
              <option>Despesas Fixas</option>
              <option>Despesas Variáveis</option>
            </select>
          </form>
        </fieldset>
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
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Receita</td>
            <td>Pagamento boleto</td>
            <td>R$1.000,00</td>
            <td>25/10/2013</td>
            <td>
                <span class="glyphicon glyphicon-edit"></span>
                <span class="glyphicon glyphicon-remove"></span>
            </td>
            
          </tr>
        </tbody>
    </table>
  </div>
  <div class="rodape">
      <span>Todos os direitos reservados a TADSN40</span>
  </div>
</div>