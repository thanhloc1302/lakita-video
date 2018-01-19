<div role="tabpanel" class="tab-pane" id="ghichu">
                        <?php
                        if ($trial_learn == 1) {
                            echo '<p class="margintop10"> Bạn cần đăng ký khóa học để viết ghi chú! </p>';
                        } else {
                            ?>
                            <div class="form-group" style="height:200px !important; margin-top: 10px;">
                                <textarea id="learn_note" rows="18" style="height:200px !important;color: #858585;" class="form-control" placeholder="Ghi chú của bạn"><?php if (isset($learn_note[0])) echo preg_replace("/<br[^>]*>\s*\r*\n*/is", "\n", $learn_note[0]['note']); ?></textarea>
                            </div>
                            <br>
                            <button class="btn btn-primary pull-right" type="button" id="save_note">Lưu ghi chú <i class="fa fa-plus"></i></button>
                        <?php } ?>
                    </div>