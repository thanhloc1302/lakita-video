<div role="tabpanel" class="tab-pane active" id="dsbaihoc">
    <?php foreach ($chapter as $key => $value) { ?>
        <p class="category"><?php echo $value['name']; ?></p>
        <?php if ($trial_learn == 1 && $value['id'] != 17) { ?>
            <a class="btn btn-success" href="<?php echo 'https://lakita.vn/' . $curr_course[0]['slug'] . '-3' . $curr_course[0]['id']; ?>.html"> Nâng cấp </a>
        <?php } ?>
        <ul class="sidebar-block list-group list-group-menu list-group-minimal">
            <?php
            foreach ($all_learn[$key] as $key2 => $lvalue) {
                ?>
                <li id="scroll<?php echo $lvalue['sort']; ?>" class="list-group-item <?php
                if ($curr_id == $lvalue['id']) {
                    echo 'active';
                }
                ?>">
                    <a <?php if ($trial_learn == 1 && !in_array($lvalue['id'], [269, 270, 271, 272, 273, 274, 275])) { ?>
                            style="text-decoration: none; color: #989898;"
                            <?php
                        } else {
                            ?>
                            href="<?php echo base_url() . $lvalue['slug'] . '-4' . $lvalue['id']; ?>.html" 
                        <?php } ?>
                        title="<?php echo $lvalue['name']; ?>"><?php
                            if (!isset($lvalue['learn_status'])) {
                                echo "<i class='fa fa-circle-o'></i>";
                            } else {
                                switch ($lvalue['learn_status']) {
                                    case 1:
                                        echo "<i class='fa fa-check-circle lakita'></i>";
                                        break;
                                    default:
                                        echo "<i class='fa fa-circle-o lakita'></i>";
                                        break;
                                }
                            }
                            ?>
                            <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                        <span class="badge"><?php echo $lvalue['length']; ?></span>
                    </a> 
                    <?php if ($trial_learn == 1 && !in_array($lvalue['id'], [269, 270, 271, 272, 273, 274, 275])) { ?>
                        <i class="fa fa-lock" aria-hidden="true" style="font-size: 20px; color: #989898;"></i>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>