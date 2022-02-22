<!doctype html>
<html lang="en">
<?php require "template/header.php" ?>

<body>
    <header>
        <div class="d-flex justify-content-center align-items-center banner">
            <a href="index"><img src="<?php echo base_url("/assets/images/logo.png"); ?>" alt="Logo eZCorp"></a>
        </div>
    </header>
    <main>
        <div class="container">

            <div class="d-flex flex-column">
                <h2 class="m-5 mx-auto">état de nos services</h2>
            </div>
            <?php $number = 'En ligne'; ?>
            <?php foreach ($services as $service) :



                if ($service['state'] == 'Hors-ligne') {
                    $number = 'Hors-ligne';
                    break;
                }
                foreach ($services as $service) :
                    if ($service['state'] != 'Hors-ligne' and $service['state'] == 'Panne partielle') {
                        $number = 'En panne';
                        break;
                    } elseif ($service['state'] != 'Hors-ligne' and $service['state'] != 'Panne partielle' and $service['state'] == 'Maintenance') {
                        $number = 'Maintenance';
                    }
                endforeach;


            endforeach;









            if ($number == 'En ligne' and $number != 'Maintenance' and $number != 'En panne'  and $number != 'Hors-ligne') { ?>
                <div class="alert-roundedSuccess">
                    <p class="p-2 pl-4">Tous les services sont opérationnels</p>
                </div>
            <?php
            } elseif ($number == 'Maintenance' and $number != 'En panne'  and $number != 'Hors-ligne') { ?>
                <div class="alert-roundedPrimary">
                    <p class="p-2 pl-4">Certains services sont en pannes</p>
                </div>
            <?php
            } elseif ($number == 'En panne' and $number != 'Hors-ligne') { ?>
                <div class="alert-roundedWarning">
                    <p class="p-2 pl-4">Certains services sont en pannes</p>
                </div>
            <?php } elseif ($number == 'Hors-ligne') { ?>
                <div class="alert-roundedDanger">
                    <p class="p-2 pl-4">Certains services sont en pannes</p>
                </div>
            <?php }
            ?>




            <div class="panel-group mt-5" id="accordion" role="tablist" aria-multiselectable="true">

                <!-- 1er states -->

                <div class="panel panel-default mt-4">
                    <?php foreach ($categorys as $category) : ?>

                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title d-flex justify-content-between">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="d-flex align-items-center">
                                    <i class="fa fa-plus"></i>
                                    <p><?= $category['title'] ?></p>
                                </a>

                                <?php
                                $number = 0;
                                $states = [
                                    "Hors-ligne" => 99,
                                    "Panne partielle" => 98,
                                    "Maintenance" => 97,
                                ];

                                foreach ($services as $service) :
                                    if ($category['title'] != $service['category']) {

                                        continue;
                                    }
                                    if (isset($states[$service['state']]) and $states[$service['state']] > $number) {

                                        $number = $states[$service['state']];
                                    }
                                endforeach;
                                $class = "success";
                                switch ($number) {
                                    case 99:
                                        $class = "danger";
                                        break;
                                    case 98:
                                        $class = "warning";
                                        break;
                                    case 97:
                                        $class = "primary";
                                        break;
                                }

                                ?>
                                <div class="d-flex align-items-center pr-2">
                                    <div class="status <?= $class ?>"></div>
                                </div>

                            </h4>



                            <?php foreach ($services as $service) :
                                if ($category['title'] != $service['category']) {

                                    continue;
                                } ?>

                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                            <div class="status-primary d-flex col-4">
                                                <p> <a target="_blank" href="<?= $service['link'] ?>" class="ez-link"> <?= $service['title'] ?>
                                                    </a> </p>&nbsp;&nbsp;
                                                <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above"><?= $service['description'] ?></span></span>
                                            </div>

                                            <div class="status-secondary col-4">
                                                <p>Dernière mise à jour le <?php $sqldate = date('d/m/Y', strtotime($service['updated']));
                                                                            echo $sqldate ?> à <?= $service['time'] ?></p>
                                            </div>
                                            <?php if ($service['monitoring'] == 0) { ?>
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
                                                <?php }
                                            }
                                            if ($service['monitoring'] == 1) {
                                                error_reporting(E_ALL ^ E_WARNING);
                                                ?>

                                                <div class="status-danger pr-4 col-4 text-right">
                                                    <p name="state" id="state"><?= $service['state'] ?></p>
                                                </div><?php

                                                    } ?>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>



                        </div>
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
                            <h5><?php $sqldate = date('d/m/Y', strtotime($message['created']));
                                echo $sqldate ?> à <?= $message['time'] ?></h5>
                            <hr class="latest-hr" />
                            <p> <b>Service concerné :</b> <?= $message['service'] ?> </p>
                            <p> <b> Etat de l'incident :</b> <?= $message['state'] ?> </p>
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
    </main>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="<?= route_to('login') ?>"><button class="btn btn-primary mr-3">states de bord</button></a>
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