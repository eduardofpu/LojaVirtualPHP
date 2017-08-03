<?php
/* Smarty version 3.1.31, created on 2017-07-31 16:34:43
  from "C:\xampp\htdocs\loja\view\menucliente.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597f8653893eb0_45009647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '219a9c571e9e398eb69bb44b029d58cde0879e44' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\menucliente.tpl',
      1 => 1501529678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f8653893eb0_45009647 (Smarty_Internal_Template $_smarty_tpl) {
?>

  <h4 class="text-center tex-danger">Olá <b><?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
</b>, seja bem vindo! O que deseja fazer agora? </h4>
          
      
<section class="row">
    
    <div class="text-center">
        
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CONTA']->value;?>
" class="btn btn-success"><i class="glyphicon glyphicon-home"></i> Minha Conta</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTES_PEDIDOS']->value;?>
" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Meus Pedidos</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTES_DADOS']->value;?>
" class="btn btn-success"><i class="glyphicon glyphicon-barcode"></i> Meus Dados</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Meus Carrinho</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTES_SENHA']->value;?>
" class="btn btn-warning"><i class="glyphicon glyphicon-asterisk"></i> Alterar Senha</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair</a>
    </div>
    
    
    
</section>
<hr>    
    <?php }
}
