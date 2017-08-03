<?php
//chama o objeto template---------------
$smarty = new Template();


//Verificar se exit o post se esta logado
if(!isset($_POST['cod_pedido'])):
    
    //Rotas::Redirecionar(1, Rotas::pag_ClientePedidos());
    exit();

endif;

//chamo a classe de itens---------------
$itens = new Itens();

//pego via post o cod pedido
$pedido = filter_var($_POST['cod_pedido'],FILTER_SANITIZE_STRING);// post passado no input clientes_pedidos.tpl



//executo a minha SQL
$itens->GetItensPedidos($pedido);

//PASSA TODOS OS DADOS
$smarty->assign('ITENS',$itens->GetItens());

$smarty->assign('TOTAL',$itens->GetTotal());

$smarty->display('adm_itens.tpl');

//    echo '<pre>';
//    var_dump($itens->GetItens());
//    echo '</pre>';


