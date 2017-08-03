<?php
/* Smarty version 3.1.31, created on 2017-07-30 14:06:09
  from "C:\xampp\htdocs\loja\adm\view\adm_produtos_editar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597e1201b82e65_50769266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6708a8797b6bcd34e341724e543349de3d56ed82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_produtos_editar.tpl',
      1 => 1501356144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597e1201b82e65_50769266 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--plugin editor tinymce-->

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>


<h4 class="text-center">Editar produtos novo</h4>
<hr>

<!--começa os campos para produto-->
<section class="row" id="camposproduto">

    <form name="frm_produto" method="post" action="" enctype="multipart/form-data">

        <div class="col-md-6"> 
            <label>Produto</label>
            <input type="text" name="pro_nome" id="pro_nome" class="form-control"  placeholder="Produto" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_nome'];?>
">
        </div>

        <div class="col-md-4"> 
            <label>Categoria</label>
            <select name="pro_categoria" id="pro_categoria" class="form-control" required >

                <option value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['cate_nome'];?>
</option>
                <option value="">Escolha</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
?>                    
                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
                            
            </select>
        </div>


        <div class="col-md-2"> 
            <label>Ativo</label>
            <select name="pro_ativo" id="pro_ativo" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_ativo'];?>
" >
                <option value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_ativo'];?>
"><?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_ativo'];?>
</option>
                <option value="">Escolha</option>
                <option value="NAO">NAO</option>
                <option value="SIM">SIM</option>
            </select>
        </div>



        <div class="col-md-3">  
            <label>Modelo</label>
            <input type="text" name="pro_modelo" id="pro_modelo" class="form-control"  placeholder="Modelo" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_modelo'];?>
" >
        </div>

        <div class="col-md-2"> 
            <label>Referência</label>
            <input type="text" name="pro_ref" id="pro_ref" class="form-control"  placeholder="Referência" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_ref'];?>
" >
        </div>

        <div class="col-md-2"> 
            <label>Valor</label>
            <input type="text" name="pro_valor" id="pro_valor" class="form-control"  placeholder="Valor" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_valor'];?>
">
        </div>

        <div class="col-md-2"> 
            <label>Estoque</label>
            <input type="text" name="pro_estoque" id="pro_estoque" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_estoque'];?>
">
        </div>

        <div class="col-md-2"> 
            <label>Peso</label>
            <input type="text" name="pro_peso" id="pro_peso" class="form-control"  placeholder="Peso" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_peso'];?>
">
        </div>

        <div class="col-md-2"> 
            <label>Altura</label>
            <input type="text" name="pro_altura" id="pro_altura" class="form-control"  placeholder="Altura" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_altura'];?>
">
        </div>

        <div class="col-md-2"> 
            <label>Largura</label>
            <input type="text" name="pro_largura" id="pro_largura" class="form-control"  placeholder="Largura" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_largura'];?>
">
        </div>

        <div class="col-md-2"> 
            <label>Comprimento</label>
            <input type="text" name="pro_comprimento" id="pro_comprimento" class="form-control"  placeholder="Comprimento" required value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_comprimento'];?>
">
        </div>


        <div class="col-md-12"> 
            <div class="col-md-3">
                <hr>
                <img src="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_img'];?>
" class="thumbnail">

            </div>
            <div class="col-md-6">
                <br><hr>

                <label>Imagem Principal</label>
                
                <input type="file" name="pro_img" id="pro_img" class="form-control thumbnail" > 

                
                <input type="hidden" name="pro_img_atual" id="pro_img_atual" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_img_atual'];?>
" >

                
                <input type="hidden" name="pro_img_arquivo" id="pro_img_arquivo" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_img_arquivo'];?>
" >   

            </div>
                <div class="col-md-3">
                        
                    
                </div>

        </div>

 
       <!-- Este texarea tem um plugin o caminho fica no inicio dessa pagina e abaixo do text are e complementado com um javascript para funcionar corretamente--> 
        <div class="col-md-12"> 
              <label>Descrição</label>
              <textarea  name="pro_desc" id="pro_desc" class="form-control"   rows="5"></textarea>            
        </div>
        <?php echo '<script'; ?>
>tinymce.init({ selector: 'textarea' });<?php echo '</script'; ?>
>   
       <!-- E preciso coloca-lo aqui abaixo do text area-->  
        

        <div class="col-md-12"> 
            <label>Slug</label>
            <input type="text" name="pro_slug" id="pro_slug" class="form-control" readonly value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_slug'];?>
">
        </div>

        <div class="col-md-4"> 


        </div>

        <div class="col-md-4"> 
            <br>
            <button class="btn btn-success btn-block btn-lg"  name="btn-gravar"> Gravar </button>
        </div>


        <div class="col-md-4 text-right">  </div>



        
        <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_id'];?>
">

    </form>

</section>  


<section class="row">
    <div class="col-md-4 text-right">  </div>
    <div class="col-md-4 text-right">  </div>
    <div class="col-md-4 text-right">
      
        
           <!--DATA-TOGGLE= COLLAPSE   OCULTA O BOTÃO APAGAR ABIXO   E CHAMA ELE TAMBEM-->
        <button class="btn btn-danger  btn-lg"  name="btn-gravar" data-toggle="collapse" 
                data-target="#btnapagar"><i class="glyphicon glyphicon-remove"></i> Apagar Produto</button>
       
        
    </div>
    <div class="col-md-12 text-center collapse alert alert-danger" id="btnapagar"> 
        <br>
         

        <form name="frm_apagar" method="post" action="">

             <label>Apagar Este Produto?</label>   
             <input type="radio" name="confirmar" value="SIM" required> 
             <br>
                
            <!-- APAGA O PRODUTO DE UMA VEZ -->
            <button class="btn btn-danger  btn-lg"  name="btn-apagar"><i class="glyphicon glyphicon-remove"></i> OK</button>
            
            
            <input type="hidden" name="pro_id_apagar" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_id'];?>
">   
            <input type="hidden" name="pro_apagar" value="SIM">  
            
             
                <input type="hidden" name="pro_img_arquivo" id="pro_img_arquivo" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value[1]['pro_img_arquivo'];?>
" >   

                
        </form>

    </div>

</section>   

<br><br><br><br><?php }
}
