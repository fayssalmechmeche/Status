<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | eZStatus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <!-- Basic CSS -->
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <?php require_once "template/navbar.php" ?>
    <main id="dashboard">
        <div class="main-title">Paramètres du compte</div>
        <div class="edit">
            <div class="col-lg-12">
                <form class="mt-4">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="fullname">Nom complet</label>
                            <input type="text" class="form-control" id="fullname" value="John Doe">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">Adresse email</label>
                            <input type="text" class="form-control" id="email" value="test@gmail.com">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" value="123456789">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="confirmPassword">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Modifier</button>
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