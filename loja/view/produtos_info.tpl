
{foreach from=$PRO item=P}
        
    <h3 class="text-center">{$P.pro_nome} - Ref: {$P.pro_ref}</h3>
<hr>

<div class="row">
    
    <!--  -->
    {*  div da direita imagem do produto  *}
    <div class="col-md-6">
        
        <img class="thumbnail" src="{$P.pro_img_g}" alt="">
        
    </div>
        
        
     
     {*  <!--  div da direita info do produto-->  *}
    <div class="col-md-6 thumbnail">
        
        <img src="{$TEMA}/images/logo-pagseguro.png" alt="">
        <hr>
        
        
        
        <div class="col-md-6">
            <h3 class="text-center text-danger preco" >R$ {$P.pro_valor}</h3>   
        </div>
        
        <div class="col-md-6">
         
            <form name="carrio" method="post" action="{$PAG_COMPRAR}">
                <input type="hidden" name="pro_id" value="{$P.pro_id}">
                 <input type="hidden" name="acao" value="add">
               <button class="btn btn-geral btn-lg">Comprar</button>
           
            </form>
            
        </div>
        
      
       
       
       
    </div>
    
</div>
       
       <!--  Listagem de imagens extras-->
       <div class="row">
           <hr>
          <h4 class="text-center">Mais imagens</h4>
          
          <ul style="list-style:none">
              {foreach from=$IMAGES item=I}
              <li class="col-md-3">
                  <img src="{$I.img_nome}" alt="" class="thumbnail">
                 
                  
              </li>
              {/foreach}
          </ul>
             
          
          
           
       </div>    
           
       <!--  Descrição-->
       <div class="row">
           <hr>
           <h4 class="text-center">Descrição do Produto</h4>
               
           {$P.pro_desc}
           
       </div>  
           
       <br><br>       

{/foreach}