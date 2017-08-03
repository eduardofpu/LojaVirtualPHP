    
<h3 class="text-center text-danger">Ocorreu um problema no pagamento, ou foi cancelado</h3>
<hr>


<section class="row">
    
    <div class="col-md-4"></div>
    <div class="col-md-4 thumbnail">
        
        <p>Caso tenha algum problema entre em contato com nosco, informando<br>
        o código  de referência:<b> {$REF} </b>
        </p>
        
        <p>Ou pode tentar novamente o pagamento na seção "Pedidos" clicando em "Detalhes",<br>
        verá seus itens comprados e abaixo o botão "Completar Pagamento Agora" 
        </p>
        
        <p>
            Para ir a tela do pedido e efetivar o pagamento, clique no botão.
        </p>
        
        <p>
            
        <form name="pagamento" method="post" action="{$PAG_ITENS}">            
            <input type="hidden" name="cod_pedido" value="{$REF}">
            <button class="btn btn-success btn-block btn-lg">Fazer o Pagamento Agora</button>
        </form>
        
        </p>
        
        
    </div>
    <div class="col-md-4"></div>
</section>