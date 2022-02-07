<!doctype html>
<html lang="en">

<head>
    <title>Connexion | eZStatus</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <main class="main-secondary">
        <div class="left">
            <img src=<?php echo base_url("/assets/images/logo.png"); ?> alt="logo" />
            <a href=<?= route_to('index') ?>><i class="fa fa-arrow-circle-left"></i> Retourner à l'accueil</a>
        </div>
        <div class="right">
            <div class="container">
                <div class="d-flex flex-column">
                    <h6 class="m-5 mx-auto text-center">Se connecter</h2>
                </div>
                <div class="card p-2 col-lg-8 col-sm-8 col-8 mx-auto">
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <form action="<?= route_to('auth') ?>" method="post">
                        <div class="d-flex flex-column m-2">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                            <label class=" mt-4" for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <button type="submit" class="btn success send mt-4">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>