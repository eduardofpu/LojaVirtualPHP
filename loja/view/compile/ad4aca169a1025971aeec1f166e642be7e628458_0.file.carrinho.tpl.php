<?php
/* Smarty version 3.1.31, created on 2017-07-30 15:23:04
  from "C:\xampp\htdocs\loja\view\carrinho.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597e2408099bd0_35430955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad4aca169a1025971aeec1f166e642be7e628458' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\carrinho.tpl',
      1 => 1501438980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597e2408099bd0_35430955 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
$(document).ready(function(){    

        
   // validar frete
     $('#buscar_frete').click(function(){  
        
      var CEP_CLIENTE = $('#cep_frete').val();
      var PESO_FRETE = $('#peso_frete').val();
       
        if (CEP_CLIENTE.length !== 8 ) {
        alert('Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto');  
         $('#frete').addClass(' text-center text-danger');
         $('#frete').html('<b>Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto</b>');
        $('#cep_frete').focus();
        } else {
            
        
       
        $('#frete').html('<img src="view/images/loader.gif"> <b>Carregando...</b>');
        $('#frete').addClass(' text-center text-danger');
      
        // carrego o combo com os bairros
       
        $('#frete').load('controller/frete.php?cepcliente='+CEP_CLIENTE+'&pesofrete='+PESO_FRETE);
 
 } // fim do IF digitei o CEP
      
 
    }); // fim do change
    
   
} ); // fim do ready

<?php echo '</script'; ?>
>



<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_CARRINHO']->value;?>
/images/carrinho.jpg" alt=""} 

     <hr>



<section class="row">

    <div class="col-md-4">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PRODUTOS']->value;?>
" class="btn btn-geral" title=""><i class="glyphicon glyphicon-shopping-cart"></i>
             Comprar mais</a>
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
                <td> </td>

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
                    

                    <td>
                        <form name="del" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
                            <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">
                            <input type="hidden" name="acao" value="del">
                            <button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-minus"></i></button> 

                        </form>

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
        



<section class="row" id="total">



    <div class="col-md-4 text-right">         

    </div>

    <div class="col-md-4 text-right text-danger bg-warning">

        <h4>Total: R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</h4>

    </div>

    
    <div class="col-md-4">

        <form name="limpar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">

            
            <input type="hidden" name="acao" value="limpar">
            <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">           
           

            <button class="btn btn-danger btn-block"><i class="glyphicon glyphicon-trash"></i> Limpar tudo</button> 

        </form>

    </div>    

</section> 
 <hr>       
        
        

<section classe="row" id="dadosfrete">
    
    
   <div class=""></div>

   <div class="col-md-4"></div>
   

    <div class="col-md-4">
        <!--campos para tratar do frete-->
        
       
        <input type="text" name="cep_frete" class="form-control" id="cep_frete" value="" placeholder="Digite seu cep" >
        <input type="hidden" name="peso_frete" class="form-control"  id="peso_frete" value="<?php echo $_smarty_tpl->tpl_vars['PESO']->value;?>
" placeholder="Digite seu cep"  readonly>       
        <input type="hidden" name="frete_valor" class="form-control" id="frete_valor" value="0" placeholder="Digite seu cep" >
       
    </div>
        
        
     <!--Buscar  frete-->    
    <div class="col-md-4">
        
        
        <!-- Se o peso for menor que 1 Kg mostra g-->
        <?php if ($_smarty_tpl->tpl_vars['PESO']->value < 1.00) {?>
        <button class="btn btn-geral btn-block" id="buscar_frete"><i class="glyphicon glyphicon-send"></i>
             Peso: <?php echo $_smarty_tpl->tpl_vars['PESO']->value;?>
 g Calcular Frete</button>
        <?php }?>
        <!-- Se o peso for maior que 1 Kg mostra Kg-->
        <?php if ($_smarty_tpl->tpl_vars['PESO']->value >= 1.00) {?>
         <button class="btn btn-geral btn-block" id="buscar_frete"><i class="glyphicon glyphicon-send"></i>
              Peso: <?php echo $_smarty_tpl->tpl_vars['PESO']->value;?>
 Kg Calcular Frete</button> 
        <?php }?>
        
    </div>

</section>   
 <br> <br>        





 
<section classe="row" id="confirmapedido">
    
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>  
    
    <div class="col-md-4">
       
    <form name="pedido_finalizar" id="pedido_finalizar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CONFIRMAR']->value;?>
">
        <!--mostra retorno do frete-->
        <span id="frete"></span>        
        <!--botao finalizar-->
        <button class="btn btn-geral btn-block btn-lg" type="submit"><i class="glyphicon glyphicon-thumbs-up"></i>
            Confirmar Pedido</button>
        
    </form>
</div> 
      
        
</section>
        
 <br><br<br><br>  
 <br><br<br><br> <?php }
}
