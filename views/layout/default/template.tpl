<!DOCTYPE html>
<html>
   <head>
   	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="frame de aplicaciones web">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{$title|default:"Kamizu"}</title>

    {include file="link_css.tpl"}


   </head>
   <body class="p-3 mb-2 bg-white text-dark">
    {include file="menu.tpl"}
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <div class="dropdown">

                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Menú
                </button>
              
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{$_layoutParams.root}roles">Roles</a></li>
                <li><a class="dropdown-item" href="{$_layoutParams.root}usuarios">Usuarios</a></li>
                <li><a class="dropdown-item" href="{$_layoutParams.root}categorias">Categoria</a></li>
                <li><a class="dropdown-item" href="{$_layoutParams.root}usuarios">Productos</a></li>
                </ul>
              

                </div>
            </div>
            <div class="col-md-10">
            
              {include file=$_content}
          </div>
        </div>
      </div>
   
    {include file="link_js.tpl"}

    <noscript>
      <p>Debe tener el soporte de Javascript habilitado</p>
    </noscript>

    {if isset($_layoutParams.js) && count($_layoutParams.js)}
      {foreach item=js from=$_layoutParams.js}
        <script type="text/javascript" src="{$js}"></script>
      {/foreach}

    {/if}
  </body>
</html>