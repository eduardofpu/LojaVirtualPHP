<?php

$smarty =  new Template();


//Verifico se foi passado o post com senha atual e a nova----------senha teste: p49w36qz ------------------------
if(isset($_POST['adm_senha_atual']) and isset($_POST['adm_senha'])):
    //Rotinas
        
    $senha_atual= Sistema::Criptografia($_POST['adm_senha_atual']);
    $senha_nova =$_POST['adm_senha'];
    $email =$_SESSION['ADM']['user_email'];
      
    
    if($senha_atual != $_SESSION['ADM']['user_pw']):
        
        echo '<div class="alert alert-danger">';
        Sistema::VoltarPagina();
        echo '  A senha atual está incorreta</div>';
        exit();
        
    endif;
    //Gravo a nova senha no banco de dados-----------------------------------
    
    $user = new User();
    if($user->AlterarSenha($senha_nova, $email)):
   
    
          //caso alterar envia email com a nova senha-------------------------------------------
          $enviar = new EnviarEmail();
          $assunto = 'Alteração da  senha ADM do site '. Sistema::DataAtualBR();
          $msg ='<h3>Foi feita alteração da senha de administrador neste momento, nova senha:</h3> ' . $senha_nova;        
          $destinatarios = array($email, Config::SITE_EMAIL_ADM);          
          $enviar->Enviar($assunto, $msg, $destinatarios);
          
           
    echo '<div class="alert alert-success"> Senha alterada com sucesso! Duvidas? Verifique a nova senha no seu email</div>';
    //caso não exista o post de alterar a senha, mostro os campos no template
        
    
    //chama o logoff para fazer login
    Rotas::Redirecionar(2, Rotas::get_SiteADM().'/logoff');

    else:
        
        echo '<div class="alert alert-danger">Erro ao tentar alterar a senha</div>';
      
    endif;   
    
    
    //caso não exista o post de alterar a senha, mostro os campos no template
    else:
    //chamo o template
    $smarty->display('adm_senha.tpl');
    
    
endif;
 