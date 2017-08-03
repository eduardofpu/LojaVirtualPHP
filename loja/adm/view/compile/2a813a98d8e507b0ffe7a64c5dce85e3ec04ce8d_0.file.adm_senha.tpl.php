<?php
/* Smarty version 3.1.31, created on 2017-07-31 15:55:29
  from "C:\xampp\htdocs\loja\adm\view\adm_senha.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597f7d2123cda4_22955863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a813a98d8e507b0ffe7a64c5dce85e3ec04ce8d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_senha.tpl',
      1 => 1501525596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f7d2123cda4_22955863 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center">Alteração de Senha de acesso</h4>

<form name="alterarsenha" method="post" action="">
    
    
    <section>
        
        <div class="col-md-4"></div>
        <div class="col-md-4">            
            <input type="password" name="adm_senha_atual" id="adm_senha_atual" class="form-control" 
                   placeholder="Digite sua senha atual" required><br>
            
            <input type="password" name="adm_senha" id="adm_senha" class="form-control" 
                  placeholder="Digite sua nova senha" required>
            
            <br>
            <button type="submit" class="btn btn-default btn-block">Alterar</button>
            
            
        </div>
         
         
        
        
    </section>
    
     
    
    
</form><?php }
}
