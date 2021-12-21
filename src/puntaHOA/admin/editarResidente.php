<html>
<?php
   $id = $_GET['EDITAR_ID'];
   include("puntaHOA/databaseconnect.php");
   include('session.php');  

   $busca = "SELECT nombreResidente, apellidoResidente, propiedad, user, password, correoResidente, idFraccionamiento FROM CatalogoResidentes WHERE idResidente = '$id'";
      $resultado = mysqli_query($conn,$busca);
      $row = mysqli_fetch_array($resultado,MYSQLI_ASSOC);


    if($_SERVER["REQUEST_METHOD"] == "POST") {
    	$nombreRes = mysqli_real_escape_string($conn,$_POST['nombreRes']);
    	$apellidoRes = mysqli_real_escape_string($conn,$_POST['apellidoRes']);
    	$propiedadRes = mysqli_real_escape_string($conn,$_POST['propiedadRes']);
    	$fraccRes = mysqli_real_escape_string($conn,$_POST['fraccRes']);
    	$userRes = mysqli_real_escape_string($conn,$_POST['userRes']);
    	$passwordRes = mysqli_real_escape_string($conn,$_POST['passwordRes']);
    	$correoRes = mysqli_real_escape_string($conn,$_POST['correoRes']);

      $buscar = "SELECT nombreResidente, apellidoResidente FROM CatalogoResidentes WHERE propiedad = '$propiedadRes' and idFraccionamiento = '$fraccRes'";
      $result = mysqli_query($conn,$buscar);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
        
      if($count == 1) {
		$nomRes = $row["nombreResidente"];
		$apeRes = $row["apellidoResidente"];
		$error = "No se actualizo la información debido a que esta propiedad pertenece al usuario: ".$nomRes. " " .$apeRes;
            echo "<script>
            alert('$error.');
            window.location.href='/admin/home?pag=1';
            </script>";
      }else{
      	 $actualizar = "UPDATE CatalogoResidentes SET nombreResidente = '$nombreRes', apellidoResidente = '$apellidoRes', propiedad = '$propiedadRes', user = '$userRes', password = '$passwordRes', correoResidente = '$correoRes', idFraccionamiento = '$fraccRes'
             WHERE idResidente = '$id'";
      	 if (mysqli_query($conn, $actualizar)) {
            echo "<script>
            alert('Se actualizo la información de manera correcta');
            window.location.href='/admin/home?pag=1';
            </script>";
		 } else {
		  $error = "No se agrego el usuario introducido, favor de contactar a soporte con el siguiente codigo: " . $sql . "<br>" . mysqli_error($conn);
		 }
      }
    } 
?>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Añadir Usuario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/puntaHOA/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/puntaHOA/css/site.css" />
    <link rel="shortcut icon" type="image/jpg" href="/puntaHOA/images/logo.png"/>
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
   color:white;
   text-decoration: none; 
   background-color: none;
    }
   a:hover{
      color:white;
      text-decoration:none
    }
</style>
<script type="text/javascript">
        $(document).ready(()=>{
            $("#fraccRess").val('<?php echo $row['idFraccionamiento']; ?>');
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
                <a href="/admin/home?pag=1"><img src="/puntaHOA/images/logo.png" width="120" height="120"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex flex-row-reverse bd-highlight">
                   <div class="p-2 bd-highlight"><a href="/admin-logout">Cerrar Sesión</a></div> 
                   <div class="p-2 bd-highlight"><a href="/admin/correos" style="color: black;">Correos</a></div>
                   <div class="p-2 bd-highlight"><a href="/admin/notificaciones?pag=1" style="color: black;">Notificaciones</a></div>
                   <div class="p-2 bd-highlight"><a href="/admin/documentos?pag=1" style="color: black;">Documentos</a></div>
                   <div class="p-2 bd-highlight"><a style="color: black;">Bienvenido <?php echo $login_session; ?></a></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container"> 
    	<h2>Editar Residente</h2>
    	<?php 
            if(!empty($error)){
            echo '<div class="alert alert-danger">' . $error . '</div>';
            }  
        ?>
    	<form class="form" action="" method="post">
    		<div class="form-row">
    		<div class="col">
    		 <label>Nombre del Residente</label>
             <input type="text" class="form-control" name="nombreRes" value="<?php echo $row['nombreResidente']; ?>" onkeyup="myFunction()" required>
            </div>
            <div class="col">
             <label>Apellido</label>
             <input type="text" class="form-control" name="apellidoRes" value="<?php echo $row['apellidoResidente']; ?>" onkeyup="myFunction()" required>
            </div>
        	</div>
        	<br/>
        	<div class="form-row">
            <div class="col">
             <label>Propiedad</label>
             <input type="text" class="form-control" name="propiedadRes" value="<?php echo $row['propiedad']; ?>" onkeyup="myFunction()" required>
            </div>
            <div class="col">
             <label>Fraccionamiento</label>
             <select class="form-control" name="fraccRes" id="fraccRess" onchange="myFunction()" required>
             	<option value="">Seleccione el fraccionamiento</option>
             	<?php
                        if($idFracc == 17){
                        $sql_query = "SELECT idFraccionamiento, nombreFracc FROM CatalogoFraccionamiento WHERE NOT idFraccionamiento = 17";
                        $results = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
                        while( $descripcion = mysqli_fetch_assoc($results) ) {
                ?>
                    <option value="<?php echo $descripcion ['idFraccionamiento']; ?>"><?php echo $descripcion ['nombreFracc']; ?></option>
                <?php
                                          } 
                        }else{
                        $sql_query = "SELECT idFraccionamiento, nombreFracc FROM CatalogoFraccionamiento where idFraccionamiento = $idFracc";
                        $results = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
                        while( $descripcion = mysqli_fetch_assoc($results) ) { 
                ?>
                    <option value="<?php echo $descripcion ['idFraccionamiento']; ?>"><?php echo $descripcion ['nombreFracc']; ?></option>
                <?php
                        }
                            }
                ?>
             </select>
            </div>
            </div>
            <br/>
            <div class="form-row">
            <div class="col">
             <label>Usuario</label>
             <input type="text" class="form-control" name="userRes" value="<?php echo $row['user']; ?>" onkeyup="myFunction()" required>
            </div>
            <div class="col">
             <label>Contraseña</label>
             <input type="text" class="form-control" name="passwordRes" value="<?php echo $row['password']; ?>" onkeyup="myFunction()" required>
            </div>
            </div>
            <br/>
            <div class="form-group">
             <label>Correo</label>
             <input type="text" class="form-control" name="correoRes" value="<?php echo $row['correoResidente']; ?>" onkeyup="myFunction()" required>
            </div>
            <br/>
            <center>
            	<div class="form-row">
                <div class="col">
                    <input type="submit" name="Enviar" class="btn btn-success btn-md" id="myBtn">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger"><a href="/admin/homepag=1">Regresar</a></button>
                </div>
                </div>
            </center>
    	</form>   
    </div>
         <?php 
         mysqli_close($conn);
          ?>
<br/>
      <footer class="border-top footer">
        <div class="container">
            <p>2021 - Punta Mita HOA</p>    
        </div>
    </footer>    
</body>
</html>