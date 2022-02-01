<!doctype html>
<html lang="en">

<head>
    <title>eZStatus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png"); ?>" />
    <!-- Basic CSS -->
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="d-flex justify-content-center align-items-center banner">
            <a href="index"><img src="<?php echo base_url("/assets/images/logo.png"); ?>" alt="Logo eZCorp"></a>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="d-flex flex-column">
                <h2 class="m-5 mx-auto">état des serveurs</h2>
                <div class="alert-rounded">
                    <p class="p-2 pl-4">Tous les services sont opérationnels</p>
                </div>
            </div>
            <div class="panel-group mt-5" id="accordion" role="tablist" aria-multiselectable="true">

                <!-- 1er tableau -->

                <div class="panel panel-default" id="panel">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title d-flex justify-content-between">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-flex align-items-center collapsed">
                                <i class="fa fa-plus"></i>
                                <p>Sites internet</p>
                            </a>
                            <div class="d-flex align-items-center pr-2">
                                <div class="status warning"></div>
                            </div>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a target="_blank" href="https://ezcorp.io" class="ez-link">eZCorp.io</a></p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Site principal</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-warning pr-4 col-4 text-right">
                                    <p>Problèmes partiels</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a target="_blank" href="https://git.ezcorp.io">eZGit - GitLab</a></p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Serveur Gitlab</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a target="_blank" href="https://chat.ezcorp.io">eZChat - Rocket.Chat</a></p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Service de chat instantané</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a target="_blank" href="https://dash.ezcorp.io">eZDash - Espace membre</a></p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Espace membre associatif</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a target="_blank" href="https://docs.ezcorp.io">eZDocs - Documentation</a></p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Documentation en ligne</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a target="_blank" href="https://adhesion.ezcorp.io">eZAdhesion - Bulletin d'adhésion</a></p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Formulaire d'adhésion en ligne</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2ème tableau -->

                <div class="panel panel-default mt-4">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title d-flex justify-content-between">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="d-flex align-items-center">
                                <i class="fa fa-plus"></i>
                                <p>Serveurs</p>
                            </a>
                            <div class="d-flex align-items-center pr-2">
                                <div class="status success"></div>
                            </div>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p>eZVPN - VPN Intranet</p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Serveur VPN permettant d'accéder à l'intranet</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p>eZCloud - Disques réseaux</p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Disques réseaux</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p>Serveur AD - LDAP</p>&nbsp;&nbsp;
                                    <span class="qs"><i class="fa fa-question-circle" style="margin-top: 3px;"></i><span class="popover above">Serveur d'annuaire/authentification Active Directory</span></span>
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3ème tableau -->

                <div class="panel panel-default mt-4">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title d-flex justify-content-between">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="d-flex align-items-center">
                                <i class="fa fa-plus"></i>
                                <p>Noms de domaines</p>
                            </a>
                            <div class="d-flex align-items-center pr-2">
                                <div class="status danger"></div>
                            </div>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a href="ezcorp.io" class="ez-link">eZCorp.io</a></p>&nbsp;&nbsp;
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a href="ezcorp.fr" class="ez-link">eZCorp.fr</a></p>&nbsp;&nbsp;
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-success pr-4 col-4 text-right">
                                    <p>Opérationnel</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between status-item align-items-center">
                                <div class="status-primary d-flex col-4">
                                    <p><a href="ezcorp.cc" class="ez-link">eZCorp.cc</a></p>&nbsp;&nbsp;
                                </div>
                                <div class="status-secondary col-4">
                                    <p>Dernière mise à jour le 21/10/2020 à 14:07</p>
                                </div>
                                <div class="status-danger pr-4 col-4 text-right">
                                    <p>Non opérationnel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <h2 class="m-5 mx-auto">Incidents antérieurs</h2>
            </div>
            <div class="mt-3 w-100">
                <div class="latest-item">
                    <div class="latest-header">
                        <h5>20/10/2020 à 00H00</h5>
                        <hr class="latest-hr" />
                    </div>
                    <div class="latest-main">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            In finibus molestie libero sed interdum. Ut felis turpis, iaculis
                            in erat vel, fringilla placerat tellus.
                            Praesent venenatis dolor et pharetra pharetra.</p>
                    </div>
                </div>
                <div class="latest-item mt-5">
                    <div class="latest-header">
                        <h5>13/10/2020 à 10H00</h5>
                        <hr class="latest-hr" />
                    </div>
                    <div class="latest-main">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            In finibus molestie libero sed interdum. Ut felis turpis, iaculis
                            in erat vel, fringilla placerat tellus.
                            Praesent venenatis dolor et pharetra pharetra.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer-primary">
        <div class="h-100 d-flex flex-row justify-content-center align-items-center">
            <a href="login"><button class="btn btn-primary mr-3">tableau de bord</button></a>
        </div>
    </footer>
    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>