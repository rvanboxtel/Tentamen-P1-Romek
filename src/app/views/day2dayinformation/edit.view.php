<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-12"><?php
                    if (!empty($_GET['submitted']) && $_GET['submitted'] === "true") {
                        echo '<div class="submit-result submit-success">Dagrapport gewijzigd of toegevoegd.</div>';
                    } ?>

                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <strong>Wijzig een dagrapport</strong>
                            <a class="btn btn-secondary float-right"
                               href="/day2dayinformation?childId=<?= (int)$_GET['childId']; ?>" role="button">terug</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= $prefix ?>/day2dayinformation/edit?childId=<?= (int)$_GET['childId']; ?>"
                                  class="form-group">
                                <input type="hidden" name="id" value="<?= (int)$_GET['id']; ?>">
                                <div class="form-group">
                                    <label for="date">Datum</label>
                                    <input type="date" class="form-control mb-2 mr-sm-2" name="date"
                                           placeholder="2018-05-24"
                                           value="<?= htmlspecialchars($Day2DayInformation->getDate(), ENT_QUOTES, 'utf-8'); ?>">
                                </div>
                                <fieldset class="form-group">
                                    <label for="description">Omschrijving gebeurtenis</label>
                                    <textarea class="form-control mb-2 mr-sm-2" name="description" id="description"
                                              placeholder="Omschrijving"><?= htmlspecialchars($Day2DayInformation->getDescription(), ENT_QUOTES, 'utf-8'); ?></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="action">Actie</label>
                                    <textarea class="form-control mb-2 mr-sm-2" name="action" id="action"
                                              placeholder="Omschrijving"><?= htmlspecialchars($Day2DayInformation->getAction(), ENT_QUOTES, 'utf-8'); ?></textarea>
                                </fieldset>


                                <button type="submit" class="btn btn-primary mb-2">Dagrapport wijzigen</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>