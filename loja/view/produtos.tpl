
<hr>
{if $PRO_TOTAL < 1}

    <h4 class="alert alert-danger">Ops... Nada foi encontrado</h4>
{/if}



{* Paginação superior*}
<center>
    <section id="paginacao" class="row">

        {$PAGINAS}

    </section>    
</center> 



<section id="produtos" class="row">
    <ul style="list-style: none">

        {foreach from=$PRO item=P}


            <li class="col-md-4">
                {* 
                mostra o id dos produtos
                {$P.pro_id}
                
                *}

                <div class="thumbnail">

                    <a href="{$PRO_INFO}/{$P.pro_id}/{$P.pro_slug}">

                        <img src="{$P.pro_img}" alt="">

                        <div class="caption">
                            <h4 class="text-center">{$P.pro_nome}</h4>
                            <h3 class="text-center text-danger" >R$ {$P.pro_valor}</h3>

                        </div>
                    </a>

                </div>

            </li>
        {/foreach}

    </ul>
</section>

{* Paginação inferior*}
<center>
    <section id="paginacao" class="row">

        {$PAGINAS}

    </section>    
</center> 
<hr>
