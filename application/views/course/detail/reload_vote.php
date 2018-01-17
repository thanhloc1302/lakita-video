<div class="row marginbottom15">
    <div class="col-md-3"> <strong> Nhận xét (<?php echo count($vote); ?>) </strong></div>
    <!--                                <div class="col-md-9"> Sắp xếp theo
                                        <select class="form-control">
                                            <option> Ngày tạo </option>
                                        </select>
                                        <ul class="nextCourse">
                                            <li> &lt; </li>
                                            <li class="active">1</li>
                                            <li >2</li>
                                            <li >3</li>
                                            <li >4</li>
                                            <li >5</li>
                                            <li> &gt; </li>
                                        </ul>
                                    </div>-->
</div>

<?php foreach ($vote as $value) { ?>
    <div class="row marginbottom15">
        <div class="col-md-2">
            <a href="#">
                <img alt="64x64" class="media-object img-circle" data-src="holder.js/64x64" src="https://lakita.vn/styles/images/people/110/user.png" data-holder-rendered="true" style="width: 64px; height: 64px;">
            </a>
        </div>
        <div class="col-md-10">
            <span> <strong><?php echo $value['vote_user_name']; ?></strong> &nbsp; &nbsp;<?php echo date('H:i:s d/m/Y', $value['time']); ?></span>
            <p>
                <?php echo $value['vote_description']; ?>
            </p>
    <!--                                    <p> <i class="fa fa-reply" aria-hidden="true"></i> Trả lời (0)
                | <i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ
                | <i class="fa fa-thumbs-up" aria-hidden="true"></i> Thích (1) </p>-->
        </div>
    </div>
    <?php
}?>