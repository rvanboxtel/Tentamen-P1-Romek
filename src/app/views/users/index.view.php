<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <h4 class="float-left">gebruikers</h4>
                        <a class="btn btn-secondary float-right" href="<?= $prefix ?>/register" role="button">voeg een
                            nieuwe
                            gebruiker toe</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>voornaam</th>
                                <th>achternaam</th>
                                <th>rol</th>
                                <th>email</th>
                                <th>telefoonnummer</th>
                                <th>Beheer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td> <?= $user->getFirstName() ?> </td>
                                    <td> <?= $user->getLastName() ?> </td>
                                    <td> <?= $user->getEmail() ?> </td>
                                    <td> <?= $roles::getUserRole((int)$user->getId())->getDescription() ?> </td>
                                    <td> <?= $user->getMobile() ?> </td>
                                    <td>
                                        <form action="<?= $prefix ?>/users/edit" method="GET">
                                            <input type="hidden" name="user_id" value="<?= $user->getId() ?>">
                                            <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-hammer"></i>
                                            </button>
                                        </form>
                                        <?php //if ($user->isUserBanned() == false): ?>
                                        <form action="<?= $prefix ?>/users/ban" method="POST">
                                            <input type="hidden" name="user_id" value="<?= $user->getId() ?>">
                                            <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-gavel"></i>
                                            </button>
                                        </form>
                                        <?php //else:?>
<!--                                        <form action="--><?//= $prefix ?><!--/users/unban" method="post">-->
<!--                                            <input type="hidden" name="user_id" value="--><?//= $user->getId() ?><!--">-->
<!--                                            <button type="submit" class="btn btn-secondary"><i-->
<!--                                                        class="fas fa-gavel"></i>-->
<!--                                            </button>-->
<!--                                        </form>-->
                                        <?php ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>