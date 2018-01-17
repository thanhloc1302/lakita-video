<div class="carousel slide" id="carousel-example-generic2" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic2" data-slide-to="0" class="active hidden-sm hidden-xs hidden-1000"></li>
        <li data-target="#carousel-example-generic2" data-slide-to="1" class="hidden-sm hidden-xs hidden-1000"></li>
        <li data-target="#carousel-example-generic2" data-slide-to="2" class="hidden-sm hidden-xs hidden-1000"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php
        $i = 0;
        foreach ($rates as $key => $value) {
            ?>
            <div class="item <?php if ($i++ == 0) echo 'active'; ?>">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-responsive img" src="<?php echo 'https://lakita.vn/' . $value['thumbnail']; ?>">
                        <p class="name">  <?php echo $value['name']; ?> </p>
                        <p class="org"> <?php echo $value['org']; ?> </p>
                        <p class="content"> <?php echo $value['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<a href="#carousel-example-generic2" class="left-carousel-control hidden-md hidden-lg" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
<a href="#carousel-example-generic2" class="right-carousel-control hidden-md hidden-lg" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>