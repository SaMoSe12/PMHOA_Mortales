<html>
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login PM HOA</title>
    <link rel="stylesheet" href="puntaHOA/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="puntaHOA/css/site.css" />
    <link rel="shortcut icon" type="image/jpg" href="puntaHOA/images/logo.png"/>
 </head>
 <style>
    body {
        background-image: url('./images/4.jpg');
        background-size: cover;
    }
    footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: gray;
   color: white;
   text-align: center;
}
</style>
<body>
      <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <img src="puntaHOA/images/logo.png" href="/Index" width="120" height="120">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex flex-row-reverse bd-highlight">
                  <div class="p-2 bd-highlight">Accion 3</div>
                  <div class="p-2 bd-highlight">Accion 2</div>
                  <div class="p-2 bd-highlight">Accion 1</div>
                </div>
            </div>
        </nav>
    </header>
    <div id="log">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="/home-residentes">
                            <h3 class="text-center text-white">Iniciar Sesión</h3>
                            <br />
                            <br />
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Usuario">
                            </div>
                            <br />
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <br />
                            <br />
                            <center>
                                <div class="form-group input-group-lg">
                                    <input type="submit" name="Entrar" class="btn btn-success btn-md">
                                </div>
                            </center>
                            <div id="formFooter">
                                <center>
                                    <a class="text-white" href="#">¿Olvidaste tu contraseña?</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<footer class="border-top footer">
        <div class="container">
            <p>2021 - Punta Mita HOA</p>    
        </div>
    </footer>    -->
</body>
</html>