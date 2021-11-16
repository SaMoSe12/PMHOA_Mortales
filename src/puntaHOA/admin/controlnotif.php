<html>
<?php
   include("../databaseconnect.php");
   include('session.php');  

   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = mysqli_real_escape_string($conn,$_POST['Mensaje']);
    $condo = mysqli_real_escape_string($conn,$_POST['Condominio']);
    $status = mysqli_real_escape_string($conn,$_POST['estatus']);
    $insertar = "INSERT INTO controlanunciosfracc (idFraccionamiento, idAnuncio, activo) VALUES ('$condo','$message','$status')";
         if (mysqli_query($conn, $insertar)) {
          $alerta = "Se asigno la notificacion de manera satifactoria";
         } else {
          $error = "No se asigno la notificacion introducida, favor de contactar a soporte con el siguiente codigo: " . $insertar . "<br>" . mysqli_error($conn);
         }
    } 
?>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrativos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="shortcut icon" type="image/jpg" href="../images/logo.png"/>
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
    a {
   color:black;
   text-decoration: none; 
   background-color: none;
    }
   a:hover{
      color:black;
      text-decoration:none
    }
    #myInput {
      background-image: url('../images/search.svg');
      background-position: 15px 15px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
</style>
<script type="text/javascript">
    $(document).ready(()=>{
    document.getElementById("myBtn").disabled = true;            
 }); 
 function myFunction() {
         var x = document.getElementById("myBtn").disabled;
         if (x == true) {
          document.getElementById("myBtn").disabled = false;    
         } 
 }
</script>
 <body>
     <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a href="homeAdmin.php?pag=1"><img src="../images/logo.png" width="120" height="120"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex flex-row-reverse bd-highlight">
                   <div class="p-2 bd-highlight"><a href="logout.php">Cerrar Sesión</a></div> 
                   <div class="p-2 bd-highlight"><a href="homeAdmin.php?pag=1" style="color: black;">Residentes</a></div>
                   <div class="p-2 bd-highlight"><a href="homeDocumentos.php?pag=1" style="color: black;">Documentos</a></div>
                   <div class="p-2 bd-highlight"><a style="color: black;">Bienvenido <?php echo $login_session; ?></a></div>
                </div>
            </div>
        </nav>
    </header>  
   <div class="container" id="notificaciones">
    <?php 
        if(!empty($error)){
        echo '<div class="alert alert-danger">' . $error . '</div>';
        }  
        if(!empty($alerta)){
        echo '<div class="alert alert-success">' . $alerta . '</div>';
        }      
    ?>
    <form class="form" action="" method="post">
     <div class="form-group">
            <label class="col-sm-2 col-form-label">Mensaje: </label>
                <select class="form-control" name="Mensaje" onchange="myFunction()" required>>
                    <option value="">Por favor, elija una opción</option>
                     <?php
                        $sql_query = "SELECT idAnuncio, Mensaje FROM controlanuncios";
                        $results = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
                        while( $descripcion = mysqli_fetch_assoc($results) ) {
                    ?>
                    <option value="<?php echo $descripcion ['idAnuncio']; ?>"><?php echo $descripcion ['Mensaje']; ?></option>
                    <?php
                    } 
                    ?>
                </select>
     </div>
      <div class="form-group">
            <label class="col-sm-2 col-form-label">Condominio Asignado: </label>
                <select class="form-control" name="Condominio" onchange="myFunction()" required>>
                    <option value="">Por favor, elija una opción</option>
                     <?php
                        $sql_query = "SELECT idFraccionamiento, nombreFracc FROM catalogofraccionamiento";
                        $results = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
                        while( $descripcion = mysqli_fetch_assoc($results) ) {
                    ?>
                    <option value="<?php echo $descripcion ['idFraccionamiento']; ?>"><?php echo $descripcion ['nombreFracc']; ?></option>
                    <?php
                    } 
                    ?>
                </select>
    </div>
    <div class="form-group">
            <label class="col-sm-2 col-form-label">Estatus: </label>
                <select class="form-control" name="estatus" onchange="myFunction()" required>>
                    <option value="">Por favor, elija una opción</option>
                    <option value="0">Inactivo</option>
                    <option value="1">Activo</option>
                </select>
    </div>
    </div>
    <br />
    <br />
        <center>
            <div class="form-row">
                <div class="col">                    
                <input type="submit" value="Añadir" class="btn btn-success" id="myBtn">
                </div>
                <div class="col">
                <button type="button" class="btn btn-danger"><a href="notificaciones.php?pag=1" style="color: white;">Regresar</a></button>
                </div>
            </div>
        </center>
        </form>
    <br/>
         <?php 
         mysqli_close($conn);
          ?>
      <footer class="border-top footer">
        <div class="container">
            <p>2021 - Punta Mita HOA</p>    
        </div>
    </footer>    
</body>
</html>