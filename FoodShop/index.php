<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Food Shop</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="dist/css/ratchet.min.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="dist/js/ratchet.min.js"></script>
  </head>
  <body>
  <nav class="bar bar-tab">
  <a class="tab-item active" href="index.php">
    <span class="icon icon-home"></span>
    <span class="tab-label">Inicio</span>
  </a>
  <a class="tab-item" href="allproducts.php">
    <span class="icon icon-list"></span>
    <span class="tab-label">Productos</span>
  </a>
  <a class="tab-item" href="#">
    <span class="icon icon-star-filled"></span>
    <span class="tab-label">Favoritos</span>
  </a>
  <a class="tab-item" href="#settingsModal">
    <span class="icon icon-gear"></span>
    <span class="tab-label">Acerca de</span>
  </a>
</nav>
    <header class="bar bar-nav">
      <h1 class="title">Food Shop</h1>
    </header>


    <div class="content">

      <div class="slider">
        <div class="slide-group">
          <div class="slide">
            <img src="img/argo.png" alt="Argo" >
          </div>
          <div class="slide">
             <img src="img/skyfall.png" alt="Skyfall" >
          </div>
          <div class="slide">
             <img src="img/ralph.png" alt="Wreck-It Ralph">
          </div>
        </div>
      </div>

      <ul class="table-view">
        <li class="table-view-cell table-view-divider">Ultimos 10 productos vendidos</li>
        <?php
                             
                            $productosURL = "http://pymesv.com/datos06w/Grupo6/API/datos/productos/lista";

                            $productosJSON = file_get_contents($productosURL);


                            $jproductos = json_decode($productosJSON);
                            $html = "";
                            $i = 1;
                            foreach($jproductos as $jprod) {
                                    if($i <= 10):
                                    $html .= '<li class="table-view-cell media">';
                                    $html .= '<a class="navigate-right" href="buy.php?id='.$i.'" data-transition="slide-in"> ';
                                    $html .= '<img class="media-object pull-left" src="http://placehold.it/64x64" alt="Placeholder image">';
                                    $html .= '<div class="media-body">';
                                    $html .= ''.$jprod->nombre.'';
                                    $html .= '<p>'.$jprod->descripcion.'</p>';
                                    $html .= '</div>';
                                    $html .= '</a>';
                                    $html .= '</li>';
                                    endif;
                                    $i++;
                                
                            }

                            echo $html;
                        ?> 
      </ul>
    </div><!-- /.content -->
<div id="settingsModal" class="modal">
      <header class="bar bar-nav">
        <a class="icon icon-close pull-right" href="#settingsModal"></a>
        <h1 class="title">Acerca de esta APP</h1>
      </header>

      <div class="content">

        <h5 class="content-padded">Por Giovanni Rodriguez para Ing de la web</h5>
      </div>
    </div><!-- /.modal -->
  </body>
</html>
