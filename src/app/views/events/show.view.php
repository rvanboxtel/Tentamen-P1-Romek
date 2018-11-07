<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row card-group mt-3">
                <div class="col-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header">alle foto's van:
                            <strong><?= $eventRepository::getEvent((int)$_GET['id'])->getEventname() ?></strong>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-secondary" href="<?= $prefix ?>/events" role="button">bekijk alle evenementen</a>
                            <a class="btn btn-primary" href="<?= $prefix ?>/events/edit?id=<?= $_GET['id'] ?>" role="button">foto's bewerken of toevoegen</a>
                        </div>
                    </div>

                </div>
                <?php foreach ($eventRepository::getPictures((int)$_GET['id']) as $picture): ?>
                    <div class="col-4">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <strong><?= $eventRepository::getEvent((int)$_GET['id'])->getEventname() ?></strong>
                                <div class="float-right">datum:
                                    <strong><?= $eventRepository::getEvent((int)$_GET['id'])->getDateEvent() ?></strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <img style="width: 100%; height: 100%" src="<?= $picture->getPicture() ?>">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <!-- end row -->
            <?php require 'src/app/views/layouts/comments.php' ?>
        </div>
    </div>
</div>