    <?php
$iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
$iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
if ($iPod || $iPhone || $iPad) {
    $this->load->view('student/learn/player/iphone');
}else if ($Android) {
    $this->load->view('student/learn/player/android');
}else{
    $this->load->view('student/learn/player/desktop');
}