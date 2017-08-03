<h3 class="text-center">Gerenciar Pedidos</h3>
<hr>

<section class="row" id="pesquisa">
<!--Faz uma busca entre datas-->


    <form name="buscardata" method="post" action="">
        
        

        <div class="col-md-3">
            <input type="date" name="data_ini" class="form-control" required>


        </div>

        <div class="col-md-3">

            <input type="date" name="data_fim" class="form-control" required>

        </div>

        <div class="col-md-3">

            <button class="btn btn-success">Buscar por Data</button>

        </div>

        

    </form>


</section>
<br>
<section class="row">
    
<!--Faz uma busca por texto-->

    <form name="buscarefcod" method="post" action="">

        <div class="col-md-3">
            
            <input type="text" name="txt_ref" class="form-control" placeholder="REF" required>
        </div>
        <div class="col-md-3">
             <button class="btn btn-success">Buscar Referencia</button>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>

    </form>
    
    
    
</section>

<hr>

<section class="row" id="pedidos">



    <center>
        <table class="table table-bordered" style="width: 90%">
            <tr class="text-success bg-success">

                <td>Nome</td> 
                <td>DATA</td> 
                <td>HORA</td>
                <td>REF</td>
                <td>STATUS</td>
                <td>Detalhes</td>
                <td>        </td>

            </tr>
            {foreach from=$PEDIDOS item=P}
                <tr>

                    <td style="width: 30%">{$P.cli_nome}  {$P.cli_sobrenome}</td>
                    <td style="width: 10%">{$P.ped_data}</td>
                    <td>{$P.ped_hora}</td>
                    <td style="width: 10%">{$P.ped_ref}</td>



                    {if $P.ped_pag_status == 'NAO'}
                        <td style="width: 20%"><span class="label label-danger">{$P.ped_pag_status}</span></td>

                    {else}
                        <td style="width: 20%">{$P.ped_pag_status}</td>  

                    {/if}

             
                <td style="width: 10% ">
                      <!-- Formulario que vai para itens de pedidos-->
                <form name="itens" method="post" action="{$PAG_ITENS}">
                    <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
                  <button class="btn btn-info"><i class="glyphicon glyphicon-menu-hamburger"></i> Detalhes</button>
                </form>
                </td>
                
                
                <td style="width: 10% ">
                      <!-- Formulario que vai para itens de pedidos-->
                <form name="deletar" method="post" action="">
                    <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
                    <button class="btn btn-danger" name="ped_apagar" value="ped_apagar"><i class="glyphicon glyphicon-remove"></i></button>
                </form>
                </td>
                
                
                
                
                
                </tr>
            {/foreach}
        </table>
    </center>    


</section>
