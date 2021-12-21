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
    <link href="<?php echo BASEPATH . 'assets/css/style.min.css';?>" rel="stylesheet">
</head>
<body>
<?php

function navbar($lang = 'esp'){
    if($lang == 'esp'){
        require_once 'components/navbar.comp.php';
    } else {
        require_once 'components/' . $lang . '/navbar.comp.php';
    }
}
function footer($lang = 'esp'){
    if($lang == 'esp'){
        require_once 'components/footer.comp.php';
    } else {
        require_once 'components/' . $lang . '/footer.comp.php';
    }
}
function ucoModal($lang = 'esp'){
    if($lang == 'esp'){
        require_once 'components/uco.comp.php';
    } else {
        require_once 'components/' . $lang. '/uco.comp.php';
    }

}
function rentaModal($lang = 'esp'){
    if($lang == 'esp'){
        require_once 'components/renta.comp.php';
    } else {
        require_once 'components/' . $lang. '/renta.comp.php';
    }

}

function loadTemplate(string $template, $lang = 'esp'){
    if($lang == 'esp'){
        require_once 'paths/' . $template . '.path.php';
    } else {
        require_once 'paths/'. $lang.'/' . $template . '.path.php';
    }

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

// ----- Ingles --------------
Route::add('/eng', function(){
    navbar('eng');
    loadTemplate('index', 'eng');
    ucoModal('eng');
    footer('eng');
});
Route::add('/eng/apoyo-residentes', function(){
    navbar( 'eng');
    loadTemplate('apoyo_residentes', 'eng');
    ucoModal('eng');
    footer( 'eng');
});
Route::add('/eng/bienes-raices', function(){
    navbar( 'eng');
    loadTemplate('bienes_raices', 'eng');
    footer( 'eng');
});
Route::add('/eng/quienes-somos', function(){
    navbar( 'eng');
    loadTemplate('quienes_somos', 'eng');
    ucoModal('eng');
    footer( 'eng');
});
Route::add('/eng/amenidades', function(){
    navbar( 'eng');
    loadTemplate('amenidades', 'eng');
    ucoModal('eng');
    footer( 'eng');

});
Route::add('/eng/(.*)', function($template){
    navbar( 'eng');
    loadTemplate($template, 'eng');
    ucoModal('eng');
    rentaModal('eng');
    footer( 'eng');
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
    rentaModal();
});
Route::add('/reestablecer', function(){
    require_once('puntaHOA/reestablecer.php');
});
Route::add('/logout', function(){
    require_once('puntaHOA/logout.php');
});
//  ADMIN
Route::add('/admin', function() {
    require_once('puntaHOA/admin/index.php');
}, 'get');
Route::add('/admin', function() {
    require_once('puntaHOA/admin/index.php');
}, 'post');
Route::add('/admin/home', function(){
    require_once('puntaHOA/admin/homeAdmin.php');
});
Route::add('/admin/editar-residente', function(){
    require_once('puntaHOA/admin/editarResidente.php');
}, ['get', 'post']);
Route::add('/admin/agregar-residente', function(){
    require_once('puntaHOA/admin/formusuario.php');
}, ['get', 'post']);
Route::add('/admin/notificaciones', function(){
    require_once('puntaHOA/admin/notificaciones.php');
}, ['get', 'post']);
Route::add('/admin/crear-notificacion', function(){
    require_once('puntaHOA/admin/formnotif.php');
}, ['get', 'post']);
Route::add('/admin/editar-notificacion', function(){
    require_once('puntaHOA/admin/editarNotif.php');
}, ['get', 'post']);
Route::add('/admin/control-notificaciones', function(){
    require_once('puntaHOA/admin/controlnotif.php');
}, ['get', 'post']);
Route::add('/admin/anuncios-fraccionamiento', function(){
    require_once('puntaHOA/admin/anunciosfracc.php');
}, ['get', 'post']);
Route::add('/admin/control-fraccionamiento', function(){
    require_once('puntaHOA/admin/controlfracc.php');
}, ['get', 'post']);
Route::add('/admin/administradores', function(){
    require_once('puntaHOA/admin/controlAdmins.php');
}, ['get', 'post']);
Route::add('/admin/editar-administrador', function(){
    require_once('puntaHOA/admin/editarAdmin.php');
}, ['get', 'post']);
Route::add('/admin/agregar-administrador', function(){
    require_once('puntaHOA/admin/formadmin.php');
}, ['get', 'post']);
Route::add('/admin/documentos', function(){
    require_once('puntaHOA/admin/homeDocumentos.php');
}, ['get', 'post']);
Route::add('/admin/editar-documento', function(){
    require_once('puntaHOA/admin/editarDocs.php');
}, ['get', 'post']);
Route::add('/admin/agregar-documento', function(){
    require_once('puntaHOA/admin/nuevoDocs.php');
}, ['get', 'post']);
Route::add('/admin/correos', function(){
    require_once('puntaHOA/admin/controlCorreos.php');
}, ['get', 'post']);
Route::add('/admin-logout', function(){
    require_once('puntaHOA/admin/logout.php');
}, ['get', 'post']);

Route::add('/formato-renta', function(){
    require_once('generar-pdf.php');
}, 'get');

Route::run(BASEPATH);
?>
<script src="<?php echo BASEPATH . 'assets/js/main.min.js';?>"></script>


</body>
</html>
