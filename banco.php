<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'systemtask';
$bdSenha = 'taskvoxus'; //Sempre há problema se naõ for criado como localhost
$bdBanco = 'task';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
   echo "Problemas para conectar no banco. Verifique os dados!";
   die();
   }

   
   function buscar_tarefas($conexao)
   {
         $sqlBusca = 'SELECT * FROM taskn2';
		 $resultado = mysqli_query($conexao, $sqlBusca);
		 
		 $tarefas = array();
		 
		 while ($tarefa = mysqli_fetch_assoc($resultado)) {
		    
			 
			 $tarefas[] = $tarefa;
			 
			 }
			 return $tarefas;
		}

   
   function	gravar_tarefa($conexao, $tarefa)
    { 
		
      $sqlGravar = "
         INSERT INTO taskn2
         (nome, descricao, prioridade, prazo)
         VALUES
         (
            '{$tarefa['nome']}',
			'{$tarefa['descricao']}',
            {$tarefa['prioridade']},
			'{$tarefa['prazo']}'
         )
     ";
	   
       mysqli_query($conexao, $sqlGravar); 
   }
   
   
   function buscar_tarefa($conexao, $id) {
      $sqlBusca = 'SELECT * FROM taskn2 WHERE id = ' . $id;
	  $resultado = mysqli_query($conexao, $sqlBusca);
	  
	  return mysqli_fetch_assoc($resultado);
	  }
	  
	  
	  
	  
  function editar_tarefa($conexao, $tarefa)
    {
      $sqlEditar = "
	  UPDATE taskn2 SET
         nome = '{$tarefa['nome']}',
		 descricao = '{$tarefa['descricao']}',
         prioridade = {$tarefa['prioridade']},
         prazo = '{$tarefa['prazo']}'		 
      WHERE id = {$tarefa['id']}
        ";

     mysqli_query($conexao, $sqlEditar);
    }	 
	
	
	function remover_tarefa($conexao, $id)
	{
	     $sqlRemover = "DELETE FROM taskn2 WHERE id = {$id}";
		
		 
		 mysqli_query($conexao, $sqlRemover);
     }
	 
	 
function gravar_anexo($conexao, $anexo)
{
    $sqlGravar = "INSERT INTO anexos
                    (taskn2_id, nome, arquivo)
                     VALUES
                      (
                        {$anexo['taskn2_id']},
                       '{$anexo['nome']}',
                       '{$anexo['arquivo']}'
                      )
                  ";
				  
                    mysqli_query($conexao, $sqlGravar);
}


function buscar_anexos($conexao, $tarefa_id)
{
        $sql = "SELECT * FROM anexos WHERE taskn2_id = {$tarefa_id}";
        $resultado = mysqli_query($conexao, $sql);
      
	    $anexos = array();

		while ($anexo = mysqli_fetch_assoc($resultado)) {
           $anexos[] = $anexo;
        }
		
		return $anexos;
}


?>