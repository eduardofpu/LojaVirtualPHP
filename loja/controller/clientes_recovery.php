<?php

$smarty = new Template();

//Verifico se exite um poste do email--------------------------------------------
if(isset($_POST['cli_email'])):
   
//classe cliente    
$cliente = new Clientes();
//chama o setCli_email---------------------
$cliente->setCli_email($_POST['cli_email']);// dentro do input no formulario clientes_recovery.tpl esta o cli_email

//chama o getCli_email no metodo GetClienteEmail-----------------------
if($cliente->GetClienteEmail($cliente->getCli_email())>0):
 //o email foi encontrado  rotinas necessaria 
    
    //Gerar nova senha
    $novasenha = Sistema::GerarSenha();    
    $cliente->SenhaUpdate($novasenha, $cliente->getCli_email());
    
    //Envio de email com a nova senha para o cliente---------------------------------------------
    $email = new EnviarEmail();
    $destinatarios = array($cliente->getcli_email(), Config::SITE_EMAIL_ADM);
    $assunto = 'Nova Senha'. Config::SITE_NOME;
    $msg = " Olá cliente, foi solicitada nova senha para acesso ao site".Config::SITE_FONE;
    $msg .=" <br> Nova senha = ".$novasenha;
    $email->Enviar($assunto, $msg, $destinatarios);
      
    //mostra mensagem na tela que foi enviada a senha
    echo '<h3 class="alert alert-success">Olá cliente, foi enviado uma nova senha para o seu email, para acesso ao site</h3>';      
    Rotas::Redirecionar(5,Rotas::pag_ClienteLogin());      
    
    else:
    //email não encontrado
    
    echo '<div class="alert alert-danger">Email não encontrado</div>';
    
endif;
    
    
    
    
    
  //Caso não exita o post mostro o template  
    else:
    
    
$smarty->display('clientes_recovery.tpl');


endif;

