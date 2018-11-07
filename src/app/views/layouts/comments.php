<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 2-11-2018
 * Time: 03:08 PM
 */

$randomId = "id_".mt_rand(1,PHP_INT_MAX);
?>

<div class="row card-group mt-3">
    <div class="card bg-light mb-3">
        <div class="card-header">
            <strong>opmerkingen</strong>
        </div>
        <div class="card-body">
            <div>
                <form method="POST" action="<?= $prefix ?>/<?=isset($Day2DayInformationId)?'day2dayinformation/comment?childId='.(int)$_GET['childId']:'events/comment';?>" class="form-group mt-2">
                    <div class="form-group" hidden>
                        <label hidden for="<?=$randomId?>">events id</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="<?=isset($Day2DayInformationId)?'day2dayinformation':'events';?>_id"
                               value="<?= isset($Day2DayInformationId)?$Day2DayInformationId:(int)$_GET['id'] ?>" hidden id="<?=$randomId?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="text">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">opmerking plaatsen</button>
                </form>
            </div>
            <?php foreach (isset($Day2DayInformationId)?$commentRepository::getCommentsForDay2DayInformation($Day2DayInformationId):$commentRepository::getCommentsForEvents((int)$_GET['id']) as $comment): ?>
                <div class="card bg-light mb-3" id="comment_<?=$comment->getId()?>">
                    <div class="card-header">
                        <strong> <?= htmlspecialchars($comment->getNick(), ENT_QUOTES, 'utf-8'); ?> </strong>
                    </div>
                    <div class="card-body">
                        <?= htmlspecialchars($comment->getText(), ENT_QUOTES, 'utf-8'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div> <!-- end row -->