<?php
/* Smarty version 3.1.31, created on 2017-08-03 14:32:00
  from "C:\xampp\htdocs\loja\view\email_compra.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59835e10173082_16888583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55d021ef53c06c4dca2de25b890539eece5f171f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\email_compra.tpl',
      1 => 1501781425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59835e10173082_16888583 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Olá <?php echo $_smarty_tpl->tpl_vars['NOME_CLIENTE']->value;?>
,você registrou uma compra em <?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
 <br>
    
    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_HOME']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['SITE_HOME']->value;?>
</a>
    
 
 
</h3>

<section class="row">
    
    <h4>Para acessar sua conta e ter um histórico dos seus pedidos acesse nosso site, e sua conta</h4><br>
    <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
">Minha Conta: <?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
</a>
    
</section>


<section class="row">
    <center>
        <div class="alert alert-success">Itens do seu pedido</div>
        <br>
        <table class="table table-bordered" style="width: 95%">
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>
                <tr style="border: 1px solid #96dd3b">
                    <!-- <td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
"}  </td>-->
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

    <div class="col-md-4 text-right">       

    </div>
    <div class="col-md-4 text-right">       

    </div>

    <div class="col-md-4 text-right text-danger bg-warning">

        <h4>Total: R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</h4>
        <h4>Frete: R$ <?php echo $_smarty_tpl->tpl_vars['FRETE']->value;?>
</h4>
        <h4>Final: R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL_FRETE']->value;?>
</h4>
    </div>
    
  
</section>
    
    
        
<?php }
}
