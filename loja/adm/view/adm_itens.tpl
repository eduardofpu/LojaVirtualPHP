<h4 class="text-center">Dados do Pedido</h4>


<!-- Informações sobre o pedido -->
<section class="row">
    
    <center>
    <table class="table table-bordered" style="width: 80%">
        
         <tr class="bg-info">
                          
             <td><b>DATA:</b> {$ITENS.1.ped_data}</td>
             <td><b>HORA:</b> {$ITENS.1.ped_hora}</td>
             <td><b>REF:</b> {$ITENS.1.ped_ref}</td>
             <td><b>Status:</b> {$ITENS.1.ped_pag_status}</td>
        </tr>
        
        
                
    </table>
  </center>      
    
    
</section>

        

<section class="row" id="listaitens">
    
    
    <center>
    <table class="table table-bordered" style="width: 80%">
        
         <tr class="text-success bg-success">
            
            <td class="text-center">Imagem </td>
            <td class="text-center">Item </td>
            <td class="text-center">Valor Uni </td>
            <td class="text-center">X</td>
            <td class="text-center">Sub</td>
        </tr>
        
        
        {foreach from=$ITENS item=P}  
        <tr>
            
            <td><img src="{$P.item_img}" alt=""> </td>
            <td>{$P.item_nome} </td>
            <td class="text-right">{$P.item_valor} </td>
            <td class="text-center">{$P.item_qtd} </td>
            <td class="text-right">{$P.item_sub} </td>
        </tr>
        {/foreach}     
        
        
    </table>
  </center>      
</section>
        
        
        

<!-- Informações sobre o pedido -->
<section class="row" id="resumo">
    
    <center>
    <table class="table table-bordered" style="width: 80%">
        
         <tr class="bg-warning">
             <td class="tex-danger"><b>Frete:</b> {$ITENS.1.ped_frete_valor}</td>
             <td class="tex-danger"><b>Total:</b> {$TOTAL}</td>
             <td class="tex-danger"><b>Final:</b> {$ITENS.1.ped_frete_valor+$TOTAL}</td>
        </tr>
        
        
                
    </table>
  </center>      
    
    
</section>        