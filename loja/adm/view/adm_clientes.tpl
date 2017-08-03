<h3 class="text-center">Gerenciar Clientes</h3>


<section class="row">
    
    
    <center>
    <table class="table table-bordered">
        
        <tr class="text-success bg-success">
            
            
            <td></td>
            <td>NOME</td>
            <td>EMAIL</td>
            <td>FONE</td>
            <td>DATA CAD</td>
            <td></td>
           
           
        </tr>
        {foreach from=$CLIENTES item=C}
            <tr>
            
                <td><a href="{$PAG_PEDIDOS}/{$C.cli_id}" class="btn btn-info">Pedidos</a></td>     
            <td>{$C.cli_nome} {$C.cli_sobrenome}</td>
            <td>{$C.cli_email}</td>
            <td>{$C.cli_fone}</td>
            <td>{$C.cli_data_cad}</td>
            <td><a href="{$PAG_EDITAR}/{$C.cli_id}" class="btn btn-info">Ver</a></td>
          
            
           
        </tr>
          {/foreach}      
        
        
    </table>
    </center>
</section>