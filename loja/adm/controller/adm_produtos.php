<?php
//Objeto do template
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
$smarty->assign('PAG_PRODUTO_NOVO', Rotas::pag_ProdutosNovoADM());
$smarty->assign('PAG_PRODUTO_EDITAR', Rotas::pag_ProdutosEditarADM());
$smarty->assign('PAG_PRODUTO_IMG', Rotas::pag_ProdutosImgADM());





//carregando template
$smarty->display('adm_produtos.tpl');