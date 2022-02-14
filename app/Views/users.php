<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | eZStatus</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>



<body>
    <?php require "template/sidebar.php" ?>
    <?php $session = \Config\Services::session();

    if ($session->getFlashdata('success')) {
        echo '
            <div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
            ';
    } ?>
    <main id="dashboard">
        <div class="main-title">Liste des utilisateurs</div>
        <div class="subtitle">
            Utilisateurs
        </div>

        <?php echo $pager->links('default', 'full_pagination');

        ?>
        <table>
            <thead>

                <tr>
                    <td>Nom complet</td>
                    <th>Adresse Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($logins) { ?>
                    <?php foreach ($logins as $user) : ?>
                        <tr>
                            <td><?= $user["name"]  ?></td>
                            <td><?= $user["email"]  ?></td>
                            <td> <a href="users/edit/<?= $user['id'] ?>" class="btn btn-info" data-toggle="modal" data-target="#users-modal<?= $user['id'] ?>" name="edit">Modifier</a></td>
                            <div class="modal fade" id="users-modal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <?php if (isset($validationModal)) : ?>
                                    <div class="alert alert-danger"><?= $validationModal->listErrors() ?></div>
                                <?php endif; ?><div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier l'utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php $session = \Config\Services::session();

                                        if ($session->getFlashdata('warning')) {
                                            echo '
            <div class="alert alert-warning">' . $session->getFlashdata("warning") . '</div>
            ';
                                        } ?>



                                        <div class="modal-body">




                                            <div class="edit">
                                                <div class="col-lg-12">
                                                    <form action='' method="post">
                                                        <div class="row">
                                                            <div class="form-group col-lg-12">
                                                                <label for="fullname">Nom complet</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <label for="email">Adresse email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <label for="password">Mot de passe</label>
                                                                <input type="password" class="form-control" id="password" name="password">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <label for="confirmPassword">Confirmer le mot de passe</label>
                                                                <input type="password" class="form-control" id="cpassword" name="cpassword" value="">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?php echo $user["id"]; ?>" />
                                                            <button type="submit" name="modify" class="btn btn-secondary" formaction="<?= route_to('users/update/') ?>">Modifier</button>

                                                            <button type="submit" name="delete" class="btn btn-danger" formaction="<?= route_to('users/delete/') ?>">Supprimer l'utilisateur</button>


                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </tr>

                    <?php endforeach; ?>
                <?php } ?>

            </tbody>
        </table>
        <div class="subtitle">Ajouter un utilisateur</div>
        <div class="edit">
            <div class="col-lg-12">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action='<?= route_to('addUser') ?>' method='post'>
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="fullname">Nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="confirmPassword">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?= set_value('cpassword') ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Ajouter</button>
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
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#users-modal').on('shown.bs.modal', function() {
            $('#users-edit').trigger('focus')
        })
    </script>
</body>

</html>