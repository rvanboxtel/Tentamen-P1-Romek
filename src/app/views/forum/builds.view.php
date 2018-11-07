<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row card-group mt-3">
                <div class="col-10 offset-1">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <strong><?= $idea->getName() ?></strong>
                            <a class="btn btn-secondary offset-10" href="<?= $prefix ?>/" role="button">Terug</a>
                        </div>
                        <div class="card-body">
                            <?= $idea->getDesc() ?>
                        </div>
                        <table class="borders">
                            <tr class="borders">
                                <th class="borders">steps</th>
                                <th class="borders">step 1</th>
                                <th class="borders">step 2</th>
                                <th class="borders">step 3</th>
                                <th class="borders">step 4</th>
                                <th class="borders">step 5</th>
                            </tr>
                            <tr class="borders">
                                <td></td>
                                <td class="borders"><?= $idea->getStep1() ?></td>
                                <td class="borders"><?= $idea->getStep2() ?></td>
                                <td class="borders"><?= $idea->getStep3() ?></td>
                                <td class="borders"><?= $idea->getStep4() ?></td>
                                <td class="borders"><?= $idea->getStep5() ?></td>
                            </tr>
                            <tr class="borders">
                                <th class="borders">Pieces steps</th>
                                <th class="borders">Pieces step 1</th>
                                <th class="borders">Pieces step 2</th>
                                <th class="borders">Pieces step 3</th>
                                <th class="borders">Pieces step 4</th>
                                <th class="borders">Pieces step 5</th>
                            </tr>
                            <tr class="borders">
                                <td></td>
                                <td class="borders"><?= $idea->getPieces1() ?></td>
                                <td class="borders"><?= $idea->getPieces2() ?></td>
                                <td class="borders"><?= $idea->getPieces3() ?></td>
                                <td class="borders"><?= $idea->getPieces4() ?></td>
                                <td class="borders"><?= $idea->getPieces5() ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row card-group mt-3">
                <div class="col-10 offset-1">
                    <div class="card bg-light mb-3">
                        <form method="POST" action="<?= $prefix ?>/builds/comment" class="form-group mt-2">
                            <div class="card-body">
                                <div class="form-group" hidden>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="id"
                                           value="<?= $idea->getId() ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="comment" required>
                                </div>

                                <button type="submit"
                                        <?php if ($userSession === false): ?>disabled="disabled"<?php endif; ?>
                                        class="btn btn-secondary mb-2">Post Comment
                                </button>
                            </div>
                        </form>
                        <?php foreach ($comments as $comment): ?>
                            <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <strong> <?= $comment->getNick() ?> </strong>
                                </div>
                                <div class="card-body">
                                    <?= $comment->getText(); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>