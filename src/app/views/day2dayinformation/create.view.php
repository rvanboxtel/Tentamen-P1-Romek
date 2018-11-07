<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <strong>voeg een dagrapport  toe</strong>
                            <a class="btn btn-secondary float-right" href="javascript:history.back()" role="button">terug</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= $prefix ?>/day2dayinformation?childId=<?=(int)$_GET['childId'];?>" class="form-group">
                                <input type="hidden" name="childId" value="<?=(int)$_GET['childId'];?>">
                                <div class="form-group">
                                    <label for="date">Datum</label>
                                    <input type="date" class="form-control mb-2 mr-sm-2" name="date" placeholder="2018-05-24">
                                </div>
                                <fieldset class="form-group">
                                    <label for="description">Omschrijving gebeurtenis</label>
                                    <textarea class="form-control mb-2 mr-sm-2" name="description" id="description"
                                           placeholder="Omschrijving"></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="action">Actie</label>
                                    <textarea class="form-control mb-2 mr-sm-2" name="action" id="action"
                                              placeholder="Omschrijving"></textarea>
                                </fieldset>


                                <button type="submit" class="btn btn-primary mb-2">Dagrapport toevoegen</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>