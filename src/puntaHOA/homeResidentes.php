<html>
<?php
   include("databaseconnect.php");
   include('session.php');
   $_SESSION['fraccionamiento'] = $idFracc;
   $sql = mysqli_query($conn,"select nombreFracc, descripcionFracc from CatalogoFraccionamiento where idFraccionamiento = '$idFracc' ");
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $fracc =  $row["nombreFracc"];
   $descfracc =  $row["descripcionFracc"];
?>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Residentes</title>
    <link rel="stylesheet" href="puntaHOA/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/site.css" />
    <link rel="shortcut icon" type="image/jpg" href="puntaHOA/images/logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 </head>
  <style>
    footer {
   display: block;
   position: relative;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: gray;
   color: white;
   text-align: center;
            }
    .navbar {
   background-image: url('puntaHOA/images/fraccionamientos/<?php echo $idFracc; ?>.jpg');
   background-size: cover;
   background-position: center;
   height: 16rem;
   transition: height .3s ease-in;
    }
    .navbar.is-fixed-top{
        height: 3.5rem;
    }
    .navbar a {
   color:white !important;
   text-decoration: none; 
   background-color: none;
   transition: color .3s ease;
    }

   .navbar a:hover{
      color:grey;
      text-decoration:none
   }
   .navbar>.container{
       align-items: flex-start;
   }
   .navbar.is-fixed-tio>.container{
       align-items: center;
   }
   #comprobantes .col-sm a p, #formatos .col-sm a p {
        text-align: center;
        font-weight: 500;
        font-size: 1.025rem;
        letter-spacing: .25ch;
        margin: .5rem auto auto
   }
   p {
       text-align : justify;
   }
   a{
       color: black;
       text-decoration: none;
   }
   a:hover{
       text-decoration: none;
       color: black;
   }
   @media screen and (max-width: 768px){
       .toast{
            width: 100vw;

        }
    }
   </style>
 <body>    
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <h1 style="font-style: italic; font-weight: bold; color:white;"><?php echo $fracc; ?></h1>
                <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>-->
                <!--<div class="d-flex flex-row-reverse bd-highlight">
                  <div class="p-2 bd-highlight"><a href="logout.php">Cerrar Sesión</a></div> 
                  <div class="p-2 bd-highlight"><a href="#uco">UCO</a></div>
                  <div class="p-2 bd-highlight"><a href="#amenidades">Amenidades</a></div>
                  <div class="p-2 bd-highlight"><a href="#formatos">Formatos</a></div> 
                  <div class="p-2 bd-highlight"><a href="#comprobantes">Comprobantes</a></div> 
                  <div class="p-2 bd-highlight"><a>Bienvenido <?php echo $login_session; ?></a></div>                                                 
               </div>-->
            </div>
        </nav>
    </header>
    <?php
    $sql = "SELECT idAnuncio FROM ControlAnunciosFracc WHERE idFraccionamiento = '$idFracc' AND activo = 1 ";
    $resultset = mysqli_query($conn, $sql) or die("No existe conexión con la base de datos:". mysqli_error($conn));
    while( $notificaciones = mysqli_fetch_assoc($resultset) ) {
    $idAnun = $notificaciones ['idAnuncio'];
    $query = mysqli_query($conn,"SELECT Mensaje FROM ControlAnuncios WHERE idAnuncio = '$idAnun' ");
    $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
    $message = $row["Mensaje"];
    ?>
    <div class="float-right">
    <div class="toast" data-autohide="false">
      <div class="toast-header">
        <img src ="puntaHOA/images/logo.png" class="rounded mr-2" width="20" height="20">
        <strong class="mr-auto text-primary">Administración HOA</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      </div>
      <div class="toast-body">
        <?php echo $message; ?>
      </div>
    </div>
    </div>
    <?php
     }
     mysqli_close($conn);
    ?>
<div id="bienvenida" class="container">    
    <h3 style="color:#bc9742">BIENVENIDO <?php echo $login_session; ?></h3>   
    <p>
      <?php echo $descfracc; ?>
    </p>
    <center>
        <a href="puntaHOA/formatosHOA/10_Reglas_de_Punta_Mita.pdf" class="btn btn-info" download="10_Reglas_de_Punta_Mita.pdf">Reglamento</a>
    </center>
</div>
<br />
<div id="comprobantes" class="container">
    <h3 style="color:#bc9742" class="text-md-center text-lg-left">COMPROBANTES</h3>
    <center>
        <div class="row">
            <div class="col-sm">
                <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center"
                    href="puntaHOA/formatosHOA/201 A - 1ER SEM (ENERO & FEBRERO 2021) (1).pdf"
                    target="_blank"
                    download ="201 A - 1ER SEM (ENERO & FEBRERO 2021) (1).pdf"
                >
                    <img src ="puntaHOA/images/factura.svg" width="100" height="100" />
                    <p>Servicios</p>
                </a>
            </div>
            <div class="col-sm">
                <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center"
                    href="puntaHOA/formatosHOA/MA 201A - ENE'21 (al 2 feb) (1).pdf"
                    target="_blank"
                >
                    <img src ="puntaHOA/images/factura.svg" width="100" height="100" />
                    <p>Mantenimiento</p>
                </a>
            </div>
        </div>
    </center>
</div>
<br />
<div id="formatos" class="container">
    <h3 style="color:#bc9742;">FORMATOS</h3>
    <div class="row">
        <div class="col-sm">
            <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center" href="puntaHOA/formatosHOA/Formato_huespedes_amenidades_a_Punta_Mita_2021.pdf" download="Formato_huespedes_amenidades_a_Punta_Mita_2021.pdf" >
                <img src ="puntaHOA/images/documento.svg" width="100" height="100"/>
                <p>Formato Huespedes Amenidades a Punta Mita</p>
            </a>
        </div>
        <div class="col-sm">
            <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center" href="puntaHOA/formatosHOA/Punta_Mita_amenity_access_card_format_2021.pdf" download="Punta_Mita_amenity_access_card_format_2021.pdf">
                <img src ="puntaHOA/images/documento.svg" width="100" height="100"/>
                <p>Formato Huespedes Amenidades a Punta Mita (ingles)</p>
            </a>
        </div>
        <div class="col-sm">
            <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center" href="puntaHOA/formatosHOA/Ruta_de_transporte_temporada_Alta_2021.pdf" download="Ruta_de_transporte_temporada_Alta_2021">
                <img src ="puntaHOA/images/documento.svg" width="100" height="100"/>
                <p>Ruta de Transporte Temporada Alta</p>
            </a>          
        </div>
        <div class="col-sm">
            <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center" 
                href="puntaHOA/formatosHOA/Ruta de transporte temporada Alta_Ruta5.pdf" 
                download="Ruta_de_transporte_temporada_Alta_Ruta_5_2021.pdf"
            >
            <img src ="puntaHOA/images/documento.svg" width="100" height="100"/>
            <p>Ruta 5 de Transporte Temporada Alta</p>
            </a>
        </div>
        <div class="col-sm">
            <a class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center" href="puntaHOA/formatosHOA/Rutas_de_transporte_temporada_Baja_2021.pdf" download="Ruta_de_transporte_temporada_Baja_2021" >
                <img src ="puntaHOA/images/documento.svg" width="100" height="100"/>
                <p>Ruta de Transporte Temporada Baja</p>
            </a>
        </div>
    </div>
</div>
<br />
<br />
<div id="amenidades" class="container">
</div>
<br />
<br />
<div id="uco" class="container">
    <h3 style="color:#bc9742;">UNIDAD CENTRAL OPERATIVA</h3>
    <br />
    <h5 style="color:#bc9742;">!Bienvenido!</h5>
    <p>Por favor llena el formulario a continuación y nosotros te contactaremos pronto.</p>
    <br />
    <br />
    <form>
        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Sobre: </label>
            <div class="col-sm-10">
                <select name="sobre" class="form-control form-control-lg">
                    <option>Por favor, elija una</option>
                    <option value="1">Administracion</opcion>
                    <option value="2">Recidentes</opcion>
                    <option value="3">Resorts, Casas y Villas</opcion>
                    <option value="4">Informacion General</opcion>
                </select>
            </div>
        </div>
        <br/>
        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Asunto: </label>
            <div class="col-sm-10">
                <input class="form-control" type="text">
            </div>
        </div>
        <br/>
        <div class="form-group row">
            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Problema: </label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <br/>
        <center>
            <div class="form-group input-group-lg">
                <input type="submit" name="Enviar" class="btn btn-warning">
            </div>
        </center>
    </form>
</div>
<br/>
<br/>
<footer class="border-top footer">
  <div class="container">
      <p>2021 - Punta Mita HOA</p>    
  </div>
</footer>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="puntaHOA/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
       $(document).ready(function(){
        const navbar = document.querySelector('nav.navbar');
        $('.toast').toast('show');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 95){
                navbar.classList.add('is-fixed-top');
            }
            else{
                navbar.classList.remove('is-fixed-top');
            }
        });
    });
    </script>
 </body>
 <html>
 