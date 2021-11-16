<html>
<?php
   include("../databaseconnect.php");
   include('session.php');  

   $limit = 10;
    // pagina pedida
    $pag = (int) $_GET["pag"];
    if ($pag < 1)
    {
       $pag = 1;
    }
    $offset = ($pag-1) * $limit;


    $sql = "SELECT SQL_CALC_FOUND_ROWS idAnuncio, Mensaje, idTipoMensaje FROM controlanuncios LIMIT $offset, $limit";
    $sqlTotal = "SELECT FOUND_ROWS() as total";

    $rs = mysqli_query($conn,$sql);
    $rsTotal = mysqli_query($conn,$sqlTotal);

    $rowTotal = mysqli_fetch_assoc($rsTotal);
    $total = $rowTotal["total"];

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
<script>
function myFunction() {
     document.querySelector("#myInput").onkeyup = function(){
        $TableFilter("#data_table", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
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
                   <div class="p-2 bd-highlight"><a href="homeDocumentos.php?pag=1" style="color: black;">Documentos</a></div>
                   <div class="p-2 bd-highlight"><a href="homeAdmin.php?pag=1" style="color: black;">Residentes</a></div>
                   <div class="p-2 bd-highlight"><a style="color: black;">Bienvenido <?php echo $login_session; ?></a></div>
                </div>
            </div>
        </nav>
    </header>  
   <div class="container" id="notificaciones">
        <h1>Notificaciones</h1>
        <table id="data_table" class="table table-striped">
            <thead>
           <tr>
           <th>Mensaje</th>
           <th>Tipo de Mensaje</th>      
           <th>Acción</th>  
           </tr>
            </thead>
            <tbody>
            <?php
             while ($row = mysqli_fetch_assoc($rs))
             {
              $id = $row["idAnuncio"];
              $message = htmlentities($row["Mensaje"]);
              $sql = mysqli_query($conn,"select descripcion from catalogotipomensaje where idTipoMensaje = ".$row["idTipoMensaje"]." ");
              $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
              $desc =  $row["descripcion"];
            ?>
                <tr>
                <td><?php echo $message; ?></td>
                <td><?php echo $desc; ?></td>
                <td><a href="editarNotif.php?EDITAR_ID=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></td>
                </tr>
            <?php
             }
            ?>
            </tbody>
             <tfoot>
           <tr>
           <td colspan="7" style="text-align: right;">
           <?php
             $totalPag = ceil($total/$limit);
             $links = array();
             for( $i=1; $i<=$totalPag ; $i++)
             {
               $links[] = "<a href=\"?pag=$i\" style=\"background-color:cyan;\">$i</a>"; 
             }
             echo implode(" - ", $links);
            ?>
            </td>
            </tr>
        </tfoot>
        </table>
         <div class="float-right">
            <button type="button" class="btn btn-info"><a href="formnotif.php">Crear Notificacion</a></button> 
            <button type="button" class="btn btn-info"><a href="controlnotif.php">Asignar Notificacion</a></button>
            <button type="button" class="btn btn-info"><a href="anunciosfracc.php?pag=1">Editar Parametros de Notificaciones</a></button>
         </div>
    </div>
    <br/>
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