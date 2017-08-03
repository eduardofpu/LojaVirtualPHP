<?php


    
    $smarty = new Template();
    
    //chamo o menu de clientes logado
    Login::MenuClientes();

    $pedidos = new Pedidos();
    $pedidos->GetPedidos($_SESSION['CLI']['cli_id']);
    
    $smarty->assign('PEDIDOS', $pedidos->GetItens());
    $smarty->assign('PAG_ITENS', Rotas::pag_ClienteItens());
    

    //var_dump($pedidos);
    $smarty->display('clientes_pedidos.tpl');

    
