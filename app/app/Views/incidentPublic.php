<!DOCTYPE html>
<html lang="en">

<?php require "template/header.php" ?>

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

                <?php if ($message['state'] == 'En cours') { ?>
                    <h5> <?php $sqldate = date('d/m/Y', strtotime($message['created']));
                            echo $sqldate ?> à <?= $message['time'] ?> </h5>

                    <hr class="latest-hr" />
                    <p>
                        <b>Service concerné :</b>
                        <?= $message['service'] ?>
                    </p>

                    <br />


                    <p>
                        <b> Etat de l'incident :</b>
                        <span class="text-warning"><i class="fas fa-times"></i> <?= $message['state'] ?> </span>
                    </p>

                    <p class="mh-100"> <?= $message['message']; ?> </p>




                <?php } ?>



                <?php if ($message['state'] == 'Terminé') { ?>
                    <h5> <?php $sqldate = date('d/m/Y', strtotime($message['created']));
                            echo $sqldate ?> à <?= $message['time'] ?> </h5>

                    <hr class=" latest-hr" />
                    <p>
                        <b>Service concerné :</b>
                        <?= $message['service'] ?>
                    </p>

                    <br />

                    <p>
                        <b> Etat de l'incident :</b>
                        <span class="text-success"> <i class="fas fa-check"></i><?= $message['state'] ?> </span>
                    </p>
                    <br />
                    <p class="mh-100"> <?= $message['message']; ?> </p>



                <?php } ?>
            <?php endforeach; ?>


            <?php echo $pager->links('default', 'full_pagination');

            ?>
        </div>




    </div>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="<?= route_to('index') ?>"><button class="btn btn-primary mr-3">Index</button></a>
            <a href="<?= route_to('dash') ?>"><button class="btn btn-primary mr-3">Panneau de controle</button></a>
        </div>
    </footer>
</body>

</html>