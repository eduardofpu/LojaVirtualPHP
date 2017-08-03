<?php

$smarty =  new Template();


$clientes = new Clientes();

if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])):
    
$cli_id     = $_POST['cli_id'];   
$cli_nome      = $_POST['cli_nome'];
$cli_sobrenome = $_POST['cli_sobrenome'];
$cli_data_nasc = $_POST['cli_data_nasc'];
$cli_rg        = $_POST['cli_rg'];
$cli_cpf      = $_POST['cli_cpf'];
$cli_ddd       = $_POST['cli_ddd'];
$cli_fone      = $_POST['cli_fone'];
$cli_celular   = $_POST['cli_celular'];
$cli_endereco  = $_POST['cli_endereco'];
$cli_numero    = $_POST['cli_numero'];
$cli_bairro    = $_POST['cli_bairro'];
$cli_cidade    = $_POST['cli_cidade'];
$cli_uf        = $_POST['cli_uf'];
$cli_cep       = $_POST['cli_cep'];
$cli_email     = $_POST['cli_email'];
$cli_senha    =  "";
$cli_data_cad    =  "";
$cli_hora_cad    =  "";


// gravando os dados no banco
$clientes->Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha);


//executa o sql update
if(!$clientes->AlterarADM($cli_id)):
    echo '<div class="alert alert-danger">Ocorreu um erro ao gravar os dados</div>';
    exit();
    //caso passou na sql perfeitamente
    else:
        
        echo '<div class="alert alert-success">Dados alterados com sucesso!</div>';
        Rotas::Redirecionar(1, Rotas::pag_ClientesADM());
        
endif;  

 
//caso não tem o post ainda
else:

   // Passo o id do cliente, caso não passei uso  
    if(isset(Rotas::$pag[1])):
        
      $id= Rotas::$pag[1]; 
      else:
          $id=0;
    
    endif;
    
 // chamo o metodo que pega o cliente pelo ID   
$id= Rotas::$pag[1]; 
$clientes->GetClientesID($id);    
    
    
    
foreach ($clientes->GetItens()[1] as $campo => $valor):
    $smarty->assign(strtoupper($campo),$valor);// VALORES MAIUSCULOS EX  $_SESSION['CLI_NOME'] para manter o padrao do projeto

   // echo strtoupper($campo). '=>'.$valor.'<br>';// para visualizar a sessão
 
endforeach;


$smarty->display('adm_clientes_editar.tpl');


// fim da verificação se existe o post dos dados
endif;

