<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <!-- Fontawesome / icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Select2  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- Custom global CSS, load this one as last to overwrite any other classes -->
    <link rel="stylesheet" href="<?= $prefix ?>/public/css/app.css">

    <?php if (empty($prefix)): ?>
        <style>
            body {
                background: url("/public/images/gezinshuis_logo/achtergrond/GezinshuisRegterink_achtergrond.png");
                background-size: cover;
                background-repeat: repeat-x;
            }
        </style>
    <?php else: ?>
        <style>
            body {
                background: url("/~2018_p1_13/P1_OOAPP_Opdracht/public/images/gezinshuis_logo/achtergrond/GezinshuisRegterink_achtergrond.png");
                background-size: cover;
                background-repeat: repeat-x;
            }
        </style>
    <?php endif; ?>

    <!-- Custom global JS-->
    <script src="<?= $prefix ?>/public/js/app.js"></script>

    <!-- Custom favicon  -->
    <link rel="icon" href="<?= $prefix ?>/public/images/favicon.ico" type="image/x-icon">
</head>
<body>

<?php require 'nav.php' ?>
