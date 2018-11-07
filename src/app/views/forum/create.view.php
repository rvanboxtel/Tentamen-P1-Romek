<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row card-group mt-3">
                <div class="col-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <strong>Create a new post</strong>
                            <a class="btn btn-secondary float-right" href="<?= $prefix ?>/" role="button">Back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= $prefix ?>/create/post" class="form-group">
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name of the post </label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="name">

                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control mb-2 mr-sm-2">
                                </div>

                                <div class="form-group">
                                    <label for="step01">Step one</label>
                                    <input type="text" name="step01" class="form-control mb-2 mr-sm-2">
                                    <label for="pieces01">Pieces for step one</label>
                                    <input type="text" name="pieces01" class="form-control mb-2 mr-sm-2">
                                    <label for="step02">Step two</label>
                                    <input type="text" name="step02" class="form-control mb-2 mr-sm-2">
                                    <label for="pieces02">Pieces for step two</label>
                                    <input type="text" name="pieces02" class="form-control mb-2 mr-sm-2">
                                    <label for="step03">Step three</label>
                                    <input type="text" name="step03" class="form-control mb-2 mr-sm-2">
                                    <label for="pieces03">Pieces for step three</label>
                                    <input type="text" name="pieces03" class="form-control mb-2 mr-sm-2">
                                    <label for="step04">Step four</label>
                                    <input type="text" name="step04" class="form-control mb-2 mr-sm-2">
                                    <label for="pieces04">Pieces for step four</label>
                                    <input type="text" name="pieces04" class="form-control mb-2 mr-sm-2">
                                    <label for="step05">Step five</label>
                                    <input type="text" name="step05" class="form-control mb-2 mr-sm-2">
                                    <label for="pieces05">Pieces for step five</label>
                                    <input type="text" name="pieces05" class="form-control mb-2 mr-sm-2">
                                    <label for="step06">Step six</label>
                                    <input type="text" name="step06" class="form-control mb-2 mr-sm-2">
                                    <label for="pieces06">Pieces for step six</label>
                                    <input type="text" name="pieces06" class="form-control mb-2 mr-sm-2">
                                </div>
                                <button type="submit">Post</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>