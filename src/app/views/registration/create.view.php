
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row card-group mt-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <h4 class="float-left">Account Maken</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= $prefix ?>/register" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstName">voornaam:</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>

                            <div class="form-group">
                                <label for="lastName">achternaam (inclusief tussenvoegsel):</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
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
                                <button type="submit" class="btn btn-primary">Registreren</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>