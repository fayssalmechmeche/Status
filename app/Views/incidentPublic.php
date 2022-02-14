<!DOCTYPE html>
<html lang="en">

<head>
    <title>eZStatus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" name="meta_description" content="<?= $meta['meta_description'] ?>">
    <meta name="title" name="meta_title" content="<?= $meta['meta_title'] ?>">
    <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png"); ?>" />
    <!-- Basic CSS -->
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <header>
        <div class="d-flex justify-content-center align-items-center banner">
            <a href="index"><img src="<?php echo base_url("/assets/images/logo.png"); ?>" alt="Logo eZCorp"></a>
        </div>
    </header>

    <div class="container">
        <div class="d-flex">
            <h2 class="m-5 mx-auto">Incidents antérieurs</h2>
        </div>
        <div class="mt-3 w-100">
            <?php foreach ($messages as $message) : ?>
                <div class="latest-item">
                    <div class="latest-header">
                        <h5><?php $sqldate = date('d/m/Y', strtotime($message['created']));
                            echo $sqldate ?> à <?= $message['time'] ?></h5>
                        <hr class="latest-hr" />
                    </div>
                    <div class="latest-main">
                        <p><?php
                            echo $message['message'];
                            ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="<?= route_to('login') ?>"><button class="btn btn-primary mr-3">tableau de bord</button></a>
        </div>
    </footer>
</body>

</html>