<html>
<?php
   $targetDir = "/usr/share/nginx/html/dist/puntaHOA/admin/uploads/";
   include("puntaHOA/databaseconnect.php");
   include('session.php');  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $periodo = mysqli_real_escape_string($conn,$_POST['periodo']);
    $idRes = mysqli_real_escape_string($conn,$_POST['nombreRes']);
    $idDoc = mysqli_real_escape_string($conn,$_POST['tipoDoc']);
	if(!empty($_FILES['file']['name'])){
		$fileName = $_FILES['file']['name'];
	    $targetFilePath = $targetDir . $fileName;
	    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	    // Allow certain file formats
	    $allowTypes = array('jpg','png','jpeg','gif','pdf');
	    if(in_array($fileType, $allowTypes)){
	        // Upload file to server
	        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
	            // Insert image file name into database
	            $insertar = "INSERT INTO HistoricoDocumentos (Periodo, idResidente, idTipoDocumento, nombreDoc) VALUES ('$periodo','$idRes','$idDoc','$fileName')";
	           if (mysqli_query($conn, $insertar)) {
		          echo "<script>
		            alert('Se inserto la información de manera correcta');
		            window.location.href='/admin/documentos?pag=1';
		            </script>";
		       } else {
		          $error = "No se agrego la notificacion introducida, favor de contactar a soporte con el siguiente codigo: " . $insertar . "<br>" . mysqli_error($conn);
		         } 
	        }else{
	            $statusMsg = "Lo sentimos, no se pudo guardar el archivo.";
	        }
	    }else{
	        $statusMsg = 'Lo sentimos, solo podemos procesar imagenes en formato JPEG, PNG y documentos PDF.';
	    }
	}else{
	    $statusMsg = 'Por favor, seleccione un archivo.';
	}
    } 
?>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrativos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
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
   color:black;
   text-decoration: none; 
   background-color: none;
    }
   a:hover{
      color:black;
      text-decoration:none
    }
    #myInput {
      background-image: url('/puntaHOA/images/search.svg');
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
   <div class="container" id="notificaciones">
    <?php 
        if(!empty($error)){
        echo '<div class="alert alert-danger">' . $error . '</div>';
        }  
        if(!empty($statusMsg)){
        echo '<div class="alert alert-danger">' . $statusMsg . '</div>';
        }
        if(!empty($alerta)){
        echo '<div class="alert alert-success">' . $alerta . '</div>';
        }      
    ?>
    </div>
    <form class="form" action="" method="post"  enctype="multipart/form-data">
    	<div class="container">
    		<div class="form-group">
    			<label>Fecha del Documento</label>
    			<input type="date" id="periodo" name="periodo" onchange="myFunction()" class="form-control" required>
    		</div>
    		<div class="form-group">
	    		<label>Residente</label>
	            <select multiple class="form-control" size="10" name="nombreRes" id="nombreRes" onchange="myFunction()" required>
	             	<option value="">Seleccione el residente:</option>
	             	<?php
                        if($idFracc == 17){
                        $sql_query = "SELECT idResidente, nombreResidente, apellidoResidente FROM CatalogoResidentes";
                        $results = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
                        while( $descripcion = mysqli_fetch_assoc($results) ) {
                        
	                    
	                ?>
	                <option value="<?php echo $descripcion ['idResidente']; ?>"><?php echo $descripcion ['nombreResidente']; ?> <?php echo $descripcion ['apellidoResidente']; ?></option>
	                <?php
                        }
	                       }else{
                        $sql_query = "SELECT idResidente, nombreResidente, apellidoResidente FROM CatalogoResidentes WHERE idFraccionamiento = $idFracc";
                        $results = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
                        while( $descripcion = mysqli_fetch_assoc($results) ) {
	                ?>
                    <option value="<?php echo $descripcion ['idResidente']; ?>"><?php echo $descripcion ['nombreResidente']; ?> <?php echo $descripcion ['apellidoResidente']; ?></option>
                    <?php
                        }
                            }
                    ?>
	            </select>
    		</div>
    		<div class="form-group">
	    		<label>Tipo de Documento</label>
	            <select class="form-select" name="tipoDoc" id="tipoDoc" onchange="myFunction()" required>
	             	<option value="">Seleccione el tipo de documento:</option>
	             	<?php
	                    $sql_query = "SELECT idTipoDocumento, descripcion FROM CatalogoDocumentos";
	                    $result = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
	                    while( $descripcion = mysqli_fetch_assoc($result) ) {
	                ?>
	                <option value="<?php echo $descripcion ['idTipoDocumento']; ?>"><?php echo $descripcion ['descripcion']; ?></option>
	                <?php
	                    } 
	                ?>
	            </select>
    		</div>
    		<div class="form-group">
	    	<label>Archivo</label><br/>
    			<input type="file" onchange="myFunction()" class="form-control" name="file" id="file">
    		</div>
    	</div>
    <br />
        <center>
            <div class="form-row">
                <div class="col">                    
                <input type="submit" value="Añadir" class="btn btn-success" id="myBtn">
                </div>
                <div class="col">
                <button type="button" class="btn btn-danger"><a href="/admin/documentos?pag=1" style="color: white;">Regresar</a></button>
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