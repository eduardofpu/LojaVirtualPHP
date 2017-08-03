<?php
/* Smarty version 3.1.31, created on 2017-07-31 09:14:44
  from "C:\xampp\htdocs\loja\adm\view\adm_pedidos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597f1f34ecf1e4_00167948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '956a3cba91a033750e25a47d2052c8b112a1c3a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_pedidos.tpl',
      1 => 1501503113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f1f34ecf1e4_00167948 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3 class="text-center">Gerenciar Pedidos</h3>
<hr>

<section class="row" id="pesquisa">
<!--Faz uma busca entre datas-->


    <form name="buscardata" method="post" action="">
        
        

        <div class="col-md-3">
            <input type="date" name="data_ini" class="form-control" required>


        </div>

        <div class="col-md-3">

            <input type="date" name="data_fim" class="form-control" required>

        </div>

        <div class="col-md-3">

            <button class="btn btn-success">Buscar por Data</button>

        </div>

        

    </form>


</section>
<br>
<section class="row">
    
<!--Faz uma busca por texto-->

    <form name="buscarefcod" method="post" action="">

        <div class="col-md-3">
            
            <input type="text" name="txt_ref" class="form-control" placeholder="REF" required>
        </div>
        <div class="col-md-3">
             <button class="btn btn-success">Buscar Referencia</button>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>

    </form>
    
    
    
</section>

<hr>

<section class="row" id="pedidos">



    <center>
        <table class="table table-bordered" style="width: 90%">
            <tr class="text-success bg-success">

                <td>Nome</td> 
                <td>DATA</td> 
                <td>HORA</td>
                <td>REF</td>
                <td>STATUS</td>
                <td>Detalhes</td>
                <td>        </td>

            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>
                <tr>

                    <td style="width: 30%"><?php echo $_smarty_tpl->tpl_vars['P']->value['cli_nome'];?>
  <?php echo $_smarty_tpl->tpl_vars['P']->value['cli_sobrenome'];?>
</td>
                    <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</td>
                    <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_ref'];?>
</td>



                    <?php if ($_smarty_tpl->tpl_vars['P']->value['ped_pag_status'] == 'NAO') {?>
                        <td style="width: 20%"><span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>

                    <?php } else { ?>
                        <td style="width: 20%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</td>  

                    <?php }?>

             
                <td style="width: 10% ">
                      <!-- Formulario que vai para itens de pedidos-->
                <form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
                    <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
                  <button class="btn btn-info"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button>
                </form>
                </td>
                
                
                <td style="width: 10% ">
                      <!-- Formulario que vai para itens de pedidos-->
                <form name="deletar" method="post" action="">
                    <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
                    <button class="btn btn-danger" name="ped_apagar" value="ped_apagar"><i class="glyphicon glyphicon-remove"></i></button>
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
<?php }
}
