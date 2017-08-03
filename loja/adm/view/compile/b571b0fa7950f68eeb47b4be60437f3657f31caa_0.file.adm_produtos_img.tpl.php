<?php
/* Smarty version 3.1.31, created on 2017-07-30 10:02:32
  from "C:\xampp\htdocs\loja\adm\view\adm_produtos_img.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597dd8e81c23c6_17990471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b571b0fa7950f68eeb47b4be60437f3657f31caa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_produtos_img.tpl',
      1 => 1501419696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597dd8e81c23c6_17990471 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center">Imagens dos produtos</h4>
<hr>
<section class="row" id="novaimg">
    <form name="nova" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value;?>
">

            <input type="file" name="pro_img" class="form-control thumbnail" required>



        </div>

        <div class="col-md-4"><button class="btn btn-success">Enviar</button></div>
    </form>   
</section>
<hr>
<!-- lista as imagens extras dos produtos-->    
<section class="row" id="listarimg">
 <form name="deletar" method="post" action="">
     
    
            
    <ul style="list-style:none">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGES']->value, 'I');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['I']->value) {
?>
            <li class="col-md-3">
                <img src="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_nome'];?>
" alt="" class="thumbnail">
                <label>Apagar?</label>
                <input type="checkbox" class="input-lg" name="fotos_apagar[]" value="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_arquivo'];?>
">
                
                
            </li>
                        
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        
        <!--id do produto para passar via post-->
                <input type="hidden" name="pro_id" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['I']->value['img_pro_id'];
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
">
                
                
    </ul>
    
    <br>
    <section class="col-md-12 text-center" id="apagar">
        <hr>
        
        
        <button class="btn btn-danger">Apagar Marcas</button>
    </section>
    <br><br><br>
 </form>  
</section>
    <section>
        
        <br><br><br><br>
    </section>    
    <?php }
}
