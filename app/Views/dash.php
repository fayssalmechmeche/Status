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

    <main id="dashboard">
        <div class="main-title">
            Dashboard
        </div>



        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <h5 class="my-3">Nombre d'utilisateurs</h5>
                <div class="card  border-left-success shadow  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    utilisateurs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <h5 class="my-3">Nombre de services</h5>
                <div class="card border-left-success shadow  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    services</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $service ?></div>
                            </div>
                            <div class="col-auto">

                                <i class="fas fa-server fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <h5 class="my-3">Nombre de catégories</h5>
                <div class="card border-left-success shadow  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    categories</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $category ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks-alt"></i>
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
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

        $('#services-modal').on('shown.bs.modal', function() {
            $('#services-edit').trigger('focus')
        })
    </script>
    <script>
        $(document).ready(function() {
            $(".modal").on("hidden.bs.modal", function() {
                $(".modal-body").removeData('bs.modal');
            });
        });
    </script>





</body>

</html>