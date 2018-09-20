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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/r/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-html5-1.0.3/datatables.min.js"></script>
    <script>
        $(document).ready(function (){
            var table = $('#example').DataTable({});
        });
        
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script src="<?= RUTA_URL; ?>/js/main.js"></script>
</head>
<body>
    <div class="se-pre-con"></div>


    