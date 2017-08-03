<!--plugin editor tinymce-->

<script src="{$GET_TEMA}/tema/js/tinymce/tinymce.min.js"></script>


<h4 class="text-center">Adcionar produtos novo</h4>
<hr>
<!--começa os campos para produto-->
<section class="row" id="camposproduto">
    
    <form name="frm_produto" method="post" action="" enctype="multipart/form-data">
   
        <div class="col-md-6"> 
             <label>Produto</label>
            <input type="text" name="pro_nome" id="pro_nome" class="form-control"  placeholder="Produto" required >
        </div>
        
        <div class="col-md-4"> 
            <label>Categoria</label>
            <select name="pro_categoria" id="pro_categoria" class="form-control" required >
                
                <option value="">Escolha</option>                                
                {foreach from=$CATEGORIAS item=C}                    
                <option value="{$C.cate_id }">{$C.cate_nome}</option>
                {/foreach}                            
            </select>
        </div>
        
        
         <div class="col-md-2"> 
             <label>Ativo</label>
            <select name="pro_ativo" id="pro_ativo" class="form-control" required >
                <option value="">Escolha</option>
                <option value="NAO">NAO</option>
                <option value="SIM">SIM</option>
            </select>
        </div>
        
        
        
         <div class="col-md-3">  
              <label>Modelo</label>
            <input type="text" name="pro_modelo" id="pro_modelo" class="form-control"  placeholder="Modelo"  >
        </div>
        
         <div class="col-md-2"> 
              <label>Referência</label>
            <input type="text" name="pro_ref" id="pro_ref" class="form-control"  placeholder="Referência"  >
        </div>
        
         <div class="col-md-2"> 
              <label>Valor</label>
             <input type="text" name="pro_valor" id="pro_valor" class="form-control"  placeholder="Valor" required >
        </div>
        
         <div class="col-md-2"> 
              <label>Estoque</label>
             <input type="text" name="pro_estoque" id="pro_estoque" class="form-control">
        </div>
        
         <div class="col-md-2"> 
              <label>Peso</label>
             <input type="text" name="pro_peso" id="pro_peso" class="form-control"  placeholder="Peso" required >
        </div>
        
         <div class="col-md-2"> 
              <label>Altura</label>
             <input type="text" name="pro_altura" id="pro_altura" class="form-control"  placeholder="Altura" required >
        </div>
        
        <div class="col-md-2"> 
             <label>Largura</label>
             <input type="text" name="pro_largura" id="pro_largura" class="form-control"  placeholder="Largura" required >
        </div>
        
         <div class="col-md-2"> 
              <label>Comprimento</label>
             <input type="text" name="pro_comprimento" id="pro_comprimento" class="form-control"  placeholder="Comprimento" required >
        </div>
        
       
         <div class="col-md-12"> 
             <div class="col-md-3">
                 
                 
                </div>
              <div class="col-md-6">
                  <br><hr>
                  
                  <label>Imagem Principal</label>
                  <input type="file" name="pro_img" id="pro_img" class="form-control" >       
                  
              </div>
              <div class="col-md-3"></div>
             
        </div>
        
        
       <!-- Este texarea tem um plugin o caminho fica no inicio dessa pagina e abaixo do text are e complementado com um javascript para funcionar corretamente--> 
        <div class="col-md-12"> 
              <label>Descrição</label>
              <textarea  name="pro_desc" id="pro_desc" class="form-control"   rows="5"></textarea>            
        </div>
        <script>tinymce.init({ selector: 'textarea' });</script>   
       <!-- E preciso coloca-lo aqui abaixo do text area-->  
        
        
        
        <div class="col-md-12"> 
              <label>Slug</label>
              <input type="text" name="pro_slug" id="pro_slug" class="form-control" readonly >
        </div>
        
        <div class="col-md-4"> 
            
            
         </div>
        
        <div class="col-md-4"> 
            <br>
            <button class="btn btn-success btn-block btn-lg"  name="btn-gravar"> Gravar </button>
         </div>
       
    
  </form>
    
    
</section>
<br><br><br><br>