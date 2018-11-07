<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <strong>evenementen</strong>
                            <a class="btn btn-secondary float-right" href="<?= $prefix ?>/events/create" role="button">voeg een nieuwe evenement toe</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>evenement naam</th>
                                    <th>datum</th>
                                    <th>foto's</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($eventRepository::getAll() as $event): ?>
                                <tr>
                                    <td><?= $event->getEventname() ?></td>
                                    <td><?= $event->getDateEvent() ?></td>
                                    <td>
                                        <form action="<?= $prefix ?>/events/show" method="GET">
                                            <input type="hidden" name="id" value="<?= $event->getId() ?>">
                                            <button type="submit" class="btn btn-secondary">foto's bekijken</i></button>
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
</div>