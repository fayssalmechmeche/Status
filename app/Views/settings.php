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
        <div class="main-title">Paramètres du site</div>
        <div class="edit">
            <div class="col-lg-12">
                <form class="mt-4" method="post" action="<?= route_to('settings/update/') ?>">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="siteName">Nom du site</label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?= $meta['meta_title'] ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description">Description du site</label>
                            <input type="text" class="form-control" name="meta_description" id="meta_description" value="<?= $meta['meta_description'] ?>">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="logo">Logo du site</label>
                            <input type="file" class="form-control-file" id="logo">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?= $meta["id"]; ?>" />
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