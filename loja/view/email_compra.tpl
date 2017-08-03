<h3>Olá {$NOME_CLIENTE},você registrou uma compra em {$SITE_NOME} <br>
    
    <a href="{$SITE_HOME}">{$SITE_HOME}</a>
    
 
 
</h3>

<section class="row">
    
    <h4>Para acessar sua conta e ter um histórico dos seus pedidos acesse nosso site, e sua conta</h4><br>
    <a href="{$PAG_MINHA_CONTA}">Minha Conta: {$PAG_MINHA_CONTA}</a>
    
</section>


<section class="row">
    <center>
        <div class="alert alert-success">Itens do seu pedido</div>
        <br>
        <table class="table table-bordered" style="width: 95%">
            
            {foreach from=$PRO item=P}
                <tr style="border: 1px solid #96dd3b">
                    <!-- <td> <img src="{$P.pro_img}" alt="{$P.pro_nome}"}  </td>-->
                    <td> {$P.pro_nome}  </td>
                    <td> {$P.pro_valor}  </td>           
                    <td> {$P.pro_qtd}  </td>
                    <td> {$P.pro_subtotal}  </td>

                   

                </tr>
            {/foreach} 
        </table>  
    </center>  
</section>
{*Fim table*}        


{* Botões de baixo e total do valor*}
<section class="row">

    <div class="col-md-4 text-right">       

    </div>
    <div class="col-md-4 text-right">       

    </div>

    <div class="col-md-4 text-right text-danger bg-warning">

        <h4>Total: R$ {$TOTAL}</h4>
        <h4>Frete: R$ {$FRETE}</h4>
        <h4>Final: R$ {$TOTAL_FRETE}</h4>
    </div>
    
  
</section>
    
    
        
