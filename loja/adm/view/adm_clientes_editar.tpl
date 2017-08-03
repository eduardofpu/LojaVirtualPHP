<h4 class="text-center">Detalhes do Cliente</h4>


<!--Dados do cadastro-->
<form name="cadcliente" id="cadcliente" method="post" action="">
   
     
     
<section class="row" id="cadastro">
        
        <div class="col-md-4">
            <label>Nome:</label>
            <input type="text" name="cli_nome" value="{$CLI_NOME}" class="form-control" minlength="3"  required>
            
        </div>
        
         <div class="col-md-4">
            <label>Sobre Nome:</label>
            <input type="text" name="cli_sobrenome" value="{$CLI_SOBRENOME}" class="form-control" minlength="3" required>
            
        </div>
        
        
         <div class="col-md-3">
            <label>Data de Nascimento:</label>
            <input type="date" name="cli_data_nasc" value="{$CLI_DATA_NASC}"class="form-control" required>
            
        </div>
        
        
         <div class="col-md-2">
            <label>RG:</label>
            <input type="text" name="cli_rg" value="{$CLI_RG}" class="form-control" required>
            
        </div>
        
        
        <div class="col-md-2">
            <label>CPF:</label>
            <input type="text" name="cli_cpf" value="{$CLI_CPF}" class="form-control" minlength="11" maxlength="11" required >
            
        </div>
        
        <div class="col-md-2">
            <label>DDD:</label>
            <input type="number" name="cli_ddd" value="{$CLI_DDD}" class="form-control" minlength="10" maxlength="99" required>
            
        </div>
        
        
        
        <div class="col-md-3">
            <label>Fone:</label>
            <input type="number" name="cli_fone" value="{$CLI_FONE}" class="form-control" required>
            
        </div>
        
        
        <div class="col-md-3">
            <label>Celular:</label>
            <input type="number" name="cli_celular" value="{$CLI_CELULAR}" class="form-control" required>
            
        </div>
        
        
        
        
         <div class="col-md-6">
            <label>Endereço:</label>
            <input type="text" name="cli_endereco" value="{$CLI_ENDERECO}"class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-2">
            <label>Numero:</label>
            <input type="number" name="cli_numero" value="{$CLI_NUMERO}" class="form-control" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Bairro:</label>
            <input type="text" name="cli_bairro" value="{$CLI_BAIRRO}" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Cidade:</label>
            <input type="text" name="cli_cidade" value="{$CLI_CIDADE}" class="form-control" minlength="3" required>
            
         </div>
        
         <div class="col-md-2">
            <label>Estado:</label>
            <input type="text" name="cli_uf" value="{$CLI_UF}" class="form-control" minlength="2" maxlength="2"required>
            
         </div>
        
        <div class="col-md-2">
            <label>Cep:</label>
            <input type="text" name="cli_cep" value="{$CLI_CEP}" class="form-control" minlength="8" maxlength="8" required>
            
         </div>
        
         <div class="col-md-4">
            <label>Email:</label>
            <input type="text" name="cli_email" value="{$CLI_EMAIL}" class="form-control" required>
            
        </div>
    
    

</section>
 <br><br>
<section class="row" id="btngravar">
   
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      
        
        <button type="submit" class="btn btn-geral btn-block"><i class="glyphicon glyphicon-ok"></i> Alterar</button>
        
        <input type="hidden" name="cli_id" value="{$CLI_ID}">
    </div>
    
    <div class="col-md-4"> </div>
    
    
</section>


</form> 
<br><br><br><br>