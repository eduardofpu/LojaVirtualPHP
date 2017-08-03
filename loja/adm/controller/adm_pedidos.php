<?php

//Objeto do template
$smarty = new Template();
$pedidos = new Pedidos();


//Verifico se existe o post de apagar pedidos-------------------------------

if(isset($_POST['ped_apagar'])):// o post do botão apagar
    
    $ped_cod = $_POST['cod_pedido'];// post do input hidden

    if($pedidos->Apagar($ped_cod)):
        
        echo '<div class="alert alert-success">Pedido apagado com sucesso!</div>';
        
    endif;
    
endif;



//Verifico se passei o id na url------------------------------------
if (isset(Rotas::$pag[1])):

    $id = (int) Rotas::$pag[1];
    //trazer os pedidos do cliente id--------------------------------
    $pedidos->GetPedidos($id);

    //verifico se passei o post da data----------------------
    elseif (isset($_POST['data_ini']) and isset($_POST['data_fim'])):

      $pedidos->GetPedidosData($_POST['data_ini'], $_POST['data_fim']);

            //verifico se passei o post da ref-------------------------
           elseif (isset($_POST['txt_ref'])):
    
              $ref = filter_var($_POST['txt_ref'],FILTER_SANITIZE_STRING);
              $pedidos->GetPedidosRef($ref);

            else:
          //Chamo todos os pedidos-------------------------------
         $pedidos->GetPedidos();


endif;


$smarty->assign('PEDIDOS', $pedidos->GetItens());
$smarty->assign('PAG_ITENS', Rotas::pag_ItensADM());

//verifico se existe pedidos
if ($pedidos->TotalDados() > 0):

    //carregando template
    $smarty->display('adm_pedidos.tpl');
//caso não exista resultados não mostra template
else:

    echo '<div class="alert alert-danger">Nada foi encontrado</div>';
    endif;

