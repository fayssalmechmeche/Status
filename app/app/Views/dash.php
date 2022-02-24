<!doctype html>
<html lang="en">

<?php require "template/header.php" ?>

<body>
    <?php require "template/sidebar.php" ?>

    <main id="dashboard">
        <div class="main-title">
            Dashboard
        </div>



        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <h5 class="my-3">Utilisateurs</h5>
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
                <h5 class="my-3">Services</h5>
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
                <h5 class="my-3">Catégories</h5>
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
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <h5 class="my-3">Service en ligne</h5>
                <div class="card border-left-success shadow  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Services en ligne</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $service_online ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-server fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <h5 class="my-3">Services
                    hors-ligne
                </h5>
                <div class="card border-left-success shadow  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Services
                                    hors-ligne
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $service_offline ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-server fa-2x text-gray-300"></i>
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