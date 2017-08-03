<?php

$smarty =  new Template();
//chamo o menu de clientes logado
Login::MenuClientes();

//Verifico se foi passado o post com senha atual e a nova----------senha teste: p49w36qz ------------------------
if(isset($_POST['cli_senha_atual']) and isset($_POST['cli_senha'])):
    //Rotinas
        
    $senha_atual= Sistema::Criptografia($_POST['cli_senha_atual']);
    $senha_nova =$_POST['cli_senha'];
    $email =$_SESSION['CLI']['cli_email'];
    
    //para verificar o post
//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';   
//    
//    echo '<pre>';
//    print_r($_SESSION['CLI']);
//    echo '</pre>';

    
    
    if($senha_atual != $_SESSION['CLI']['cli_pass']):
        
        echo '<div class="alert alert-danger">';
        Sistema::VoltarPagina();
        echo '  A senha atual está incorreta</div>';
        exit();
        
    endif;
    //Gravo a nova senha no banco de dados-----------------------------------
    
    $clientes = new Clientes();
    $clientes->SenhaUpdate($senha_nova, $email);// obtem a senha e o email
    
    echo '<div class="alert alert-success"> Senha alterada com sucesso! Já pode fazer login com sua nova senha</div>';
    //caso não exista o post de alterar a senha, mostro os campos no template
    else:
    
    $smarty->display('clientes_senha.tpl');
endif;
