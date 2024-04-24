<?php
require "config.php";
require "database.php";
$db = new Database();
$con  = $db->conectar();

$sql = $con ->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql ->execute();
$resultado =$sql->fetchAll(PDO::FETCH_ASSOC);

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
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <?php
  foreach($resultado as $row  ) { ?>
        <div class="col">
          <div class="card shadow-sm">
            <?php
              

              $id = $row['id'];
              $imagen= "img/productos/" . $id . "/flores.jpeg";

              if(!file_exists ($imagen)){
                $imagen = "img/no-photo.avif";
              }
            ?>
          <img src="<?php echo $imagen; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["nombre"]; ?></h5>
              <p class="card-text" ><?php echo number_format($row["precio"] ) ; ?></p>
             <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 <a href="detalles.php?id=<?php echo $row["id"];?>&token=<?php echo hash_hmac("sha1", $row["id"], KEY_TOKEN);?>" class="btn btn-primary" >Letra Cancion</a>
                </div>
                
              </div>
            </div>
          </div>
        </div> 
        <?php }?>     
        
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