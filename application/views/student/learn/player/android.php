
<?php
$primary_video = $this->lib_mod->detail('learn', array('id' =>  $curr_learn[0]['id']), '');
$url = "rtsp://lakita.vn:1935/vod/mp4://" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']);
?>
<div class="js-video widescreen">
    <div class="text-center">
        <a href="<?php echo $url ?>">
            <img src="<?php echo base_url(); ?>styles/v2.0/img/mobi/player.png" style="max-width: 100%"/>
        </a>
    </div>
</div>