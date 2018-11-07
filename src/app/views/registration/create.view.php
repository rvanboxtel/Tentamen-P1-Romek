<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row card-group mt-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <h4 class="float-left">gebruiker bewerken</h4>
                        <a class="btn btn-secondary float-right" href="<?= $prefix ?>/users" role="button">terug naar alle
                            gebruikers</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= $prefix ?>/register" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstName">voornaam:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>

                            <div class="form-group">
                                <label for="lastName">achternaam (inclusief tussenvoegsel):</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>

                            <div class="form-group">
                                <label for="email">email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">wachtwoord:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile number">telefoonnummer:</label>
                                <input type="tel" class="form-control" id="mobile number" name="mobile">
                            </div>

                            <div class="form-group">
                                <label for="dateOfBirth">geboortedatum:</label>
                                <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth">
                            </div>

                            <div class="form-group">
                                <label for="nickname">bijnaam:</label>
                                <input type="text" class="form-control" id="nickname" name="nickname">
                            </div>

                            <div class="form-group">
                                <label for="rolesId">rol:</label>
                                <select id="rolesId" name="rolesId" class="form-control js-select2" required>
                                    <?php foreach ($roles::getAll() as $role): ?>
                                        <option class="form-control"
                                                value="<?= $role->getId() ?>"><?= $role->getDescription() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="uploadedPicture">foto:</label>
                                <input type="file" class="form-control" id="uploadedPicture" name="uploadedPicture">
                            </div>

                            <div class="form-group">
                                <label for="reason">reden</label>
                                <textarea class="form-control mb-2 mr-sm-2" name="reason" rows="5"
                                          placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">gebruiker toevoegen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>