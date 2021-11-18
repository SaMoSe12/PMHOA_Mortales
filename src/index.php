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
function ucoModal(){
    require_once 'components/uco.comp.php';
}

function loadTemplate(string $template){
    require_once 'paths/' . $template . '.path.php';
}

Route::add('/', function(){
    navbar();
    loadTemplate('index');
    ucoModal();
    footer();
});

Route::add('/quienes-somos', function(){
    navbar();
    loadTemplate('quienes_somos');
    ucoModal();
    footer();
});

Route::add('/servicios', function(){
    navbar();
    loadTemplate('servicios');
    ucoModal();
    footer();
});

Route::add('/bienes-raices', function(){
    navbar();
    loadTemplate('bienes_raices');
    ucoModal();
    footer();
});

Route::add('/amenidades', function(){
    navbar();
    loadTemplate('amenidades');
    ucoModal();
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
    ucoModal();
    footer();
});

Route::add('/galeria', function(){
    navbar();
    loadTemplate('galeria');
    ucoModal();
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
    ucoModal();
});

Route::add('/admin', function() {
    require_once('puntaHOA/homeAdmin.php');
});
Route::add('/reestablecer', function(){
    require_once('puntaHOA/reestablecer.php');
});
Route::add('/logout', function(){
    require_once('puntaHOA/logout.php');
});
Route::run(BASEPATH);
?>
<script src="<?php echo 'assets/js/main.min.js';?>"></script>


</body>
</html>
