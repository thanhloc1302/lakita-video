<div class="modal fade" id="modal-purchase-coursse">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"> &nbsp; &nbsp; &nbsp;Thông tin mua khóa học </h3>
            </div>
            <div class="modal-body bgwhite">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo 'https://lakita.vn/'. $curr_courses[0]['image']; ?>" alt="<?php echo $curr_courses[0]['name']; ?>" class="img-responsive">
                            </div>
                            <div class="col-md-6">
                                <h4 class="lineheight22"> 
                                    <strong>
                                        <?php echo $curr_courses[0]['name']; ?>
                                    </strong>
                                </h4>
                                <h3>  <?php echo number_format(str_replace('.', '', $curr_courses[0]['price_root'])); ?> VNĐ </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="border-left: 1px solid #d1d1d1;">
                        <div class="row">
                            <div class="col-md-6 paddingright0">
                                <p> Giá gốc: </p>
                                <p> Giảm giá: </p>
                                <hr>
                                <p> Thành tiền (đã bao gồm VAT): </p>
                            </div>
                            <div class="col-md-4 text-right paddingleft0">
                                <p> <?php echo number_format(str_replace('.', '', $curr_courses[0]['price_root'])); ?> VNĐ </p>
                                <p class="voucher-modal"> <?php
                                    echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root']) - $temp) : 0)));
                                    ?> VNĐ
                                </p>
                                <hr>
                                <p class="price-modal"> <strong> <?php
                                        $priceVouched = isset($temp) ? $temp : $curr_courses[0]['price_root'];
                                        echo number_format(str_replace('.', '', $priceVouched));
                                        ?> VNĐ </strong></p>
                            </div>
                        </div>
                        <div class="text-center marginbottom10">
                            <a href="mua-khoa-hoc.html" class="btn btn-primary my-btn marginbottom10 margintop20"> MUA KHÓA HỌC</a>
                        </div>
                    </div>
                </div>
                <hr class="hr-modal">
            </div>
        </div>
    </div>
</div>