<html>
<?php
   include("databaseconnect.php");
   include('session.php');
   $sql = mysqli_query($conn,"select nombreFracc, descripcionFracc from catalogofraccionamiento where idFraccionamiento = '$idFracc' ");
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $fracc =  $row["nombreFracc"];
   $descfracc =  $row["descripcionFracc"];
?>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Residentes</title>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/site.css" />
    <link rel="shortcut icon" type="image/jpg" href="images/logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </head>
  <style>
    footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: gray;
   color: white;
   text-align: center;
            }
    .navbar {
   background-image: url('images/fraccionamientos/<?php echo $idFracc; ?>.jpg');
   background-size: cover;
   background-position: center;
    }
    a {
   color:black;
   text-decoration: none; 
   background-color: none;
    }
   a:hover{
      color:black;
      text-decoration:none
   }
   p {
       text-align : justify;
   }
   </style>
   <script>
    $(document).ready(function(){
      $('.toast').toast('show');
    });
</script>
 <body>    
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <h1 style="font-style: italic; font-weight: bold; color:white;"><?php echo $fracc; ?></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex flex-row-reverse bd-highlight">
                  <div class="p-2 bd-highlight"><a href="logout.php">Cerrar Sesión</a></div> 
                  <div class="p-2 bd-highlight"><a href="#uco">UCO</a></div>
                  <div class="p-2 bd-highlight"><a href="#amenidades">Amenidades</a></div>
                  <div class="p-2 bd-highlight"><a href="#formatos">Formatos</a></div> 
                  <div class="p-2 bd-highlight"><a href="#comprobantes">Comprobantes</a></div> 
                  <div class="p-2 bd-highlight"><a style="color: black;">Bienvenido <?php echo $login_session; ?></a></div>                                                 
               </div>
            </div>
        </nav>
    </header>
    <?php
    $sql = "SELECT idAnuncio FROM controlanunciosfracc WHERE idFraccionamiento = '$idFracc' AND activo = 1 ";
    $resultset = mysqli_query($conn, $sql) or die("No existe conexión con la base de datos:". mysqli_error($conn));
    while( $notificaciones = mysqli_fetch_assoc($resultset) ) {
    $idAnun = $notificaciones ['idAnuncio'];
    $query = mysqli_query($conn,"SELECT Mensaje FROM controlanuncios WHERE idAnuncio = '$idAnun' ");
    $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
    $message = $row["Mensaje"];
    ?>
    <div class="float-right">
    <div class="toast" data-autohide="false">
      <div class="toast-header">
        <img src="images/logo.png" class="rounded mr-2" width="20" height="20">
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
    <h3 style="color:gold">BIENVENIDO</h3>   
    <p>
      <?php echo $descfracc; ?>
    </p>
    <center>
        <a href="formatosHOA/10_Reglas_de_Punta_Mita.pdf" class="btn btn-info" download="10_Reglas_de_Punta_Mita.pdf">Reglamento</a>
    </center>
</div>
<br />
<div id="comprobantes" class="container">
    <h3 style="color:gold">COMPROBANTES</h3>
    <center>
        <div class="row">
            <div class="col-sm">
                <img src="images/factura.svg" width="100" height="100" />
                <p>Recibo de Agua</p>
            </div>
            <div class="col-sm">
                <img src="images/factura.svg" width="100" height="100" />
                <p>Recibo de Luz</p>
            </div>
            <div class="col-sm">
                <img src="images/factura.svg" width="100" height="100" />
                <p>Recibo de Gas</p>
            </div>
        </div>
    </center>
</div>
<br />
<div id="formatos" class="container">
    <h3 style="color:gold;">FORMATOS</h3>
    <div class="row">
        <div class="col">
            <img src="images/documento.svg" width="100" height="100" href="formatosHOA/Formato_huespedes_amenidades_a_Punta_Mita_2021.pdf" download="Formato_huespedes_amenidades_a_Punta_Mita_2021.pdf" />
            <p>Formato Huespedes Amenidades a Punta Mita</p>
        </div>
        <div class="col">
            <img src="images/documento.svg" width="100" height="100" href="formatosHOA/Punta_Mita_amenity_access_card_format_2021.pdf" download="Punta_Mita_amenity_access_card_format_2021.pdf" />
            <p>Formato Huespedes Amenidades a Punta Mita (ingles)</p>
        </div>
        <div class="col">
            <img src="images/documento.svg" width="100" height="100" href="formatosHOA/Ruta_de_transporte_temporada_Alta_2021.pdf" download="Ruta_de_transporte_temporada_Alta_2021" />
            <p>Ruta de Transporte Temporada Alta</p>
        </div>
        <div class="col">
            <img src="images/documento.svg" width="100" height="100" href="formatosHOA/Rutas_de_transporte_temporada_Baja_2021.pdf" download="Ruta_de_transporte_temporada_Baja_2021" />
            <p>Ruta de Transporte Temporada Baja</p>
        </div>
    </div>
</div>
<br />
<br />
<div id="amenidades" class="container">
    <h3 style="color:gold;">AMENIDADES</h3>
</div>
<br />
<br />
<div id="uco" class="container">
    <h3 style="color:gold;">UNIDAD CENTRAL OPERATIVA</h3>
    <br />
    <h5 style="color:gold;">!Bienvenido!</h5>
    <p>Por favor llena el formulario a continuación y nosotros te contactaremos pronto.</p>
    <br />
    <br />
    <form>
        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Sobre: </label>
            <div class="col-sm-10">
                <select class="form-control form-control-lg">
                    <option>Por favor, elija una</option>
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
 </body>
      <footer class="border-top footer">
        <div class="container">
            <p>2021 - Punta Mita HOA</p>    
        </div>
    </footer>  
 <html>
 