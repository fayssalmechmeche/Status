<div class="sidebar">
    <div class="sidebar-brand">
        <img src=<?php echo base_url("/assets/images/" . $logo['name']); ?> alt="logo" />
        <hr />
    </div>
    <div class="sidebar-content">
        <ul>
            <li>
                <a href=" <?= route_to('dash') ?>" data-toggle="tooltip" data-placement="right" title="Page d'accueil">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li>
                <a href=" <?= route_to('service') ?>" data-toggle="tooltip" data-placement="right" title="Liste des services">
                    <i class="fas fa-align-left"></i>
                </a>
            </li>
            <li>
                <a href='<?= route_to('incident') ?>' data-toggle="tooltip" data-placement="right" title="Liste des incidents">
                    <i class="fas fa-exclamation"></i>
                </a>
            </li>
            <li>
                <a href=" <?= route_to('category') ?>" data-toggle="tooltip" data-placement="right" title="Liste des catégories">
                    <i class="fas fa-th-list"></i>
                </a>
            </li>
            <li>
                <a href='<?= route_to('users') ?>' data-toggle="tooltip" data-placement="right" title="Liste des utilisateurs">
                    <i class="fas fa-users"></i>
                </a>
            </li>
            <li>
                <a href="<?= route_to('settings') ?>" data-toggle="tooltip" data-placement="right" title="Paramètres du site">
                    <i class="fas fa-cog"></i>
                </a>
            </li>
            <li>
                <a href=" <?= route_to('user') ?>" data-toggle="tooltip" data-placement="right" title="Paramètres du compte">
                    <i class="fas fa-user-edit"></i>
                </a>
            </li>
            <li>
                <a href=" <?= route_to('logout') ?>" data-toggle="tooltip" data-placement="right" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>

    </div>
</div>