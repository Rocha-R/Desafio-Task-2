<table border=1> <!--Pagina responsável por gerar a tabela com os dados cadastrados -->
        <tr>
              <th>Tarefa</th>
			  <th>Descricao</th>
              <th>Prioridade</th>
			  <th>Prazo</th>
              <th>Opções</th>
        </tr>
		
            <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
             <td>
			      <a href="tarefa.php?id=<?php echo $tarefa['id']; ?> ">
                  <?php echo $tarefa['nome']; ?>
             </td>
			 
			 <td>
             <?php echo $tarefa['descricao']; ?>
             </td>
			 
			 <td>
             <?php echo traduz_prioridade($tarefa['prioridade']); ?>
             </td>
			 
             <td>
             <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
             </td>
			 
			 
             <td>
              <a href="editar.php?id=<?php echo $tarefa['id']; ?> ">
               Editar
              </a>
			  
			  <a href="remover.php?id=<?php echo $tarefa['id']; ?>">
			  Remover
			  </a>
			  
             </td>
			 
     </tr>
	 
    <?php endforeach; ?>
	
</table>