<?php
/* Smarty version 3.1.31, created on 2017-07-27 21:28:40
  from "C:\xampp\htdocs\loja\view\clientes_senha.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597a3ee83107a3_90164320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ee06af0e65091b39af07c4ac53aa9504eadf95f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\clientes_senha.tpl',
      1 => 1501183716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597a3ee83107a3_90164320 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4 class="text-center">Alteração de Senha de acesso</h4>

<form name="alterarsenha" method="post" action="">
    
    
    <section>
        
        <div class="col-md-4"></div>
        <div class="col-md-4">            
            <input type="password" name="cli_senha_atual" id="cli_senha_atual" class="form-control" 
                   placeholder="Digite sua senha atual" required><br>
            
            <input type="password" name="cli_senha" id="cli_senha" class="form-control" 
                  placeholder="Digite sua nova senha" required>
            
            <br>
            <button type="submit" class="btn btn-geral btn-block">Alterar</button>
            
            
        </div>
         
         
        
        
    </section>
    
     
    
    
</form><?php }
}
