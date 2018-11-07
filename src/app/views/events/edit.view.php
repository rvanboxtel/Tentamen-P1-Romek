<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header">foto toevoegen voor:
                            <strong><?= $eventRepository::getEvent((int)$_GET['id'])->getEventname() ?></strong>
                        </div>
                        <div class="card-body">
                            <div class="btn-group">
                                <a class="btn btn-secondary" href="<?= $prefix ?>/events/show?id=<?= $_GET['id'] ?>" role="button">terug</a>
                                <a class="btn btn-outline-secondary" href="<?= $prefix ?>/events" role="button">bekijk alle
                                    evenementen</a>
                            </div>
                            <hr>

                            <form method="POST" action="<?= $prefix ?>/events/picture/store" enctype="multipart/form-data"
                                  class="form-group mt-2">
                                <div class="form-group" hidden>
                                    <label hidden for="events_id">events id</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="events_id"
                                           value="<?= $_GET['id'] ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="uploadedPicture">foto toevoegen</label>
                                    <input type="file" class="form-control mb-2 mr-sm-2" name="uploadedPicture">
                                </div>

                                <button type="submit" class="btn btn-primary mb-2">foto toevoegen</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php if (!empty($eventRepository::getPictures((int)$_GET['id']))): ?>
                    <?php foreach ($eventRepository::getPictures((int)$_GET['id']) as $picture): ?>
                        <div class="col-4">
                            <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <form method="POST" action="<?= $prefix ?>/events/picture/destroy">
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="pictureId"
                                               value="<?= $picture->getId() ?>" hidden>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="events_id"
                                               value="<?= $_GET['id'] ?>" hidden>
                                        <button type="submit" class="btn btn-danger" role="button">foto verwijderen
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?= $prefix ?>/events/picture/update" class="form-group" enctype="multipart/form-data">
                                        <div class="form-inline">
                                            <input type="text" class="form-control mb-2 mr-sm-2" name="pictureId"
                                                   value="<?= $picture->getId() ?>" hidden>
                                            <input type="text" class="form-control mb-2 mr-sm-2" name="events_id"
                                                   value="<?= $_GET['id'] ?>" hidden>
                                            <input type="file" class="form-control mb-2 mr-sm-2" name="uploadedPicture">
                                            <button type="submit" class="btn btn-warning" role="button">foto updaten
                                            </button>
                                        </div>
                                    </form>
                                    <img class="mt-2" style="width: 100%; height: 100%"
                                         src="<?= $picture->getPicture() ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div> <!-- end row -->
        </div>
    </div>
</div>