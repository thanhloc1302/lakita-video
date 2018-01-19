<div role="tabpanel" class="tab-pane" id="taitailieu">
    <?php
    if ($trial_learn == 1) {
        echo '<p class="margintop10"> Bạn cần đăng ký khóa học để tải tài liệu! </p>';
    } else {
        if (isset($curr_learn[0])) {
            $attach_file = array_filter(explode('@', $curr_learn[0]['attach_file']));
            if (count($attach_file)) {
                $attach_desc = array_filter(explode('@', $curr_learn[0]['attach_desc']));
                ?>
                <ul class="sidebar-block list-group list-group-menu list-group-minimal">
                    <?php
                    foreach ($attach_file as $fkey => $file) {
                        $filename = explode('/', $file);
                        $filename = end($filename);
                        ?>
                        <li class="list-group-item">
                            <a href="<?php echo 'https://lakita.vn/' . 'tai-ve.html/' . str_replace("=", "", base64_encode($file)); ?>">
                                <i class="fa fa-file-text"></i>&nbsp;&nbsp;
                                <?php
                                if (!empty($attach_desc[$fkey])) {
                                    echo $attach_desc[$fkey];
                                } else {
                                    echo $filename;
                                }
                                ?>
                                <span class="badge"><i class="fa fa-download"></i></span>
                            </a>
                            <?php $this->session->set_tempdata('is_downloadable', $curr_id, 3600); ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p class="category">Không có file đính kèm</p>
                <?php
            }
        }
    }
    ?>
</div>