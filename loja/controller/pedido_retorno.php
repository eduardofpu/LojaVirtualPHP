<?php
//Objeto template
$smarty = new Template();



//Chamando a classe de pagamento
$pag = new PagamentoPS();

//recebe notificação automática
$pag->Nofificacao();


//Verifico se tem um cod REF na url, se não tiver não mostro nada

if(isset(Rotas::$pag[1])):
//Pegando a rota com o cod referencia
$ref = Rotas::$pag[1];// index [0] e index[1] sera pegado o index[1] ex:http://localhost/loja/pedido_retorno[0]/122jjk122d[1]


//Pega a transação por REF apos ter efetuado a compra
$pag->BuscarTransacaoREF($ref);

//Passo variaveis para o template

$smarty->assign('PAGO',$pag->info['pago']);
$smarty->assign('CODIGO',$pag->info['codigo']);
$smarty->assign('REF',$pag->info['referencia']);
$smarty->assign('FORMA_PAG',$pag->info['forma_pag']);
$smarty->assign('PAG_ITENS', Rotas::pag_ClienteItens());

//Chama o template
$smarty->display('pedido_retorno.tpl');

else:
    
    echo '<div class="alert alert-danger">Sem transação para informar</div>';
    
endif;
