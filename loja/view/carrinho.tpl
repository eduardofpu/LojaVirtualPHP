<script>
$(document).ready(function(){    

        
   // validar frete
     $('#buscar_frete').click(function(){  
        
      var CEP_CLIENTE = $('#cep_frete').val();
      var PESO_FRETE = $('#peso_frete').val();
       
        if (CEP_CLIENTE.length !== 8 ) {
        alert('Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto');  
         $('#frete').addClass(' text-center text-danger');
         $('#frete').html('<b>Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto</b>');
        $('#cep_frete').focus();
        } else {
            
        
       
        $('#frete').html('<img src="view/images/loader.gif"> <b>Carregando...</b>');
        $('#frete').addClass(' text-center text-danger');
      
        // carrego o combo com os bairros
       
        $('#frete').load('controller/frete.php?cepcliente='+CEP_CLIENTE+'&pesofrete='+PESO_FRETE);
 
 } // fim do IF digitei o CEP
      
 
    }); // fim do change
    
   
} ); // fim do ready

</script>



<img src="{$IMG_CARRINHO}/images/carrinho.jpg" alt=""} 

     <hr>


{*Botões e opções de cima*}
<section class="row">

    <div class="col-md-4">
        <a href="{$PAG_PRODUTOS}" class="btn btn-geral" title=""><i class="glyphicon glyphicon-shopping-cart"></i>
             Comprar mais</a>
    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4 text-right">
       
    </div>

</section>

<br>


{*Table Listagens de itens*}
<section class="row">
    <center>
        <table class="table table-bordered" style="width: 95%">
            <tr class="tex-danger bg-danger">
                <td></td>
                <td>Produto</td>
                <td>Valor $R</td>
                <td>X</td>
                <td>SubTotal R$</td>
                <td> </td>

            </tr>

            {foreach from=$PRO item=P}
                <tr>
                    <td> <img src="{$P.pro_img}" alt="{$P.pro_nome}"}  </td>
                    <td> {$P.pro_nome}  </td>
                    <td> {$P.pro_valor}  </td>           
                    <td> {$P.pro_qtd}  </td>
                    <td> {$P.pro_subtotal}</td>
                    

                    <td>
                        <form name="del" method="post" action="{$PAG_CARRINHO_ALTERAR}">
                            <input type="hidden" name="pro_id" value="{$P.pro_id}">
                            <input type="hidden" name="acao" value="del">
                            <button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-minus"></i></button> 

                        </form>

                    </td>

                </tr>
            {/foreach} 
        </table>{*Fim table*}      
    </center>  
</section>
{*Fim da listagem de itens*}        


{* Botões de baixo e total do valor*}
<section class="row" id="total">



    <div class="col-md-4 text-right">         

    </div>

    <div class="col-md-4 text-right text-danger bg-warning">

        <h4>Total: R$ {$TOTAL}</h4>

    </div>

    {*Botão de limpar tudo*}
    <div class="col-md-4">

        <form name="limpar" method="post" action="{$PAG_CARRINHO_ALTERAR}">

            
            <input type="hidden" name="acao" value="limpar">
            <input type="hidden" name="pro_id" value="{$P.pro_id}">           
           

            <button class="btn btn-danger btn-block"><i class="glyphicon glyphicon-trash"></i> Limpar tudo</button> 

        </form>

    </div>    

</section> 
 <hr>       
        
        
{*Bloco de frete*}
<section classe="row" id="dadosfrete">
    
    
   <div class=""></div>

   <div class="col-md-4"></div>
   

    <div class="col-md-4">
        <!--campos para tratar do frete-->
        
       
        <input type="text" name="cep_frete" class="form-control" id="cep_frete" value="" placeholder="Digite seu cep" >
        <input type="hidden" name="peso_frete" class="form-control"  id="peso_frete" value="{$PESO}" placeholder="Digite seu cep"  readonly>       
        <input type="hidden" name="frete_valor" class="form-control" id="frete_valor" value="0" placeholder="Digite seu cep" >
       
    </div>
        
        
     <!--Buscar  frete-->    
    <div class="col-md-4">
        
        
        <!-- Se o peso for menor que 1 Kg mostra g-->
        {if $PESO < 1.00}
        <button class="btn btn-geral btn-block" id="buscar_frete"><i class="glyphicon glyphicon-send"></i>
             Peso: {$PESO} g Calcular Frete</button>
        {/if}
        <!-- Se o peso for maior que 1 Kg mostra Kg-->
        {if $PESO >= 1.00}
         <button class="btn btn-geral btn-block" id="buscar_frete"><i class="glyphicon glyphicon-send"></i>
              Peso: {$PESO} Kg Calcular Frete</button> 
        {/if}
        
    </div>

</section>   
 <br> <br>        





 {*Bloco de confirmar*}
<section classe="row" id="confirmapedido">
    
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>  
    
    <div class="col-md-4">
       
    <form name="pedido_finalizar" id="pedido_finalizar" method="post" action="{$PAG_CONFIRMAR}">
        <!--mostra retorno do frete-->
        <span id="frete"></span>        
        <!--botao finalizar-->
        <button class="btn btn-geral btn-block btn-lg" type="submit"><i class="glyphicon glyphicon-thumbs-up"></i>
            Confirmar Pedido</button>
        
    </form>
</div> 
      
        
</section>
        
 <br><br<br><br>  
 <br><br<br><br> 