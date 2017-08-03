<?php


    //SE EXISTIR ITENS NO CARRINHO MOSTRA OS ITENS
    if(isset($_SESSION['PRO'])):
         
        
        if(!isset($_POST['frete_radio'])):
            
            Rotas::Redirecionar(1, Rotas::pag_Carrinho().'#dadosfrete');// #dadosfrete volta a pagina na posição exata que estava
            exit('<div class="alert alert-danger">Precisa escolher o frete</div>');
        endif;
        
    $smarty = new Template();
    $carrinho = new Carrinho();
    
   

    
    //passo valores para o template
    $smarty->assign('PRO', $carrinho->GetCarrinho());    
     
    //pega o valor do frete e o valor do frete botao radio
    $_SESSION['PED']['frete'] = $_POST['frete_radio'] ;     
    $frete= $_POST['frete_radio'];        
    
    $_SESSION['PED']['total_com_frete'] = ($frete + $carrinho->GetTotal()); 
   
    
    $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar());
    $smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));    
    $smarty->assign('FRETE', Sistema::MoedaBR($_SESSION['PED']['frete'])); 
    $smarty->assign('TOTAL_FRETE', Sistema::MoedaBR($_SESSION['PED']['total_com_frete']));    
    $smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());
    $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
    $smarty->assign('PAG_FINALIZAR', Rotas::pag_PedidoFinalizar());
    
    $smarty->display('pedido_confirmar.tpl');
  
    else:
        echo '<h4 class="alert al   ert-danger">Sem produtos no carrinho</h4>';
        Rotas::Redirecionar(1, Rotas::pag_Produtos());
        
   endif; 
   