<?php
/* Smarty version 3.1.31, created on 2017-07-30 16:44:14
  from "C:\xampp\htdocs\loja\adm\view\adm_categorias.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597e370ea21048_05567829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f083511d30943b578cb15dd2a273d0c9e707466' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_categorias.tpl',
      1 => 1501443852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597e370ea21048_05567829 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center">Gerenciar Categorias</h4>

<section class="row">
    <form name="categoriainsere" method="post" action="">
        
        <div class="col-md-4">
            <input type="text" name="cate_nome" class="form-control" placeholder="Digite o Nome da Categoria" required>
        </div>
         <div><button class="btn btn-success" name="cate_nova" value="cate_nova"><i class="glyphicon glyphicon-plus"></i> Nova categoria</button></div>
         <div></div>
    </form>
   
    
</section>
<hr>

<section class="row" id="listarcategorias">
    
    
    <table class="table table-bordered">
        
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
?>
            
            <form name="categorias_editar" method="post" action="">    
        <tr>
            
            <td style="width: 70%">
                <input type="text" name="cate_nome" value="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
" class="form-control" required>
                  <input type="hidden" name="cate_id" value="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_id'];?>
" >            
            </td>
            
            <td><button class="btn btn-success" name="cate_editar" value="cate_editar"><i class="glyphicon glyphicon-pencil"></i> Editar</button></td>            
            <td><button class="btn btn-danger" name="cate_apagar" value="cate_apagar"><i class="glyphicon glyphicon-trash"></i> Apagar</button></td>
            
            
        </tr>
        </form>
        
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </table>
    
</section><?php }
}
