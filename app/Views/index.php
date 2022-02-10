<!doctype html>
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
    <main>
        <div class="container">

            <div class="d-flex flex-column">
                <h2 class="m-5 mx-auto">état des serveurs</h2>
            </div>
            <?php $variable = true; ?>
            <?php foreach ($services as $service) :
                if ($service['state'] != 'En ligne') {
                    $variable = false;
                }
            endforeach;
            if ($variable == true) { ?>
                <div class="alert-roundedSuccess">
                    <p class="p-2 pl-4">Tous les services sont opérationnels</p>
                </div>
            <?php
            } else { ?>
                <div class="alert-roundedDanger">
                    <p class="p-2 pl-4">Certains services sont en pannes</p>
                </div>
            <?php
            }
            ?>




            <div class="panel-group mt-5" id="accordion" role="tablist" aria-multiselectable="true">

                <!-- 1er tableau -->

                <div class="panel panel-default mt-4">
                    <?php foreach ($categorys as $category) : ?>

                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title d-flex justify-content-between">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="d-flex align-items-center">
                                    <i class="fa fa-plus"></i>
                                    <p><?= $category['title'] ?></p>
                                </a>


                                <?php $variable = 'En ligne'; ?>
                                <?php foreach ($services as $service) :
                                    if ($category['title'] != $service['category']) {
                                        continue;
                                    }
                                    if ($service['state'] == 'Maintenance') {
                                        $variable = 'Maintenance';
                                    }
                                    if ($service['state'] == 'Hors-ligne') {
                                        $variable = 'Hors-ligne';
                                    }
                                    if ($service['state'] == 'Panne partielle') {
                                        $variable = 'En panne';
                                    }
                                endforeach;
                                if ($variable == 'En ligne') { ?>
                                    <div class="d-flex align-items-center pr-2">
                                        <div class="status success"></div>
                                    </div>
                                <?php
                                }
                                if ($variable == 'Hors-ligne') { ?>
                                    <div class="d-flex align-items-center pr-2">
                                        <div class="status danger"></div>
                                    </div>
                                <?php
                                }
                                if ($variable == 'Maintenance') { ?>
                                    <div class="d-flex align-items-center pr-2">
                                        <div class="status primary"></div>
                                    </div>
                                <?php
                                }
                                if ($variable == 'En panne') { ?>
                                    <div class="d-flex align-items-center pr-2">
                                        <div class="status warning"></div>
                                    </div>
                                <?php
                                }
                                ?>


                            </h4>
                        </div>
                        <?php foreach ($services as $service) : ?>
                            <?php
                            if ($category['title'] != $service['category']) {
                                continue;
                            }
                            ?>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                        <div class="status-primary d-flex col-4">
                                            <p> <a target="_blank" href="<?= $service['link'] ?>" class="ez-link"> <?= $service['title'] ?>
                                                </a> </p>&nbsp;&nbsp;
                                            <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above"><?= $service['description'] ?></span></span>
                                        </div>

                                        <div class="status-secondary col-4">
                                            <p>Dernière mise à jour le <?= $service['updated'] ?></p>
                                        </div>

                                        <?php if ($service['state'] == 'En ligne') { ?>
                                            <div class="status-success pr-4 col-4 text-right">
                                                <p><?= $service['state'] ?></p>
                                            </div>
                                        <?php } ?>
                                        <?php if ($service['state'] == 'Hors-ligne') { ?>
                                            <div class="status-danger pr-4 col-4 text-right">
                                                <p><?= $service['state'] ?></p>
                                            </div>
                                        <?php } ?>
                                        <?php if ($service['state'] == 'Maintenance') { ?>
                                            <div class="status-primary pr-4 col-4 text-right">
                                                <p><?= $service['state'] ?></p>
                                            </div>
                                        <?php } ?>
                                        <?php if ($service['state'] == 'Panne partielle') { ?>
                                            <div class="status-warning pr-4 col-4 text-right">
                                                <p><?= $service['state'] ?></p>
                                            </div>
                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                </div>




            </div>
            <div class="d-flex">
                <h2 class="m-5 mx-auto">Incidents antérieurs</h2>
            </div>
            <div class="mt-3 w-100">
                <?php foreach ($messages as $message) : ?>
                    <div class="latest-item">
                        <div class="latest-header">
                            <h5><?= $message['created'] ?></h5>
                            <hr class="latest-hr" />
                        </div>
                        <div class="latest-main">
                            <p><?= $message['message'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </main>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="<?= route_to('login') ?>"><button class="btn btn-primary mr-3">tableau de bord</button></a>
        </div>
    </footer>
    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>