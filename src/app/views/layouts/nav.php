<nav>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
        <a class="my-0 mr-md-auto font-weight-normal text-dark" href="<?= $prefix ?>/">
        </a>

        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="<?= $prefix ?>/">Home</a>
        </nav>

        <?php if ($userSession == false): ?>
            <a class="p-2 text-dark" href="<?= $prefix ?>/register">Registreren</a>
            <a class="p-2 text-dark" href="<?= $prefix ?>/login">Login</a>
        <?php else: ?>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <?= $userSession->getEmail() ?>
            </a>
            <div class="dropdown-menu">
                <?php if ($userSession->getRole() === 1 || $userSession->getRole() === 2) { ?>
                    <a class="dropdown-item" href="<?= $prefix ?>/moderation">Moderation</a><?php } ?>
                <a class="dropdown-item" href="<?= $prefix ?>/logout">Logout</a>
            </div>

        <?php endif; ?>
    </div>
</nav>