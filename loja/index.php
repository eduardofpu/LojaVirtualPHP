<?php
//verifico se iniciou a sessão
if(!isset($_SESSION)):
    session_start();
endif;

        //setando o meu timezone
        date_default_timezone_set('America/Sao_Paulo');

       //carrego o autoload
	require './lib/autoload.php';
         //chama a classe do template   
        $smarty = new Template();
        
        //Trata dados da categorias
        $categorias = new Categorias();        
        $categorias->GetCategorias();
       
        
        
        //Passo valores para o meu template
        $smarty->assign('H2','Curso Loja Virtual PHP');
        
        $smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
        
        $smarty->assign('SITE_NOME', Config::SITE_NOME );
        
        $smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());      
        
        
        $smarty->assign('PAG_CLIENTE_CONTA', Rotas::pag_ClienteConta());
        
        $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
        
        $smarty->assign('PAG_CONTATO', Rotas::pag_Contato());
        
        $smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());
        
        $smarty->assign('CATEGORIAS', $categorias->GetItens());
        
        $smarty->assign('DATA', Sistema::DataAtualBR());
        
        $smarty->assign('LOGADO', Login::Logado());
        $smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
        
        if(Login::Logado()):
          $smarty->assign('USER', $_SESSION['CLI']['cli_nome']);  
        endif;
        
        //$dados = new Conexao();        
        // $dados->ExecuteSQL("select * from user");        
        //echo $dados->TotalDados();        
        //while($lista = $dados->ListarDados()):
        //echo $lista['user_nome'].'<br><hr>';
        //endwhile;
        
         //var_dump($dados); 
                   
        $smarty->display('index.tpl');
