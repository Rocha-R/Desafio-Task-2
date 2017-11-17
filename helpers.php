<?php

function traduz_prioridade($codigo)
{
     $prioridade = '';
	 switch ($codigo) {
	  case 1:
	        $prioridade = 'Baixa';
			break;
		
      case 2:
            $prioridade = 'Média';
            break;
 
      case 3:
            $prioridade = 'Média/Alta';
            break;
			
	  case 4:
            $prioridade = 'Alta';
            break;

      case 5:
            $prioridade = 'Grave';
            break;			
        }
     return $prioridade;
    }


function traduz_data_para_banco($data)
{
    if ($data == "") {//Caso o campo Data(que é opcional) esteja vazio
        return "";//o mesmo devolve uma string vazia, que é gravado ao banco.
    }

    $dados = explode("/", $data);//Array "$dados" que rebebe o conteúdo
	//de $data SEM as "/".

	if (count($dados) != 3) {
	   return $data;
	}
	
    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    /*Quando separamos a string da data, temos um array em que 
	o índice zero é o dia, o índice 1 é o mês e o índice 2 é o ano. 
	
	Basta construir uma nova string com os dados nas posições corretas
	e separando como traço, assim temos o formato esperado pelo
    MySQL. 
	*/
	
	
    return $data_mysql;
}


function traduz_data_para_exibir($data)
{ 
       if ($data == "" OR $data == "0000-00-00") {
           return "";
		   //o if logo no começo faz duas verificações,
           //pois a data no banco pode estar em branco ou 
		   //pode estar como uma string “0000-00-00”.
       }

        $dados = explode("-", $data);

		if (count($dados) != 3) {
	         return $data;
	     }
		
        $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

        return $data_exibir;
}

function tem_post()
{
    if (count($_POST) > 0) {
	    return true;
		}
		
		return false;

}

function validar_data($data)
{
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
	$resultado = preg_match($padrao, $data);
	
	if (! $resultado) {
	    return false;
		}
		
	$dados = explode('/', $data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];
	
	$resultado = checkdate($mes, $dia, $ano);
	
	return $resultado;
}

function tratar_anexo($anexo) {
       $padrao = '/^.+(\.pdf|\.zip)$/';
	   $resultado = preg_match($padrao, $anexo['name']);
	   
	   if (! $resultado) {
	      return false;
	   }
	   
	   move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");
	  
	  return true;  
	}
?>