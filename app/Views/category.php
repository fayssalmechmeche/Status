<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | eZStatus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png"); ?>" />
    <!-- Basic CSS -->
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <?php require "template/sidebar.php" ?>
    <main id="dashboard">
        <div class="main-title">Liste des catégories</div>
        <div class="subtitle">
            Catégories
        </div>
        <table>
            <thead>
                <tr>
                    <th>Intitulé</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($categorys) {
                    foreach ($categorys as $category) {
                        echo '
<tr>
<td>' . $category["title"] . '</td>
<td>
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#categorie-modal">Modifier</button>
                    </td>
</tr>';
                    }
                }

                ?>

            </tbody>
        </table>
        <div class="subtitle">Ajouter une catégorie</div>
        <div class="edit">
            <div class="col-lg-12">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action=' <?= route_to('addCategory') ?>' method='post'>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="intitule">Intitulé</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Ajouter</button>
                </form>
            </div>
        </div>
    </main>
    <div class="modal fade" id="categorie-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier la catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="edit">
                        <div class="col-lg-12">
                            <form>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="name">Intitulé</label>
                                        <input type="text" class="form-control" id="name" value="Sites web">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Modifier</button>
                    <button type="submit" class="btn btn-danger">Supprimer la catégorie</button>
                </div>
            </div>
        </div>
    </div>
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

        $('#categorie-modal').on('shown.bs.modal', function() {
            $('#categorie-edit').trigger('focus')
        })
    </script>
</body>

</html>