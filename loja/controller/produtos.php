<?php
//chamo o objeto template
$smarty = new Template();
//chamo o objeto produtos
$produtos = new Produtos();
//verifico se passei o id da categoria
if(isset(Rotas::$pag[1])):
   $produtos->GetProdutosCateID(Rotas::$pag[1]); 

else:
    //se nao passei mostro tudo
   $produtos->GetProdutos(); 
endif;


//passo vairaveis par o template tpl
$smarty->assign('PRO',$produtos->GetItens());
//$smarty->assign('URL', Rotas::get_SiteHOME());

$smarty->assign('PRO_INFO', Rotas::pag_ProdutosInfo());
$smarty->assign('PRO_TOTAL', $produtos->TotalDados());
$smarty->assign('PAGINAS', $produtos->ShowPaginacao());

//echo Rotas::get_ImageURL();

$smarty->display('produtos.tpl');

/*
echo '<pre>';
var_dump($produtos->GetItens());
echo '</pre>';
*/



