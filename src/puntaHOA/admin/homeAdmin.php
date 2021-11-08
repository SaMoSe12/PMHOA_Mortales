<html>
<?php
   include("../databaseconnect.php");
   include('session.php');   
?>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrativos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <link rel="stylesheet" href="~/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="~/css/site.css" />
    <link rel="shortcut icon" type="image/jpg" href="images/logo.png"/>
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
</style>
 <body>
     <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <img src="../images/logo.png" href="/Index" width="120" height="120">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex flex-row-reverse bd-highlight">
                   <div class="p-2 bd-highlight"><a href="logout.php">Cerrar Sesión</a></div> 
                   <div class="p-2 bd-highlight"><a style="color: black;">Bienvenido <?php echo $login_session; ?></a></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">    
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th>Clave del Residente</th>
                <th>Nombre del Residente</th>
                <th>Apellido del Residente</th>
                <th>Propiedad</th>
                <th>Usuario</th>   
                <th>Contraseña</th>
                <th>Correo del Residente</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql_query = "SELECT idResidente, nombreResidente, apellidoResidente, propiedad, user, password, correoResidente FROM catalogoresidentes";
            $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
            while( $libro = mysqli_fetch_assoc($resultset) ) {
            ?>
               <tr>
               <td><?php echo $libro ['idResidente']; ?></td>
               <td><?php echo $libro ['nombreResidente']; ?></td>
               <td><?php echo $libro ['apellidoResidente']; ?></td>
               <td><?php echo $libro ['propiedad']; ?></td>
               <td><?php echo $libro ['user']; ?></td>   
               <td><?php echo $libro ['password']; ?></td> 
               <td><?php echo $libro ['correoResidente']; ?></td>    
               <td><a href="editarResidente.php"><i class="fas fa-user-edit"></i></a></td>          
               </tr>
            <?php 
                } 
                mysqli_close($conn);
            ?>
        </tbody>
    </table>    
    </div>
 	<div class="container">
     <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Texto del Mensaje: </label>
       <div class="col-sm-10">
                <input class="form-control" type="text">
       </div>
    </div>
    <br />
    <div class="container">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tipo de Mensaje: </label>
            <div class="col-sm-10">
                <select class="form-control form-control-lg">
                    <option>Por favor, elija una</option>
                </select>
            </div>
        </div>
    <br />
   		<center>
            <div class="form-group input-group-lg">
                <input type="submit" value="Añadir" class="btn btn-warning">
            </div>
        </center>
</div>
<br/>
      <footer class="border-top footer">
        <div class="container">
            <p>2021 - Punta Mita HOA</p>    
        </div>
    </footer>    
</body>
</html>