<?php
/* Smarty version 3.1.31, created on 2017-07-31 06:27:04
  from "C:\xampp\htdocs\loja\adm\view\adm_itens.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597ef7e8c887d6_16666363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c116b4a4bacb2da061969ff5cc8158bbf141078' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_itens.tpl',
      1 => 1501493217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597ef7e8c887d6_16666363 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center">Dados do Pedido</h4>


<!-- Informações sobre o pedido -->
<section class="row">
    
    <center>
    <table class="table table-bordered" style="width: 80%">
        
         <tr class="bg-info">
                          
             <td><b>DATA:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_data'];?>
</td>
             <td><b>HORA:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_hora'];?>
</td>
             <td><b>REF:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_ref'];?>
</td>
             <td><b>Status:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_status'];?>
</td>
        </tr>
        
        
                
    </table>
  </center>      
    
    
</section>

        

<section class="row" id="listaitens">
    
    
    <center>
    <table class="table table-bordered" style="width: 80%">
        
         <tr class="text-success bg-success">
            
            <td class="text-center">Imagem </td>
            <td class="text-center">Item </td>
            <td class="text-center">Valor Uni </td>
            <td class="text-center">X</td>
            <td class="text-center">Sub</td>
        </tr>
        
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ITENS']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>  
        <tr>
            
            <td><img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['item_img'];?>
" alt=""> </td>
            <td><?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
 </td>
            <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_valor'];?>
 </td>
            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_qtd'];?>
 </td>
            <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_sub'];?>
 </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
     
        
        
    </table>
  </center>      
</section>
        
        
        

<!-- Informações sobre o pedido -->
<section class="row" id="resumo">
    
    <center>
    <table class="table table-bordered" style="width: 80%">
        
         <tr class="bg-warning">
             <td class="tex-danger"><b>Frete:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor'];?>
</td>
             <td class="tex-danger"><b>Total:</b> <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>
             <td class="tex-danger"><b>Final:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']+$_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>
        </tr>
        
        
                
    </table>
  </center>      
    
    
</section>        <?php }
}
