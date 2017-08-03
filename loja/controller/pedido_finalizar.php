    <?php

//Verifico se não esta logado
if (!Login::Logado()):
    Login::AcessoNegado();
    Rotas::Redirecionar(2, Rotas::pag_ClienteLogin()); // obriga o redirecionamento para login
    exit();
// Caso esteja logado finaliza a compra    
        else:

    //SE EXISTIR ITENS NO CARRINHO MOSTRA OS ITENS
if (isset($_SESSION['PRO'])):
      
    //verifica o valor do frete
    if(!isset($_SESSION['PED']['frete'])):
       exit('<h4 class="alert alert-danger">Erro na operação, valor do frete incorreto, escolha o frete na tela do carrinho</h4>');
    endif;

        $smarty = new Template();
        $carrinho = new Carrinho();

        //$ref_cod_pedido = date('ymdHis').$_SESSION['CLI']['cli_id'];
        $ref_cod_pedido = date('ymdHmi').$_SESSION['CLI']['cli_id'];
        //$ref_ped_ref = date('ymdHis').$_SESSION['CLI']['cli_id'];

        //classe de pedido
        //verifico se tem a sessão de pedido
        if (!isset($_SESSION['PED']['pedido'])):
            //$_SESSION['pedido'] = '123456789';
            $_SESSION['PED']['pedido'] = $ref_cod_pedido;
        endif;

        //verifico se não tem a referencia e gero uma nova
        if (!isset($_SESSION['PED']['ref'])):
            //$_SESSION['pedido'] = '123456789';
            $_SESSION['PED']['ref'] = date('ymdHmi').$_SESSION['CLI']['cli_id']; //170501192955 xxxx estava incorreto
            //$_SESSION['PED']['ref'] =  $ref_ped_ref ;
           // $_SESSION['PED']['ref'] = date('ymdHis').$_SESSION['CLI']['cli_id'];
        
        endif;



        //passando variaveis para usar no fechamento do pedido
        $pedido = new Pedidos();

        $cliente = $_SESSION['CLI']['cli_id'];
        $cod = $_SESSION['PED']['pedido'];
        $ref = $_SESSION['PED']['ref'];  
        $reff = $_SESSION['PED']['pedido']; 
        $frete = $_SESSION['PED']['frete'];
        
        
        $smarty->assign('PRO', $carrinho->GetCarrinho());
        $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());
        $smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));
        $smarty->assign('FRETE', Sistema::MoedaBR($frete));
        $smarty->assign('TOTAL_FRETE', Sistema::MoedaBR($_SESSION['PED']['total_com_frete']));        
        $smarty->assign('TOTAL_US',$carrinho->GetTotal());        
        $smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos()); 
        $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
        $smarty->assign('TEMA', Rotas::get_SiteTEMA());
        $smarty->assign('NOME_CLIENTE', $_SESSION['CLI']['cli_nome']);  
        $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClientePedidos());        
        $smarty->assign('SITE_NOME', Config::SITE_NOME);
        $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());             
        $smarty->assign('PAG_RETORNO', Rotas::pag_PedidoRetorno());
        $smarty->assign('PAG_ERRO', Rotas::pag_PedidoRetornoErro());
        $smarty->assign('REF', $ref); // Tras a referencia 
        $smarty->assign('REFF', $reff);//Tras o codigo de referencia do pedido
        
       
        
        
        //envio de email----------------------
        
        $email = new EnviarEmail();
        $assunto = 'Pedido loja test 2017 - ' . Sistema::DataAtualBR();
        $msg     = $smarty->fetch('email_compra.tpl'); // a função fetch não visualiza ela empacota
        //envia para o administrador e para o cliente        
        $destinatarios = array(Config::SITE_EMAIL_ADM,$_SESSION['CLI']['cli_email']);
        $email->Enviar($assunto, $msg, $destinatarios);
        
        
        

        //gravo o pedido no banco------------------------   
        
       if ($pedido->PedidoGravar($cliente, $cod, $ref, $frete)):
           
           //Pagamento PS do pague seguro----------------------------------------------
           
           $pag = new PagamentoPS();
           $pag->Pagamento($_SESSION['CLI'], $_SESSION['PED'], $carrinho->GetCarrinho());
           
           //Passando para o template dados do Ps------------------------------------------
           $smarty->assign('PS_URL',$pag->psURL);
           $smarty->assign('PS_COD',$pag->psCod);
           $smarty->assign('PS_SCRIPT',$pag->psURL_Script);
           
           
           //Limpa a sessão do pedido e dos itens do carrinho
           $pedido->LimparSessoes();
       
        endif;

        $smarty->display('pedido_finalizar.tpl');
        //$smarty->display('email_compra.tpl');// para visualizar o template de email com teste


    else:
        echo '<h4 class="alert alert-danger">Sem produtos no carrinho</h4>';
        Rotas::Redirecionar(1, Rotas::pag_Produtos());

    endif; 
   
   
   endif; //final do acesso negado para login
