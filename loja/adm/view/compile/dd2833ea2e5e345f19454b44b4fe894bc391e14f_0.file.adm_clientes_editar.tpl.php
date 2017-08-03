<?php
/* Smarty version 3.1.31, created on 2017-07-31 09:47:52
  from "C:\xampp\htdocs\loja\adm\view\adm_clientes_editar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597f26f8863e45_00242331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd2833ea2e5e345f19454b44b4fe894bc391e14f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_clientes_editar.tpl',
      1 => 1501505267,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f26f8863e45_00242331 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center">Detalhes do Cliente</h4>


<!--Dados do cadastro-->
<form name="cadcliente" id="cadcliente" method="post" action="">
   
     
     
<section class="row" id="cadastro">
        
        <div class="col-md-4">
            <label>Nome:</label>
            <input type="text" name="cli_nome" value="<?php echo $_smarty_tpl->tpl_vars['CLI_NOME']->value;?>
" class="form-control" minlength="3"  required>
            
        </div>
        
         <div class="col-md-4">
            <label>Sobre Nome:</label>
            <input type="text" name="cli_sobrenome" value="<?php echo $_smarty_tpl->tpl_vars['CLI_SOBRENOME']->value;?>
" class="form-control" minlength="3" required>
            
        </div>
        
        
         <div class="col-md-3">
            <label>Data de Nascimento:</label>
            <input type="date" name="cli_data_nasc" value="<?php echo $_smarty_tpl->tpl_vars['CLI_DATA_NASC']->value;?>
"class="form-control" required>
            
        </div>
        
        
         <div class="col-md-2">
            <label>RG:</label>
            <input type="text" name="cli_rg" value="<?php echo $_smarty_tpl->tpl_vars['CLI_RG']->value;?>
" class="form-control" required>
            
        </div>
        
        
        <div class="col-md-2">
            <label>CPF:</label>
            <input type="text" name="cli_cpf" value="<?php echo $_smarty_tpl->tpl_vars['CLI_CPF']->value;?>
" class="form-control" minlength="11" maxlength="11" required >
            
        </div>
        
        <div class="col-md-2">
            <label>DDD:</label>
            <input type="number" name="cli_ddd" value="<?php echo $_smarty_tpl->tpl_vars['CLI_DDD']->value;?>
" class="form-control" minlength="10" maxlength="99" required>
            
        </div>
        
        
        
        <div class="col-md-3">
            <label>Fone:</label>
            <input type="number" name="cli_fone" value="<?php echo $_smarty_tpl->tpl_vars['CLI_FONE']->value;?>
" class="form-control" required>
            
        </div>
        
        
        <div class="col-md-3">
            <label>Celular:</label>
            <input type="number" name="cli_celular" value="<?php echo $_smarty_tpl->tpl_vars['CLI_CELULAR']->value;?>
" class="form-control" required>
            
        </div>
        
        
        
        
         <div class="col-md-6">
            <label>Endereço:</label>
            <input type="text" name="cli_endereco" value="<?php echo $_smarty_tpl->tpl_vars['CLI_ENDERECO']->value;?>
"class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-2">
            <label>Numero:</label>
            <input type="number" name="cli_numero" value="<?php echo $_smarty_tpl->tpl_vars['CLI_NUMERO']->value;?>
" class="form-control" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Bairro:</label>
            <input type="text" name="cli_bairro" value="<?php echo $_smarty_tpl->tpl_vars['CLI_BAIRRO']->value;?>
" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Cidade:</label>
            <input type="text" name="cli_cidade" value="<?php echo $_smarty_tpl->tpl_vars['CLI_CIDADE']->value;?>
" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-2">
            <label>Estado:</label>
            <input type="text" name="cli_uf" value="<?php echo $_smarty_tpl->tpl_vars['CLI_UF']->value;?>
" class="form-control" minlength="2" maxlength="2"required>
            
         </div>
        
        <div class="col-md-2">
            <label>Cep:</label>
            <input type="text" name="cli_cep" value="<?php echo $_smarty_tpl->tpl_vars['CLI_CEP']->value;?>
" class="form-control" minlength="8" maxlength="8" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Email:</label>
            <input type="text" name="cli_email" value="<?php echo $_smarty_tpl->tpl_vars['CLI_EMAIL']->value;?>
" class="form-control" required>
            
        </div>
    
    

</section>
 <br><br>
<section class="row" id="btngravar">
   
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      
        
        <button type="submit" class="btn btn-geral btn-block"><i class="glyphicon glyphicon-ok"></i> Alterar</button>
        
        <input type="hidden" name="cli_id" value="<?php echo $_smarty_tpl->tpl_vars['CLI_ID']->value;?>
">
    </div>
    
    <div class="col-md-4"> </div>
    
    
</section>


</form> 
<br><br><br><br><?php }
}
