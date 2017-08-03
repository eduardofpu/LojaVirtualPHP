<?php
/* Smarty version 3.1.31, created on 2017-08-03 14:49:52
  from "C:\xampp\htdocs\loja\view\pedido_retorno.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59836240b76f80_42635483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2aca20cd60f103a272083dc938a59d98ebb96435' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\pedido_retorno.tpl',
      1 => 1501782584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59836240b76f80_42635483 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3 class="text-center bg-success"><i class="glyphicon glyphicon-thumbs-up"></i> Obrigado pelo seu pedido</h3>

<section class="row">
    
    
   <center> 
     <table class="table table-bordered" style="width: 100%">
            <tr class="text-success bg-success">
            
            <td>Código</td>
            <td>Referência</td>
            <td>Status do pagamento</td>
            <td>Forma de pagamento</td>
            <td></td>
            
        </tr>
        
        <tr>
            
            <td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
</b> </td> 
            <td><b><?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
</b> </td> 
            <td><b><font color="green"><?php echo $_smarty_tpl->tpl_vars['PAGO']->value;?>
</font></b> </td> 
            <td><b><?php echo $_smarty_tpl->tpl_vars['FORMA_PAG']->value;?>
</b> </td> 
            
           
             <td>
            
        <form name="pagamento" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
            
            <input type="hidden" name="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
">
            <button class="btn btn-success btn-block">Detalhes deste pedido</button>
        </form>
        </td>
            
            
        </tr>
        
        
    </table>
   </center>   
    
</section><?php }
}
