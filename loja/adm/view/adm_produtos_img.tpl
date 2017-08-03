<h4 class="text-center">Imagens dos produtos</h4>
<hr>
<section class="row" id="novaimg">
    <form name="nova" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <input type="hidden" name="pro_id" value="{$PRO}">

            <input type="file" name="pro_img" class="form-control thumbnail" required>



        </div>

        <div class="col-md-4"><button class="btn btn-success">Enviar</button></div>
    </form>   
</section>
<hr>
<!-- lista as imagens extras dos produtos-->    
<section class="row" id="listarimg">
 <form name="deletar" method="post" action="">
     
    
            
    <ul style="list-style:none">
        {foreach from=$IMAGES item=I}
            <li class="col-md-3">
                <img src="{$I.img_nome}" alt="" class="thumbnail">
                <label>Apagar?</label>
                <input type="checkbox" class="input-lg" name="fotos_apagar[]" value="{$I.img_arquivo}">
                
                
            </li>
                        
        {/foreach}
        
        <!--id do produto para passar via post-->
                <input type="hidden" name="pro_id" value="{{$I.img_pro_id}}">
                
                
    </ul>
    
    <br>
    <section class="col-md-12 text-center" id="apagar">
        <hr>
        
        
        <button class="btn btn-danger">Apagar Marcas</button>
    </section>
    <br><br><br>
 </form>  
</section>
    <section>
        
        <br><br><br><br>
    </section>    
    