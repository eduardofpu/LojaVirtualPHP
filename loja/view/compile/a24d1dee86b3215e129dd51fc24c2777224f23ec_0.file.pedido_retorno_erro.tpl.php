<?php
/* Smarty version 3.1.31, created on 2017-08-03 09:19:53
  from "C:\xampp\htdocs\loja\view\pedido_retorno_erro.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598314e911b400_47470994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a24d1dee86b3215e129dd51fc24c2777224f23ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\pedido_retorno_erro.tpl',
      1 => 1501762790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598314e911b400_47470994 (Smarty_Internal_Template $_smarty_tpl) {
?>
    
<h3 class="text-center text-danger">Ocorreu um problema no pagamento, ou foi cancelado</h3>
<hr>


<section class="row">
    
    <div class="col-md-4"></div>
    <div class="col-md-4 thumbnail">
        
        <p>Caso tenha algum problema entre em contato com nosco, informando<br>
        o código  de referência:<b> <?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
 </b>
        </p>
        
        <p>Ou pode tentar novamente o pagamento na seção "Pedidos" clicando em "Detalhes",<br>
        verá seus itens comprados e abaixo o botão "Completar Pagamento Agora" 
        </p>
        
        <p>
            Para ir a tela do pedido e efetivar o pagamento, clique no botão.
        </p>
        
        <p>
            
        <form name="pagamento" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">            
            <input type="hidden" name="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
">
            <button class="btn btn-success btn-block btn-lg">Fazer o Pagamento Agora</button>
        </form>
        
        </p>
        
        
    </div>
    <div class="col-md-4"></div>
</section><?php }
}
