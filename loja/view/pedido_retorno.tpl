<h3 class="text-center bg-success"><i class="glyphicon glyphicon-thumbs-up"></i> Obrigado pelo seu pedido</h3>

<section class="row">
    
    
   <center> 
     <table class="table table-bordered" style="width: 100%">
            <tr class="text-success bg-success">
            
            <td>Código</td>
            <td>Referência</td>
            <td>Status do pagamento</td>
            <td>Forma de pagamento</td>
            <td></td>
            
        </tr>
        
        <tr>
            
            <td class="text-right"><b>{$CODIGO}</b> </td> 
            <td><b>{$REF}</b> </td> 
            <td><b><font color="green">{$PAGO}</font></b> </td> 
            <td><b>{$FORMA_PAG}</b> </td> 
            
           
             <td>
            
        <form name="pagamento" method="post" action="{$PAG_ITENS}">
            
            <input type="hidden" name="cod_pedido" value="{$REF}">
            <button class="btn btn-success btn-block">Detalhes deste pedido</button>
        </form>
        </td>
            
            
        </tr>
        
        
    </table>
   </center>   
    
</section>