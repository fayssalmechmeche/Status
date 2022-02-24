<!doctype html>
<html lang="en">

<?php require "template/header.php" ?>

<body>

    <?php require "template/sidebar.php" ?>

    <?php $session = \Config\Services::session(); ?>






    <main id="dashboard">

        <div class="main-title">Paramètres du compte</div>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <?php
        if ($session->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissable fade show"><?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span> </button>
            </div>
        <?php } ?>

        <div class="edit">
            <div class="col-lg-12">
                <form class="mt-4" action="<?= route_to('user/update/') ?>" method="post">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="fullname">Nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $logins['name'] ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">Adresse email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $logins['email'] ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="confirmPassword">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?= $logins["id"]; ?>" />
                        <button type="submit" class="btn btn-secondary">Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </main>


    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>