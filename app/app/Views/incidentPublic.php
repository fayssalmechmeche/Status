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
                        <span class="text-warning"> <?= $message['state'] ?> <i class="fas fa-times"></i> </span>
                    </p>

                    <?= $message['message']; ?>




                <?php } ?>



                <?php if ($message['state'] == 'Fermé') { ?>
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
                        <span class="text-success"> <?= $message['state'] ?> <i class="fas fa-check"></i> </span>
                    </p>
                    <br />
                    <?= $message['message']; ?>



                <?php } ?>
            <?php endforeach; ?>


            <?php echo $pager->links('default', 'full_pagination');

            ?>
        </div>




    </div>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="<?= route_to('index') ?>"><button class="btn btn-primary mr-3">Index</button></a>
            <a href="<?= route_to('login') ?>"><button class="btn btn-primary mr-3">tableau de bord</button></a>
        </div>
    </footer>
</body>

</html>