<?php
/* Smarty version 3.1.31, created on 2017-07-26 22:57:14
  from "C:\xampp\htdocs\loja\view\pedido_confirmar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5979022a448248_09114869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2d143155fe9d1b11e00496eb5c9a94a14a4e03c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\pedido_confirmar.tpl',
      1 => 1501102588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5979022a448248_09114869 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Confirmar Pedido</h3>
<hr>



<section class="row">
    
    <div class="col-md-4">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
" class="btn btn-geral" title="">Voltar ao carrinho</a>
    </div>
    <div class="col-md-4">
        
    </div>
    <div class="col-md-4 text-right">
     
    </div>
    
</section>

<br>



<section class="row">
    <center>
        <table class="table table-bordered" style="width: 95%">
            <tr class="tex-danger bg-danger">
                <td></td>
                <td>Produto</td>
                <td>Valor $R</td>
                <td>X</td>
                <td>SubTotal R$</td>
                
                
            </tr>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>
                <tr>
                    <td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
"}  </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
  </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
  </td>           
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_qtd'];?>
  </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_subtotal'];?>
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
        



<section class="row">

    

    <div class="col-md-4 text-right"> </div>
   

    <div class="col-md-4 text-right text-danger bg-warning">

        <h4>Total: R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</h4>
        <h4>Frete: R$ <?php echo $_smarty_tpl->tpl_vars['FRETE']->value;?>
</h4> <hr>  
        <h4>Final: R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL_FRETE']->value;?>
</h4>
    </div>
               
     <div class="col-md-4 text-right">       
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_FINALIZAR']->value;?>
" class="btn btn-geral btn-lg btn-block" title=""><i class="glyphicon glyphicon-ok"></i>
             Finalizar</a>   
    </div>   
     

</section> 
             
 <br> <br> <br> <br><?php }
}
