<nav>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
        <a class="my-0 mr-md-auto font-weight-normal text-dark" href="<?= $prefix ?>/">
            <img class="logo" src="<?= $prefix ?>/public/images/gezinshuis_logo/compact/GezinshuisRegterink_logo_compact.png"
                 alt="Logo Gezinshuis Regterink"/>
        </a>

        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="<?= $prefix ?>/">home</a>
            <a class="p-2 text-dark" href="<?= $prefix ?>/about">over ons</a>
            <a class="p-2 text-dark" href="<?= $prefix ?>/contact">contact</a>
        </nav>

        <?php if ($userSession): ?>
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            <?= $userSession->getEmail() ?>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= $prefix ?>/users">gebruikers</a>
            <a class="dropdown-item" href="<?= $prefix ?>/day2dayinformation">day2dayinformation</a>
            <a class="dropdown-item" href="<?= $prefix ?>/events">events</a>
            <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= $prefix ?>/logout">logout</a>
        </div>

        <?php else: ?>
        <a class="text-dark" href="<?= $prefix ?>/login">login</a>
        <?php endif; ?>
    </div>
</nav>