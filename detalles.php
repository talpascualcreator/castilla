<?php
require "config.php";
require "database.php";
$db = new Database();
$con  = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token  = isset($_GET['token']) ? $_GET['token'] : '';

if($id == ""   || $token ==  ""){
    echo "Error al procesar la peticion";
    exit;
}else{
    $token_tmp = hash_hmac("sha1", $id , KEY_TOKEN);
    if ($token == $token_tmp){

        $sql = $con ->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
        $sql ->execute([$id]);
        if($sql  -> fetchColumn() >0 ){
            $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");
            $sql ->execute([$id]);
            $row =  $sql  ->fetch(PDO::FETCH_ASSOC);
            $nombre = $row["nombre"];
            $descripcion = $row["descripcion"];
            $precio = $row["precio"];
            $descuento = $row["descuento"];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_images = "img/productos/" . $id . "/" ;
            $rutaimg =$dir_images . "flores.jpeg";

            if(!file_exists($rutaimg)){
                $rutaimg = "img/no-image.avif";
            }
                $imagenes = array();
                if(file_exists($dir_images)) {

                $dir = dir($dir_images);

                while(($archivo=$dir->read()) != false){
                    if($archivo != "flores.jpeg" && (strpos($archivo, "jpeg") || strpos($archivo, "jpg"))) {
                     $imagenes[] = $dir_images .$archivo; 
                    }
                }
          $dir->close(); 
              } 
        } else {
          echo "Error al procesar la petición";
      }
  } else {
      echo "Error al procesar la petición";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEREDAS MUSICALES</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="imagenes/ICO.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<header class="hero">

   
            
            
            <section class="hero__container">
                <div class="hero__texts">
                    <h1 class="hero__title"> VEREDAS MUSICALES</h1>
                    <h2 class="hero__subtitle">Es una iniciativa de la <b>Fundacion Batuta</b>, patrocinada por <b>Ecopetrol</b> y desarrollada por la <b>Corporacion Batuta Meta</b>, para implementar la <strong>iniciacion musical</strong>. En las veredas del departamento del Meta y todas las regiones, que asi lo quieran.</h2>
                    <a href="https://wa.me/+573165256627?texto=Quisiera%20consultar%20sobre%20el%20servicio" target="blank" class="hero__cta">contactanos 3165256627</a>
    
                </div>
    
             </section>
    
    
        </div>
        <div class="hero__wave" style="overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
     
        
     </header>
  
  <body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-1">


            <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      
      <img src="<?php echo $rutaimg?>" alt="flores" class="d-block w-100">
    </div>


    <?php foreach($imagenes as $img) {?>
    <div class="carousel-item ">
    <img src="<?php echo $img?>" alt="flores" class="d-block w-100">
    </div>
   <?php }?>

   </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


                
            </div>
            <div class="col-md-6 order-md-2">
                <h2><?php echo $nombre; ?></h2>

                <?php  if($descuento > 0) {?>
                   <p><del><?php echo MONEDA . number_format ($precio, 2, ".",","); ?></del></p>
                   <h2>
                    <?php echo MONEDA . number_format ($precio_desc, 2, ".",","); ?>
                    <small class="text-success" ><?php echo $descuento; ?>% de descuento</small>
                </h2>

                <?php }else { ?>

                <h2><?php echo MONEDA . number_format ($precio); ?></h2>

                <?php } ?>

                <P class="lead" >
                    <?php echo $descripcion; ?>
                </P>
             
            </div>
        </div>
    </div>
</main>
<footer class="footer">
                <div class="container footer__grid">
                  <nav class="nav nav--footer">
                      <a class="nav__items nav__item--footer" href="">inicio</a>
                      <a class="nav__items nav__item--footer" href="">sobre mi</a>
                      <a class="nav__items nav__item--footer" href="">Integrantes</a>
                      <a class="nav__items nav__item--footer" href="">Veredas</a>
          
                  </nav>
          
                  <section class="footer__contact">
                      <h3 class="footer__title">Contactanos</h3>
                      <div class="footer__icons">
                          <span class="footer__container-icons">
                              <a class="fa-brands fa-facebook footer__icon"href="https://www.facebook.com/CorporacionBatutaMeta" target="_blank"></a>
          
                          </span>
                          <span class="footer__container-icons">
                              <a class="fa-brands fa-whatsapp footer__icon"href="https://wa.me/+573165256627?texto=Quisiera%20consultar%20sobre%20el%20servicio" target="_blank"></a>
                              
                          </span>
                          <span class="footer__container-icons">
                              <a class="fa-brands fa-instagram footer__icon"href="https://instagram.com/batutameta?igshid=YmMyMTA2M2Y=" target="_blank"></a>
                              
                          </span>
          
                          <span class="footer__container-icons">
                              <a class="fa-brands fa-youtube footer__icon"href="https://www.youtube.com/results?search_query=batuta+virtual" target="blank"></a>
                              
                          </span>
                        </span>
                        <span class="footer__container-icons">
                          <a class="fa-brands fa-envelope footer__icon"href="Contactanos.html" target="blank"></a>
                          
                      </span>
                      </div>
          
                  </section>
          
              </div>
          
           </footer>
           
              
              
              
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              <script src="https://kit.fontawesome.com/bb8e4952fc.js" crossorigin="anonymous"></script>
          </body>
          </html>