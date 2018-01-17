<div class="col-md-5 col-md-offset-1 list-all-learn" style="max-height: 1800px; overflow: auto">
    <h4 class="margintop45"> <strong> CHI TIẾT KHÓA HỌC </strong></h4>
    <hr>
    <?php foreach ($chapter as $key => $value) { ?>
        <h4 class="category lakita"> <strong> <i class="fa fa-check-square-o lakita" aria-hidden="true"></i> <?php echo $value['name']; ?> </strong></h4>
        <hr>
        <ul class="course-outline">
            <?php foreach ($all_learn[$key] as $key2 => $lvalue) { ?>
            <li style="display: table;">
                <span style="display: table-cell; vertical-align: middle;">
                    <input type="checkbox" />
                    <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                    <?php if($lvalue['trial_learn'] == 1) {?>
                    <a class="btn btn-warning" href="<?php echo base_url() . $lvalue['slug'] . '-5' . $lvalue['id']; ?>.html" target="_blank"> Học thử </a>
                    <?php }?>
                </span>
                </li>
                <hr>
                <?php
            }
            ?>
        </ul>
    <?php } ?>
</div>