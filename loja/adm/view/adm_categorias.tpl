<h4 class="text-center">Gerenciar Categorias</h4>

<section class="row">
    <form name="categoriainsere" method="post" action="">
        
        <div class="col-md-4">
            <input type="text" name="cate_nome" class="form-control" placeholder="Digite o Nome da Categoria" required>
        </div>
         <div><button class="btn btn-success" name="cate_nova" value="cate_nova"><i class="glyphicon glyphicon-plus"></i> Nova categoria</button></div>
         <div></div>
    </form>
   
    
</section>
<hr>

<section class="row" id="listarcategorias">
    
    
    <table class="table table-bordered">
        
        
        {foreach from=$CATEGORIAS item=C}
            
            <form name="categorias_editar" method="post" action="">    
        <tr>
            
            <td style="width: 70%">
                <input type="text" name="cate_nome" value="{$C.cate_nome}" class="form-control" required>
                  <input type="hidden" name="cate_id" value="{$C.cate_id}" >            
            </td>
            
            <td><button class="btn btn-success" name="cate_editar" value="cate_editar"><i class="glyphicon glyphicon-pencil"></i> Editar</button></td>            
            <td><button class="btn btn-danger" name="cate_apagar" value="cate_apagar"><i class="glyphicon glyphicon-trash"></i> Apagar</button></td>
            
            
        </tr>
        </form>
        
        {/foreach}
    </table>
    
</section>