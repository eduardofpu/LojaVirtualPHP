<h4>Meus Pedidos</h4>

<section class="row" id="pedidos">
    
    
    <h4 class="text-center" >Meus pedidos</h4>
    <center>
        <table class="table table-bordered" style="width: 90%">
            <tr class="text-danger bg-danger">
                
                <td>DATA</td> 
                <td>HORA</td>               

                <td>REF</td>
                <td>COD</td>
                
                
                
                <td>STATUS</td>
                
                <td>Detalhes</td>
                
            </tr>
            {foreach from=$PEDIDOS item=P}
            <tr>
                
                <td style="width: 10%">{$P.ped_data}</td>
                <td>{$P.ped_hora}</td>
                <td style="width: 10%">{$P.ped_ref}</td>
                <td style="width: 10%">{$P.ped_cod}</td>

                
                
                
                {if $P.ped_pag_status == 'NAO'}
                    <td style="width: 20%"><span class="label label-danger">{$P.ped_pag_status}</span></td>
                {elseif $P.ped_pag_status == 'Pago'}
                    <td style="width: 20%"><span class="label label-success">{$P.ped_pag_status}</span></td>
                 
                {else}
                    <td style="width: 20%"><span class="label label-default">{$P.ped_pag_status}</span></td>  
                    
                {/if}
                
                
            <form name="itens" method="post" action="{$PAG_ITENS}">
                <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
                <td style="width: 10%"><button class="btn btn-default"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button></td>
             </form>   
            </tr>
            {/foreach}
        </table>
        
    </center>    
   

</section>
