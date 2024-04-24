<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEREDAS MUSICALES</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-ZEwD3Fk9DIpdGMyh4xGTlVsXSDaCtfqdbkKCTMb4beUVDd6Kv5/XazdRJGRMh5jMvO9N62W5VhFtKk+YhuHrUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="imagenes/ICO.jpg">
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
      
        <div class="container py-4 text-center">
        <h2>Usuarios</h2>

<div class="row g-4">
    <div class="col-auto text-start">
        <label for="num_registros" class="col-form-label">Mostrar: </label>
    </div>
    <div class="col-auto text-start">
        <select name="num_registros" id="num_registros" class="form-select">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="col-auto text-start">
        <label for="num_registros" class="col-form-label">registros </label>
    </div>
    <div class="col-md-4 col-xl-5"></div>
    <div class="col-6 col-md-1 text-end">
        <label for="campo" class="col-form-label">Buscar: </label>
    </div>
    <div class="col-6 col-md-3 text-end">
        <input type="text" name="campo" id="campo" class="form-control">
    </div>
</div>

<div class="row py-4">
    <div class="col">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="sort asc">ID Usuario</th>
                    <th class="sort asc">Nombre</th>
                    <th class="sort asc">Colegio</th>
                    <th class="sort asc">Edad</th>
                    <th class="sort asc">Sexo</th>
                    <th class="sort asc">Correo</th>
                    <th class="sort asc">Documento</th>
                    <th class="sort asc">Teléfono</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <!-- El id del cuerpo de la tabla. -->
            <tbody id="content">
                <!-- Aquí se mostrarán los registros de la tabla Usuarios -->
            </tbody>
        </table>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col-12 col-md-4">
        <label id="lbl-total"></label>
    </div>
    <div class="col-12 col-md-4" id="nav-paginacion"></div>
    <input type="hidden" id="pagina" value="1">
    <input type="hidden" id="orderCol" value="0">
    <input type="hidden" id="orderType" value="asc">
</div>
</div>
</div>
</div>
        </main>
           
            <footer class="footer">
                <div class="container footer__grid">
                  <nav class="nav nav--footer">
                      <a class="nav__items nav__item--footer" href="index.html">inicio</a>
                      <a class="nav__items nav__item--footer" href="index.html">sobre mi</a>
                      <a class="nav__items nav__item--footer" href="index.html">Integrantes</a>
                      <a class="nav__items nav__item--footer" href="index.html">Veredas</a>
          
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
                          <span class="footer__container-icons">
                            <a class="fa-brands fa-envelope footer__icon"href="Contactanos.html" target="blank"></a>
                            
                        </span>
                      </div>
          
                  </section>
          
              </div>
          
           </footer>
           <script src="app.js"></script>
              
              
              
              <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              <script src="https://kit.fontawesome.com/bb8e4952fc.js" crossorigin="anonymous"></script>
             

          </body>
          </html>