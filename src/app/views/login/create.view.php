<div class="container-fluid">
    <div class="row">
        <div class="col-3 offset-4">

            <div class="card bg-light mt-5">
                <div class="card-header">Login</div>
                <form method="POST" action="<?= $prefix ?>/login" class="col-12">
                    <div class="mt-2">
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>