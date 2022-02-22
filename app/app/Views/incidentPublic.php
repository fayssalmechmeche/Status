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
            <?php $no = 1 ?>
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


            <?php echo $pager->links('default', 'full_pagination');

            ?>
        </div>




    </div>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="<?= route_to('login') ?>"><button class="btn btn-primary mr-3">tableau de bord</button></a>
        </div>
    </footer>
</body>

</html>