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
                                <th></th>
                                <th>voornaam</th>
                                <th>achternaam</th>
                                <th>bijnaam</th>
                                <th>rol</th>
                                <th>email</th>
                                <th>telefoonnummer</th>
                                <th>geboortedatum</th>
                                <th>reden</th>
                                <th>bewerk</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <?php if (!empty($user->getPicture())): ?>
                                        <td><img height="50px" width="50px" src="<?= $user->getPicture() ?>"></td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>
                                    <td> <?= $user->getFirstName() ?> </td>
                                    <td> <?= $user->getLastName() ?> </td>
                                    <td> <?= $user->getNickname() ?> </td>
                                    <td> <?= $roles::getUserRole((int)$user->getId())->getDescription() ?> </td>
                                    <td> <?= $user->getEmail() ?> </td>
                                    <td> <?= $user->getMobile() ?> </td>
                                    <td> <?= $user->getDateOfBirth() ?> </td>
                                    <td> <?= $user->getReason() ?> </td>
                                    <td>
                                        <form action="<?= $prefix ?>/users/edit" method="GET">
                                            <input type="hidden" name="user_id" value="<?= $user->getId() ?>">
                                            <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-edit"></i>
                                            </button>
                                        </form>
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