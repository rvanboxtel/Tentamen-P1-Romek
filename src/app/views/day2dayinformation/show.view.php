<?php


if (empty($_GET['childId'])) {

    echo "Child ID not specified";

} else {
    $childWithDay2DayInformationList = $Day2DayInformationRepository::getAll($_GET['childId']);

    $childrenWithDay2DayInformation = $Day2DayInformationRepository::getAll();

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row card-group mt-3">
                    <div class="col">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">Day2DayInformation voor:
                                        <strong><?= $childWithDay2DayInformationList[0]['first_name'] ?> <?= $childWithDay2DayInformationList[0]['last_name'] ?></strong>
                                    </div>

                                    <div class="col">
                                        <form method="get" action="?" class="row"><label for="childSearch"
                                                                                         class="col text-right">Ander
                                                kind: </label><select class="js-select2 col" id="childSearch"
                                                                      name="childId">
                                                <?php
                                                $idsOfChildrenAlreadyDisplayed = array();

                                                foreach ($childrenWithDay2DayInformation AS $childWithDay2DayInformation):

                                                    if (in_array($childWithDay2DayInformation['users_id'], $idsOfChildrenAlreadyDisplayed)) {//Only show every child once
                                                        continue;
                                                    }

                                                    $idsOfChildrenAlreadyDisplayed[] = $childWithDay2DayInformation['users_id'];
                                                    ?>
                                                    <option value="<?= $childWithDay2DayInformation['users_id']; ?>" <?php if (@$_GET['childId'] == $childWithDay2DayInformation['users_id']) echo "selected"; ?>><?= $childWithDay2DayInformation['first_name']; ?> <?= $childWithDay2DayInformation['last_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-secondary" href="<?= $prefix ?>/day2dayinformation"
                                           role="button">bekijk
                                            alle
                                            kinderen</a>
                                    </div>
                                    <div class="text-right col">
                                        <a class="btn btn-primary"
                                           href="/day2dayinformation/create?childId=<?= (int)$_GET['childId'] ?>"
                                           role="button">Voeg dagrapport toe</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row card-group mt-3">
                    <div class="col">
                        <?php
                        foreach ($childrenWithDay2DayInformation AS $childWithDay2DayInformation):?>

                            <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <strong><?= 'ToDo insert werknemer naam hier'; ?></strong>
                                    <div class="float-right">datum:
                                        <strong><?= $childWithDay2DayInformation['date'] ?></strong>
                                    </div>
                                    <form action="<?= $prefix ?>/day2dayinformation/edit" method="GET"
                                          class="float-right">
                                        <input type="hidden" name="id"
                                               value="<?= $childWithDay2DayInformation['day2dayinformation_id']; ?>">
                                        <input type="hidden" name="childId" value="<?= (int)$_GET['childId']; ?>">
                                        <button type="submit" class="btn btn-secondary"><i class="fas fa-edit"><span
                                                        class="sr-only">Bewerken</span></i>
                                        </button>
                                    </form>

                                </div>
                                <div class="card-body">
                                    <div class="card-body bg-white"><?= htmlspecialchars($childWithDay2DayInformation['description'], ENT_QUOTES, 'utf-8'); ?></div>
                                    <hr>
                                    <div class="card-body bg-white"><?= htmlspecialchars($childWithDay2DayInformation['action'], ENT_QUOTES, 'utf-8'); ?></div>
                                    <hr>
                                    <div class="card-body">
                                        <?php
                                        $Day2DayInformationId = $childWithDay2DayInformation['day2dayinformation_id'];
                                        require 'src/app/views/layouts/comments.php' ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
    </div>
    <?php
}
?>