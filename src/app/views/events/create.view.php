<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <strong>voeg een event toe</strong>
                            <a class="btn btn-secondary float-right" href="<?= $prefix ?>/events" role="button">bekijk alle evenementen</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= $prefix ?>/events" class="form-group">
                                <div class="form-group">
                                    <label for="date_event">datum event</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="date_event" placeholder="2018-05-23">
                                </div>
                                <div class="form-group">
                                    <label for="eventname">evenement naam</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="eventname"
                                           placeholder="uit eten">
                                </div>

                                <button type="submit" class="btn btn-primary mb-2">volgende stap (foto's toevoegen)</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>