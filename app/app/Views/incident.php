<!doctype html>
<html lang="en">

<?php require "template/header.php" ?>

<body>
    <?php require "template/sidebar.php" ?>
    <?php $session = \Config\Services::session();

    if ($session->getFlashdata('success')) { ?>
        <div class="alert alert-success alert-dismissable fade show"><?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span> </button>
        </div>
    <?php } ?>
    <main id="dashboard">
        <div class="main-title">
            Liste des incidents
        </div>
        <div class="subtitle">Incidents</div>

        <table>
            <thead>
                <tr>
                    <th>Intitulé</th>
                    <th>Service</th>
                    <th>Message</th>
                    <th>Statut</th>
                    <th>Création</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($messages) {
                    foreach ($messages as $message) : ?>

                        <tr>
                            <td><?= $message["title"] ?></td>
                            <td><?= $message["service"] ?></td>
                            <td><?= $message["message"] ?></td>
                            <td><?= $message["state"] ?></td>
                            <td><?php $sqldate = date('d/m/Y', strtotime($message['created']));
                                echo $sqldate ?> à <?= $message['time'] ?></td>
                            <td>
                                <button class="btn btn-info" type="button" data-toggle="modal" id="btn" data-target="#services-modal<?= $message['id'] ?>">Modifier</button>
                            </td>



                        </tr>
                        <div class="modal fade" id="services-modal<?= $message['id'] ?>" tabindex=" -1">
                            <?php if (isset($validationModal)) : ?>
                                <div class="alert alert-danger"><?= $validationModal->listErrors() ?></div>
                            <?php endif; ?>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier l'incident</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="edit">
                                            <div class="col-lg-12">
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="form-group col-lg-12">
                                                            <label for="name">Intitulé</label>
                                                            <input type="text" class="form-control" id="title" name="title" value="<?= $message['title'] ?>">
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label for="description">Message</label>
                                                            <textarea type="text" class="form-control" id="message" name="message"><?= $message["message"] ?></textarea>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="link">Service</label>
                                                            <select name="service" class="form-control">
                                                                <?php if ($services) {
                                                                    foreach ($services as $service) : ?>
                                                                        <option <?php if ($service['title'] == $message['service']) echo 'selected="selected"' ?>> <?= $service['title'] ?></option>

                                                                <?php endforeach;
                                                                } ?>
                                                            </select>
                                                        </div>


                                                        <div class="form-group col-lg-6" id="state">
                                                            <label for="status">Statut</label>
                                                            <select name="state" class="form-control">
                                                                <option <?php if ($message['state'] == 'En cours') echo 'selected="selected"' ?>>En cours</option>
                                                                <option <?php if ($message['state'] == 'Fermé') echo 'selected="selected"' ?>>Fermé</option>

                                                            </select>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?php echo $message["id"]; ?>">
                                                            <button type="submit" class="btn btn-secondary" formaction="<?= route_to('incident/update/') ?>">Modifier</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                <?php endforeach;
                } ?>

            </tbody>
        </table>
        <?php echo $pager->links('default', 'full_pagination');

        ?>
        <div class="subtitle">Ajouter un incident</div>
        <div class="edit">
            <div class="col-lg-12">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action=' <?= route_to('addIncident') ?>' method='post'>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="name">Intitulé</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="description">Message</label>
                            <textarea type="text" class="form-control" id="message" name="message"></textarea>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="link">Service</label>
                            <select name="service" class="form-control">
                                <?php if ($services) {
                                    foreach ($services as $service) : ?>
                                        <option> <?= $service['title'] ?></option>

                                <?php endforeach;
                                } ?>
                            </select>
                        </div>


                        <div class="form-group col-lg-6" id="statePage">
                            <label for="status">Statut</label>
                            <select class="form-control" name="state">
                                <option selected>En cours</option>
                                <option>Fermé</option>

                            </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-secondary">Ajouter</button>
                </form>
            </div>
        </div>
    </main>


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