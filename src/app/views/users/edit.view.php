<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <a class="btn btn-secondary float-left" href="<?= $prefix ?>/users" role="button">terug naar
                            alle
                            gebruikers</a>
                        <form method="POST" action="<?= $prefix ?>/users/destroy" class="float-right">
                            <input type="text" class="form-control mb-2 mr-sm-2" name="user_id"
                                   value="<?= $user->getId() ?>" hidden>
                            <button type="submit" class="btn btn-danger" role="button">gebruiker verwijderen</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="<?= $prefix ?>/users/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstName">voornaam:</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                       value="<?= $user->getFirstName() ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="lastName">achternaam:</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                       value="<?= $user->getLastName() ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="role">rol:</label>
                                <select id="role" name="roleid" class="form-control js-select2" required>
                                    <?php foreach ($roles::getAll() as $role): ?>
                                        <option class="form-control"
                                                value="<?= $role->getId() ?>"><?= $role->getDescription() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="<?= $user->getEmail() ?>"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="mobile number">telefoonnummer:</label>
                                <input type="tel" class="form-control" id="mobile number" name="mobile"
                                       value="<?= $user->getMobile() ?>" required>
                            </div>


                            <div class="form-group">
                                <input class="form-control" id="user_id" name="userid"
                                       value="<?= $user->getId() ?>" hidden>
                                <button type="submit" class="btn btn-primary">bijwerken</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>