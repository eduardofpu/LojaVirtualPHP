

<?php


    //SE EXISTIR ITENS NO CARRINHO MOSTRA OS ITENS
    if(isset($_SESSION['PRO'])):
             
        
    $smarty = new Template();
    $carrinho = new Carrinho();

    $smarty->assign('PRO', $carrinho->GetCarrinho());
    $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());  
    $smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));
    $smarty->assign('PESO', number_format($carrinho->GetPeso(),3,',' ,''));
    $smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());
    $smarty->assign('PAG_CONFIRMAR', Rotas::pag_PedidoConfirmar());
    $smarty->assign('IMG_CARRINHO', Rotas::get_SiteTEMA());
    
    //chamo o menu de clientes logado
    //Login::MenuClientes();
    $smarty->display('carrinho.tpl');
    
    else:
       
       
       echo '<h4 class="alert alert-danger">Sem produtos no carrinho</h4>';
       Rotas::Redirecionar(1, Rotas::pag_Produtos());  
   endif; 

/*
echo '<pre>';
var_dump($_SESSION['PRO']);
echo '</pre>';
*/