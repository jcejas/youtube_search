<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Youtube Search (Challenge)</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <!--
        Joaquin J. Cejas
    -->
    <div class="conteiner-fluid row justify-content-center">
        <div class="header text-center">
            <h1 class="text-danger">Buscar Videos de Youtube</h1>
        </div>
        <hr class="dl-horizontal">

        <div class="col-md-6 search-box">
            <form class="form-login" method="post">
                <div class="form-group">
                    <label for="busqueda">Buscar Videos</label>
                    <input class="form-control" type="text" id="busqueda" name="busqueda" placeholder="Ingrese su b&uacute;squeda">
                </div>
                <a class="btn btn-primary" href="javascript:void(0)" onclick="Buscar();">Buscar</a>
            </form>
        </div>
        <div class="container">
            <div class="clearfix">&nbsp;</div>
            <div id="results" class="row justify-content-center">

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    </body>
</html>