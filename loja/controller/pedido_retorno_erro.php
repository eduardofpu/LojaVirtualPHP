<?php

$smarty = new Template();

   
//recebo o cod  de referencia por url
$ref = Rotas::$pag[1]; 

$smarty->assign('REF', $ref);
$smarty->assign('PAG_ITENS', Rotas::pag_ClienteItens());

$smarty->display('pedido_retorno_erro.tpl');
