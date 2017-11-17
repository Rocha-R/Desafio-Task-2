<form method="POST"> <!--Pagina responsável por gerar o formulario -->
     
	    <input type="hidden" name="id" 
		        value="<?php echo $tarefa['id']; ?>" />
     
      <fieldset>
             <legend>Nova Task</legend>
			 
             <label>
                Tarefa:
				<?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
				   <span class="erro">
				       <?php echo $erros_validacao['nome'];?>
				   </span>
                <?php endif; ?>				   
                        <input type="text" name="nome"
                        value="<?php echo $tarefa['nome']; ?>" />
				        
             </label>
			 <p>
			 
			 <label>
                Descrição (Opcional):
                <textarea name="descricao">
				    <?php echo $tarefa['descricao']; ?>
				</textarea>
             </label>
			 <p>
			 
			 <fieldset>
	  
              <legend>Prioridade:</legend>
			  

			  <input type="radio" name="prioridade" value="1" 
                <?php echo ($tarefa['prioridade'] == 1)
				
				
				      ? 'checked' 
				      : '';       
			    ?> /> Baixa
			   
              <input type="radio" name="prioridade" value="2" 
			    <?php echo ($tarefa['prioridade'] == 2)
				      ? 'checked'
					  : '';
			    ?>/> Média
			   
              <input type="radio" name="prioridade" value="3" 
			    <?php echo ($tarefa['prioridade'] == 3)
				      ? 'checked'
					  : '';
			    ?>/> Média/Alta
			   
			   <input type="radio" name="prioridade" value="4" 
			    <?php echo ($tarefa['prioridade'] == 4)
				      ? 'checked'
					  : '';
			    ?>/> Alta
				
				<input type="radio" name="prioridade" value="5" 
			    <?php echo ($tarefa['prioridade'] == 5)
				      ? 'checked'
					  : '';
			    ?>/> Grave
			   
      </fieldset>
	            <p>
			 
			 
             <label>
                Prazo (Opcional):
				<?php if ($tem_erros && isset($erros_validacao['prazo'])) : ?>
                    <span class="erro">
                         <?php echo $erros_validacao['prazo']; ?>
                    </span>
                <?php endif; ?>
				
                <input type="text" name="prazo" 
				   value="<?php 
				        echo traduz_data_para_exibir($tarefa['prazo']); 
				   ?>" />
             </label>
             <p>
			 
                 <input type="submit" value="
				
				     <?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>
				 " />
			
      </fieldset>
	  
</form>
	  
				
				
				
				
				
				
				
				
				
				
				
				
				