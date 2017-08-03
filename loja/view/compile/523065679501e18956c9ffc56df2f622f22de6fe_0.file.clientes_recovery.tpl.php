<?php
/* Smarty version 3.1.31, created on 2017-07-27 21:50:19
  from "C:\xampp\htdocs\loja\view\clientes_recovery.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597a43fb9f9780_04201941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '523065679501e18956c9ffc56df2f622f22de6fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\clientes_recovery.tpl',
      1 => 1501182137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597a43fb9f9780_04201941 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Clientes recovery</h3>

<h4 class="text-center">Digite seu Email Cadastrado para obter uma nova senha</h4>
<hr>
<form name="recuperarsenha" method="post" action="">
    
    
    <section>
        
        <div class="col-md-4"></div>
        <div class="col-md-4">            
            <input type="email" name="cli_email" id="cli_email" class="form-control" 
                  placeholder="Digite o seu Email Cadastrado" required>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-geral">Recuperar</button>
        </div>
        
    </section>
    
     
    
    
</form><?php }
}
