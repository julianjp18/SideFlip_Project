<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_NAME." - ".TEMPLATE ?></title>
    <link rel="stylesheet" href="<?= RUTA_URL; ?>/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= RUTA_URL; ?>/css/loader.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= RUTA_URL; ?>/css/data-table.css">
    <link rel="stylesheet" href="<?= RUTA_URL; ?>/css/supervisor.css">

    <!-- Compiled and minified JavaScript -->
    <script src="<?= RUTA_URL; ?>/js/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?= RUTA_URL; ?>/js/main-project.js"></script>
    <script src="https://cdn.datatables.net/r/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-html5-1.0.3/datatables.min.js"></script>
    <script>
        ;
        $(document).ready(function (){
            var table = $('#example').DataTable({});
        });
        
    </script>
</head>
<body>
    <div class="preloader-background">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>


    