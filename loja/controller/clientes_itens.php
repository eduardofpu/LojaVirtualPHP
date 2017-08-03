    <?php

//chama o objeto template---------------
$smarty = new Template();

//verifico se estou logado--------------
Login::MenuClientes();
//Verificar se exit o post se esta logado
if (!isset($_POST['cod_pedido'])):

    Rotas::Redirecionar(1, Rotas::pag_ClientePedidos());
    exit();

endif;

//chamo a classe de itens---------------
$itens = new Itens();

//pego via post o cod pedido
$pedido = filter_var($_POST['cod_pedido'],FILTER_SANITIZE_STRING); // post passado no input clientes_pedidos.tpl
//executo a minha SQL
$itens->GetItensPedidos($pedido);

//PASSA TODOS OS DADOS
$smarty->assign('ITENS', $itens->GetItens());
$smarty->assign('TOTAL', $itens->GetTotal());



if($itens->GetItens()[1]['ped_pag_status']=='NAO'):
    

//Pagamento pagSeguro---------------------------------------------------------------------
$pag = new PagamentoPS();
$pag->PagamentoITENS($_SESSION['CLI'],$itens->GetItens()[1], $itens->GetItens());

//    echo '<pre>';
//    var_dump($itens->GetItens());
//    echo '</pre>';

    
    
//Passando para o template dados do Ps------------------------------------------
$smarty->assign('PS_URL', $pag->psURL);
$smarty->assign('PS_COD', $pag->psCod);
$smarty->assign('PS_SCRIPT', $pag->psURL_Script);


$smarty->assign('REF',$pedido);
$smarty->assign('PAG_RETORNO', Rotas::pag_PedidoRetorno());
$smarty->assign('PAG_ERRO', Rotas::pag_PedidoRetornoErro());
$smarty->assign('TEMA', Rotas::get_SiteTEMA());



endif;

    
$smarty->display('clientes_itens.tpl');
