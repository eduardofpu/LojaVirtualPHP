<?php
/* Smarty version 3.1.31, created on 2017-07-27 16:05:24
  from "C:\xampp\htdocs\loja\view\cadastro.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5979f324d0c4f0_84948213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1da27746e5f8c1c6b5f0a25407500fa28d92004' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\cadastro.tpl',
      1 => 1501164146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5979f324d0c4f0_84948213 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4>Cadastro de cliente</h4>

<!--Dados do cadastro-->
<form name="cadcliente" id="cadcliente" method="post" action="">
   
     
     
<section class="row" id="cadastro">
        
        <div class="col-md-4">
            <label>Nome:</label>
            <input type="text" name="cli_nome" class="form-control" minlength="3"  required>
            
        </div>
        
         <div class="col-md-4">
            <label>Sobre Nome:</label>
            <input type="text" name="cli_sobrenome" class="form-control" minlength="3" required>
            
        </div>
        
        
         <div class="col-md-3">
            <label>Data de Nascimento:</label>
            <input type="date" name="cli_data_nasc" class="form-control" required>
            
        </div>
        
        
         <div class="col-md-2">
            <label>RG:</label>
            <input type="text" name="cli_rg" class="form-control" required>
            
        </div>
        
        
        <div class="col-md-2">
            <label>CPF:</label>
            <input type="text" name="cli_cpf" class="form-control" minlength="11" maxlength="11" required>
            
        </div>
        
        <div class="col-md-2">
            <label>DDD:</label>
            <input type="number" name="cli_ddd" class="form-control" minlength="10" maxlength="99" required>
            
        </div>
        
        
        
        <div class="col-md-3">
            <label>Fone:</label>
            <input type="number" name="cli_fone" class="form-control" required>
            
        </div>
        
        
        <div class="col-md-3">
            <label>Celular:</label>
            <input type="number" name="cli_celular" class="form-control" required>
            
        </div>
        
        
        
        
         <div class="col-md-6">
            <label>Endereço:</label>
            <input type="text" name="cli_endereco" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-2">
            <label>Numero:</label>
            <input type="number" name="cli_numero" class="form-control" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Bairro:</label>
            <input type="text" name="cli_bairro" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Cidade:</label>
            <input type="text" name="cli_cidade" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-2">
            <label>Estado:</label>
            <input type="text" name="cli_uf" class="form-control" minlength="2" maxlength="2"required>
            
         </div>
        
        <div class="col-md-2">
            <label>Cep:</label>
            <input type="text" name="cli_cep" class="form-control" minlength="8" maxlength="8" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Email:</label>
            <input type="text" name="cli_email" class="form-control" required>
            
        </div>
    
    

</section>
 <br><br>
<section class="row" id="btngravar">
   
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
        <button type="submit" class="btn btn-geral btn-block"><i class="glyphicon glyphicon-ok"></i> Gravar</button>
    </div>
    
    <div class="col-md-4"> </div>
    
    
</section>


</form> <?php }
}
