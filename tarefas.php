<?php session_start(); 

      include "banco.php"; 
	  include "helpers.php";
	  
	  $exibir_tabela = true; 
?>


	   <?php
	   
	   $tem_erros = false;
	   $erros_validacao = array();
	   
	       if (tem_post()) {
				 
			$tarefa = array();

                if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
				    $tarefa['nome'] = $_POST['nome'];
				} 
				  else {
				     $tem_erros = true;
					 $erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
				  }

			if (isset($_POST['descricao'])) {
                  $tarefa['descricao'] = $_POST['descricao'];
				  }
                else {
                      $tarefa['descricao'] = '';
                 }			 
			
			
			$tarefa['prioridade'] = $_POST['prioridade'];
            
			 if (isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
			    if (validar_data($_POST['prazo'])) {
                   $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
				 
				  }
				   else {
				       $tem_erros = true;
					   $erros_validacao['prazo'] = 'O prazo não é uma data válida!';
				   }
				}   
                else {
                      $tarefa['prazo'] = '';
                 }	

			if (! $tem_erros) {	 
				 
		     gravar_tarefa($conexao, $tarefa);
			 
			 header('Location: tarefas.php');
			 die();
			 
			 }
		}		
		
		$lista_tarefas = buscar_tarefas($conexao);	 
						
		
		$tarefa = array(
                'id'          => 0,
                'nome' 		  => (isset($_POST['nome'])) ? $_POST['nome'] : '',
				'descricao'   => (isset($_POST['descricao'])) ? $_POST['descricao'] : '',
				'prioridade'  => (isset($_POST['prioridade'])) ? $_POST['prioridade'] : 1,
				'prazo'       => (isset($_POST['prazo'])) ? traduz_data_para_banco($_POST['prazo']) : ''
				);
				 
		
            			 
			include "template.php"; 
			
	      
	   ?>
	   