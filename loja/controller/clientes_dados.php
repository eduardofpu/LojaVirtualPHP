<?php

$smarty =  new Template();
//chamando menu de cliente logado
Login::MenuClientes();


if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])):
   
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
$cli_senha    =  $_POST['cli_senha'];
$cli_data_cad    = $_SESSION['CLI']['cli_data_cad'];
$cli_hora_cad    = $_SESSION['CLI']['cli_hora_cad']; 

//verificar se a senha atual esta correta
if($_SESSION['CLI']['cli_pass']!= Sistema::Criptografia($cli_senha)):
        echo '<div class="alert alert-danger">';
        Sistema::VoltarPagina();
        echo '  A senha atual está incorreta</div>';
        exit();
endif;

// gravando os dados no banco

$clientes = new Clientes();
$clientes->Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha);


//executa o sql update
if(!$clientes->Alterar($_SESSION['CLI']['cli_id'])):
    echo '<div class="alert alert-danger">Ocorreu um erro ao gravar os dados</div>';
    exit();
    //caso passou na sql perfeitamente
    else:
        
  
    
 //terminando as alterações  passo uma mensagem 
// echo '<div class="alert alert-success">Dados alterados com sucesso!</div>';
    
    //Forçar o login novamente        
 $login = new Login();
 $login->GetLogin($cli_email, $cli_senha);
        //Depois de forçar o login chama a pagina clientes_dados
        Rotas::Redirecionar(3, Rotas::pag_ClienteDados());
        
endif;  

 
//caso não tem o post ainda
else:
    
    //passando as variaveis para o template---------------------------------

//varrendo o array da sessão dos clientes e pegando os dados
foreach ($_SESSION['CLI']as $campo => $valor):
    $smarty->assign(strtoupper($campo),$valor);// VALORES MAIUSCULOS EX  $_SESSION['CLI_NOME'] para manter o padrao do projeto

   // echo strtoupper($campo). '=>'.$valor.'<br>';// para visualizar a sessão
 
endforeach;


$smarty->display('clientes_dados.tpl');


// fim da verificação se existe o post dos dados
endif;

