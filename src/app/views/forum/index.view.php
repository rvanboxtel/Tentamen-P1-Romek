<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row card-group mt-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <th></th>

                                </thead>
                                <tbody>
                                <?php  foreach ($posts as $post): ?>
                                <tr>
                                    <a href="">
                                    <td> <?php $post->getName()?> </td>
                                    <td> <?php $post->getDesc()?> </td>
                                    </a>
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