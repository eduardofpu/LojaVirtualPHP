<?php

if(!isset($_SESSION)):
    session_start();
endif;

       //setando o meu timezone
       date_default_timezone_set('America/Sao_Paulo');

       //carrego o autoload para reconhecer a classe
	require '../lib/autoload.php';
//chama o objeto do template
$smarty = new Template();

//passando valores
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());

//para criar senha a nivel de debug descomente essa linha e crie a senha---------------
//echo Sistema::Criptografia('123456');


//verifica se passei o post de recuperar senha
if(isset($_POST['recovery'])):
    
    //passo alguns valores 
    $user = new User();
    $email =$_POST['txt_email'];
    $senha = Sistema::GerarSenha();
    
    
    //Verifico se tem esse email na tabela se tiver faço alteração---------------------------
      if($user->GetUserEmail($email) > 0 ):
          
          $user->AlterarSenha($senha, $email);
          
      
          //caso alterar envia email com a nova senha-------------------------------------------
          $enviar = new EnviarEmail();
          $assunto = 'Nova senha ADM do site '. Sistema::DataAtualBR();
          $msg ='Nova senha no ADM do site, nova senha: ' . $senha;        
          $destinatarios = array($email, Config::SITE_EMAIL_ADM);          
          $enviar->Enviar($assunto, $msg, $destinatarios);
         
            echo '<div class="alert alert-success">Foi enviado um email com a nova senha</div>';
          
          else:
              
              echo '<div class="alert alert-danger">Email não encontrado</div>';
          
          
      endif;   
    
endif;


//verifico se passou post para login---sha512  a senha de administrador devera ser cadastrada direto no banco----------------------------
if(isset($_POST['txt_logar'])&& isset($_POST['txt_email'])):// post do botão e do input email
   
    $login = new Login();

        $user = $_POST['txt_email']; //post email
        $senha = $_POST['txt_senha'];// post senha
        
        
    if($login->GetLoginADM($user, $senha)):
         //var_dump($_SESSION['ADM']);
         
        //echo '<div class="alert alert-success">Login efetuado com sucesso!</div>';
       echo'<center><div class="alert alert-success"><img src="../view/images/barradeprogresso.gif"></div></center>';
       Rotas::Redirecionar(2,'index.php');
       
       else:
           
       Rotas::Redirecionar(1,'login.php');
      
    endif;
    
endif;


//chma o template
$smarty->display('adm_login.tpl');