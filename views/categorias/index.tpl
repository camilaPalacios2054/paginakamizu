<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">
            {$asunto}
            
        </h5>   

        <div class="card-body">
            {include file="../partials/_messages.tpl"}
            
            {if isset($categorias) && count($categorias)}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$categorias item=model}
                            <tr>
                                <td>{$model.id}</td>
                                <td>{$model.nombre}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>          
       
            {else}
                <p class="text-info">{$mensaje}</p>

            {/if} 

            <a href="{$_layoutParams.root}categorias/create" class="btn btn-outline-dark btn-sm">Nueva categoria</a> 

        </div>

    </div>

</div>