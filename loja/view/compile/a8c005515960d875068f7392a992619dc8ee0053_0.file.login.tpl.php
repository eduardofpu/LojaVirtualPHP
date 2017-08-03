<?php
/* Smarty version 3.1.31, created on 2017-07-28 05:15:21
  from "C:\xampp\htdocs\loja\view\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597aac49d57940_48511519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8c005515960d875068f7392a992619dc8ee0053' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\login.tpl',
      1 => 1501211719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597aac49d57940_48511519 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>
   
 <?php } else { ?>
     
     
<section class="row" id="fazerlogin">
    
    <form name="cliente_login" method="post" action="">
        
        <div class="col-md-4">
         
            
        </div>  
    
    <!-- aqui estão os campos-->
    <div class="col-md-4">  
        Não tenho cadastro? <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CADASTRO']->value;?>
" ><i class="glyphicon glyphicon-pencil"></i> Me cadastrar</a>
        <div class="form-group">
            <label>Email</label>  
          <input type="email" class="form-control " name="txt_email" value="" placeholder="Digite o seu Email" required>
          
        </div>
        
        <div class="form-group">
            <label>Senha</label>  
            <input type="password" class="form-control" name="txt_senha" value="" placeholder="Digite sua Senha" required>
          
        </div>
        
        <div class="form-group">
            
            <button class="btn btn-geral btn-block"><i class="glyphicon glyphicon-user"></i> Entrar </button>
       
        </div> 
        
        <div>
            
            <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_RECOVERY']->value;?>
" ><i class="glyphicon glyphicon-question-sign"></i> Esqueci a senha</a>
            
        </div>
    </div> <!-- finaliza aqui-->
    
    <div class="col-md-4"></div> 
    
   </form> 
</section>

<?php }
}
}
