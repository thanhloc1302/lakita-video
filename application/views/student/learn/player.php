<div class="row gr1-row-1">
    <div class="st-pusher" id="content">
        <div class="st-content">
            <div class="st-content-inner padding-none">
                <div class="container-fluid videolayout">
                    <div class="js-video widescreen">
                        <button class="js-video-btn btn btn-success">Đóng</button>
                        <?php
                        if (!empty($curr_learn[0]['video_file'])) {
                            $value = $curr_learn[0]['id'];
                            $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
                            $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
                            $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
                            $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
                            if ($iPod || $iPhone || $iPad) {
                                ?>
                                <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . $value . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                                <?php
                            } else if ($Android) {
                                ?>
                                <div class="text-center">
                                    <a href="
                                    <?php
                                    $primary_video = $this->lib_mod->detail('learn', array('id' => $value), '');
                                    echo "rtsp://lakita.vn:1935/vod/mp4://" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']);
                                    ?>
                                       ">
                                        <img src="<?php echo 'https://lakita.vn/'; ?>styles/v2.0/img/mobi/player.png" style="max-width: 100%"/>
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . $value . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                                <?php
                            }
                        } else {
                            ?>
                            <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . 612 . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                        <?php } ?>
                        <script type="text/javascript" src="https://content.jwplatform.com/libraries/BhGRfCt5.js"></script>
                        <input type="hidden" id="auto_next" value="1" />
                        <input type="hidden" id="curr_learn_id" value="<?php echo $curr_id; ?>" />
                    </div>
                    <div style="color :red; text-align: center; font-weight: bold">
                        <p>Nếu bạn gặp sự cố, vui lòng cài đặt <a href="https://www.youtube.com/watch?v=HjZU99M7398" target="blank">Teamview</a> và liên hệ tới số điện thoại 1900 6361 95 để được hỗ trợ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>