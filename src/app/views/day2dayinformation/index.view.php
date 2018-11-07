<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="">Day2dayinformation</h1>
                                </div>
                                <div class="col-lg-6">
                                    <form method="get" action="?" class="row"><label for="childSearch"
                                                                                     class="col text-right">Zoek op
                                            kind: </label><select class="js-select2 col" id="childSearch"
                                                                  name="childId">
                                            <option value="">
                                                <?= !empty($_GET['childId']) ? 'Toon alle kinderen' : 'Maak een keuze'; ?>&hellip;
                                            </option>
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
                            <?php
                            if (empty($childrenWithDay2DayInformation)) {
                                echo "Geen dagrapporten gevonden.";
                            } else {
                                ?>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Naam</th>
                                        <th>Laatst bijgewerkt</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($_GET['childId'])) {
                                        $childWithDay2DayInformationList = $Day2DayInformationRepository::getAll($_GET['childId']);
                                    } else {
                                        $childWithDay2DayInformationList = $childrenWithDay2DayInformation;
                                    }

                                    $idsOfChildrenAlreadyDisplayed = array();

                                    foreach ($childWithDay2DayInformationList as $childWithDay2DayInformation):
                                        if (in_array($childWithDay2DayInformation['users_id'], $idsOfChildrenAlreadyDisplayed)) {//Only show every child once
                                            continue;
                                        }

                                        $idsOfChildrenAlreadyDisplayed[] = $childWithDay2DayInformation['users_id'];
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="/day2dayinformation/show?childId=<?= $childWithDay2DayInformation['users_id']; ?>"><?= $childWithDay2DayInformation['first_name']; ?> <?= $childWithDay2DayInformation['last_name']; ?></a>
                                            </td>
                                            <td><?= $childWithDay2DayInformation['date'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>