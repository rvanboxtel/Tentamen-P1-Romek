<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row card-group mt-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <th>Name</th>
                                <th>Description</th>
                                </thead>
                                <tbody>
                                <?php foreach ($posts as $post): ?>
                                    <tr>
                                        <td nowrap="true"><strong><?= $post->getName() ?></strong></td>
                                        <td><?= $post->getDesc() ?></td>
                                        <td>
                                            <form action="<?= $prefix ?>/forum/build" method="GET">
                                                <input type="hidden" name="id" value="<?= $post->getId() ?>">
                                                <button type="submit" class="btn btn-secondary">Go to Build</i></button>
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