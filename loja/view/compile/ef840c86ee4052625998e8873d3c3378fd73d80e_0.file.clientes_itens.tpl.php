<?php
/* Smarty version 3.1.31, created on 2017-08-03 09:22:12
  from "C:\xampp\htdocs\loja\view\clientes_itens.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598315745fe2f3_91867533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef840c86ee4052625998e8873d3c3378fd73d80e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\clientes_itens.tpl',
      1 => 1501762375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598315745fe2f3_91867533 (Smarty_Internal_Template $_smarty_tpl) {
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
             <td><b>COD:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_cod'];?>
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
</section>
        
        
   <?php if ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_status'] == 'NAO') {?>     
              
    
     <section class="row">

      <h3 class="text-center">Forma de pagamento</h3> 

       <div class="col-md-4">

        </div>

          <div class="col-md-4">
           <!-- Configuração do Botão do PagSeguro-->
           <!-- Para testestar deixe o onclick assim caso contrario faça igual o botão abaixo <button class="btn btn-success btn-lg btn-block" onclick="PagSeguroLightbox('<?php echo $_smarty_tpl->tpl_vars['PS_COD']->value;?>
')">Pagar agora via PagSeguro</button>-->
           <button class="btn btn-success btn-lg btn-block" onclick="

            PagSeguroLightbox({
            code: '<?php echo $_smarty_tpl->tpl_vars['PS_COD']->value;?>
'
            }, {
            success : function(transactionCode) {
            alert('Transação efetivada - ' + transactionCode);
            window.location ='<?php echo $_smarty_tpl->tpl_vars['PAG_RETORNO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
';
                },
                abort : function() {
                alert('Erro no processo de pagamento');
                window.location ='<?php echo $_smarty_tpl->tpl_vars['PAG_ERRO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['REF']->value;?>
';
                }
                });
                ">

                Pagar agora via PagSeguro

    </button>


    <img src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/images/logo-pagseguro.png" alt="">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PS_SCRIPT']->value;?>
"><?php echo '</script'; ?>
>
</div>

<div class="col-md-4">

</div>


</section>     
        
  <?php }?>
        <?php }
}
