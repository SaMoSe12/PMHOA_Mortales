<?php

use Steampixel\Route;

include 'includes/Route.php';

define('BASEPATH', '/');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punta Mita HOA</title>
    <link href="<?php echo 'assets/css/style.min.css';?>" rel="stylesheet">
</head>
<body>
<?php

function navbar(){
    require_once 'components/navbar.comp.php';
}
function footer(){
    require_once 'components/footer.comp.php';
}

function loadTemplate(string $template){
    require_once 'paths/' . $template . '.path.php';
}

Route::add('/', function(){
    navbar();
    loadTemplate('index');
    footer();
});

Route::add('/quienes-somos', function(){
    navbar();
    loadTemplate('quienes_somos');
    footer();
});

Route::add('/servicios', function(){
    navbar();
    loadTemplate('servicios');
    footer();
});

Route::add('/bienes-raices', function(){
    navbar();
    loadTemplate('bienes_raices');
    footer();
});

Route::add('/amenidades', function(){
    navbar();
    loadTemplate('amenidades');
    footer();
});

Route::add('/apoyo-residentes', function(){
    navbar();
    loadTemplate('apoyo_residentes');
    footer();
});
Route::add('/contacto', function(){
    navbar();
    loadTemplate('contacto');
    footer();
});

Route::add('/galeria', function(){
    navbar();
    loadTemplate('galeria');
    footer();
});

// ----- Rutas de Deigow -----
Route::add('/iniciar-sesion', function(){
    require_once('puntaHOA/index.php');
},'get');
Route::add('/iniciar-sesion', function(){
    require_once('puntaHOA/index.php');
},'post');
Route::add('/home-residentes', function() {
    require_once('puntaHOA/homeResidentes.php');
});
Route::add('/admin', function() {
    require_once('puntaHOA/homeAdmin.php');
});
Route::add('/reestablecer', function(){
    require_once('puntaHOA/reestablecer.php');
});
Route::run(BASEPATH);
?>
<script src="<?php echo 'assets/js/main.min.js';?>"></script>


</body>
</html>
