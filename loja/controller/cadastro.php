<?php
//Chama o smarty template---------------------------------
$smarty = new Template();

//verificar se exite estes tres parametro cli_nome , cli_email e cli_cpf para chamar o bloco-------------------
if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])):
        
//criando variaveis-----------------------------------
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
$cli_senha    = Sistema::GerarSenha();
$cli_data_cad    = Sistema::DataAtualUS();
$cli_hora_cad    = Sistema::HoraAtual();

echo $cli_senha;// para visualizar a senha gerada medo md5().

//chama os classe cliente e gravo os dados no banco--------------------------------------------
$clientes = new Clientes();
$clientes->Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha);
$clientes->Inserir();

//Evio de email para o cliente-------sobre a nova senha-----------------------------------------
   //Passo variaveis para o template de cadastro do email---------------------------------------
   $smarty->assign('NOME', $cli_nome);
   $smarty->assign('EMAIL', $cli_email);
   $smarty->assign('SENHA', $cli_senha);   
   $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClienteConta());
   $smarty->assign('SITE', Config::SITE_NOME);
   $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());
   
        $email = new EnviarEmail();
        $assunto = 'Cadastro efetuado ' . Config::SITE_NOME;
        $msg     = $smarty->fetch('email_cadastro.tpl'); // a função fetch não visualiza ela empacota
        //envia para o administrador e para o cliente        
        $destinatarios = array($cli_email,Config::SITE_EMAIL_ADM);
        $email->Enviar($assunto, $msg, $destinatarios);
        


//Feito o cadastro aviso e levo o cliente ate o login-------------------------------------------
echo '<div class="alert alert-success">Olá '.$cli_nome.', Cadastro efetuado com sucesso! '
        . 'A senha foi enviada para seu email cadastrado<br> '
        . 'acesse seu email cadastrado para obter esta senha </div>';

        Rotas::Redirecionar(7, Rotas::pag_ClienteLogin());

//Se nao passou mostra os compos do cadastro
else:
    
//chama o template cadastro.tpl ---------------------------------------
$smarty->display('cadastro.tpl');


endif;
