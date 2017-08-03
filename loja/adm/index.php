<?php
//verifico se iniciou a sessão
if(!isset($_SESSION)):
    session_start();
endif;

       //setando o meu timezone
       date_default_timezone_set('America/Sao_Paulo');

       //carrego o autoload
	require '../lib/autoload.php';
        
        //verifico se o ADM  esta logado------------------------------------------------
        if(!Login::LogadoADM()):
            
            Rotas::Redirecionar(2, 'login.php');
            exit('<h4> Erro acesso negado</h4>');
        
        endif;
         //chama a classe do template   
        $smarty = new Template();
        
        //Trata dados da categorias
        $categorias = new Categorias();        
        $categorias->GetCategorias();
               
        $smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());        
        $smarty->assign('SITE_NOME', Config::SITE_NOME );        
        $smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());         
        $smarty->assign('GET_SITE_ADM', Rotas::get_SiteADM()); 
        $smarty->assign('PAG_ADM_CLIENTE', Rotas::pag_ClientesADM());        
        $smarty->assign('PAG_ADM_PEDIDOS', Rotas::pag_PedidosADM());        
        $smarty->assign('PAG_CONTATO', Rotas::pag_Contato()); 
        $smarty->assign('PAG_CATEGORIAS', Rotas::pag_CategoriasADM()); 
        $smarty->assign('PAG_ADM_PRODUTOS', Rotas::pag_ProdutosADM());
        $smarty->assign('CATEGORIAS', $categorias->GetItens());        
        $smarty->assign('DATA', Sistema::DataAtualBR());        
        $smarty->assign('LOGADO', Login::LogadoADM());
        $smarty->assign('PAG_LOGOFF', Rotas::get_SiteADM().'/logoff');
        $smarty->assign('PAG_SENHA', Rotas::get_SiteADM().'/adm_senha');
        
        
        $smarty->assign('USER', $_SESSION['ADM']['user_nome']); 
        $smarty->assign('DATA',$_SESSION['ADM']['user_data']); 
        $smarty->assign('HORA', $_SESSION['ADM']['user_hora']); 
        
       
                           
        $smarty->display('adm_index.tpl');
