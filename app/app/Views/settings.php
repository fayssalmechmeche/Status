<!doctype html>
<html lang="en">

<?php require "template/header.php" ?>

<body>
    <?php require "template/sidebar.php" ?>
    <?php $session = \Config\Services::session(); ?>

    <main id="dashboard">
        <div class="main-title">Paramètres du site</div>
        <?php
        if ($session->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissable fade show"><?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span> </button>
            </div>
        <?php } ?>
        <div class="edit">
            <div class="col-lg-12">
                <form class="mt-4" enctype="multipart/form-data" method="post" action="<?= route_to('settings/update/') ?>">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="siteName">Nom du site</label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php if (isset($meta['meta_title'])) {
                                                                                                                    echo $meta['meta_title'];
                                                                                                                }  ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description">Description du site</label>
                            <input type="text" class="form-control" name="meta_description" id="meta_description" value="<?php if (isset($meta['meta_description'])) {
                                                                                                                                echo $meta['meta_description'];
                                                                                                                            } ?>">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="logo">Logo du site</label>
                            <input type="file" class="form-control-file" name="logo" id="logo" value="upload">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="id" value=" <?php if (isset($meta['id'])) {
                                                                    echo $meta['id'];
                                                                }  ?>">
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