<?php
/* Smarty version 3.1.31, created on 2017-08-03 12:00:03
  from "C:\xampp\htdocs\loja\view\clientes_pedidos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59833a73f0bbd3_81211642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0c9520b0050e338ea87a989f8596a2f42b74e52' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\clientes_pedidos.tpl',
      1 => 1501772401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59833a73f0bbd3_81211642 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4>Meus Pedidos</h4>

<section class="row" id="pedidos">
    
    
    <h4 class="text-center" >Meus pedidos</h4>
    <center>
        <table class="table table-bordered" style="width: 90%">
            <tr class="text-danger bg-danger">
                
                <td>DATA</td> 
                <td>HORA</td>               

                <td>REF</td>
                <td>COD</td>
                
                
                
                <td>STATUS</td>
                
                <td>Detalhes</td>
                
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>
            <tr>
                
                <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</td>
                <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_ref'];?>
</td>
                <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
</td>

                
                
                
                <?php if ($_smarty_tpl->tpl_vars['P']->value['ped_pag_status'] == 'NAO') {?>
                    <td style="width: 20%"><span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
                <?php } elseif ($_smarty_tpl->tpl_vars['P']->value['ped_pag_status'] == 'Pago') {?>
                    <td style="width: 20%"><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
                 
                <?php } else { ?>
                    <td style="width: 20%"><span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>  
                    
                <?php }?>
                
                
            <form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
                <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
                <td style="width: 10%"><button class="btn btn-default"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button></td>
             </form>   
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        </table>
        
    </center>    
   

</section>
<?php }
}
