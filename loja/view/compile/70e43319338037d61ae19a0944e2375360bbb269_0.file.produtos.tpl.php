<?php
/* Smarty version 3.1.31, created on 2017-07-24 19:44:36
  from "C:\xampp\htdocs\loja\view\produtos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59763204de7325_46287139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70e43319338037d61ae19a0944e2375360bbb269' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\produtos.tpl',
      1 => 1500918273,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59763204de7325_46287139 (Smarty_Internal_Template $_smarty_tpl) {
?>

<hr>
<?php if ($_smarty_tpl->tpl_vars['PRO_TOTAL']->value < 1) {?>

    <h4 class="alert alert-danger">Ops... Nada foi encontrado</h4>
<?php }?>




<center>
    <section id="paginacao" class="row">

        <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>


    </section>    
</center> 



<section id="produtos" class="row">
    <ul style="list-style: none">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
?>


            <li class="col-md-4">
                

                <div class="thumbnail">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['PRO_INFO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_slug'];?>
">

                        <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" alt="">

                        <div class="caption">
                            <h4 class="text-center"><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</h4>
                            <h3 class="text-center text-danger" >R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</h3>

                        </div>
                    </a>

                </div>

            </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


    </ul>
</section>


<center>
    <section id="paginacao" class="row">

        <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>


    </section>    
</center> 
<hr>
<?php }
}
