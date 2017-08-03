{if $LOGADO == true}
   
 {else}
     
     
<section class="row" id="fazerlogin">
    
    <form name="cliente_login" method="post" action="">
        
        <div class="col-md-4">
         
            
        </div>  
    
    <!-- aqui estão os campos-->
    <div class="col-md-4">  
        Não tenho cadastro? <a href="{$PAG_CADASTRO}" ><i class="glyphicon glyphicon-pencil"></i> Me cadastrar</a>
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
            
            <a href="{$PAG_RECOVERY}" ><i class="glyphicon glyphicon-question-sign"></i> Esqueci a senha</a>
            
        </div>
    </div> <!-- finaliza aqui-->
    
    <div class="col-md-4"></div> 
    
   </form> 
</section>

{/if}