<?php
$checkPermission = $this->session->tempdata('temp_type_login');
if (!isset($checkPermission)) {
    redirect(base_url());
    die;
}
$phone = $this->input->post('phone_number');
if ($phone != '') {
    if (preg_match('/^0[0-9]{9,10}$/', $phone)) {
        $this->session->set_tempdata('phone_number', $phone, 1800);
        if ($checkPermission == 'new')
            redirect(base_url() . "guest/login_via_fb_new");
        else
            redirect(base_url() . "guest/login_via_fb_old");
    } else {
        echo '<script> alert("Số điện thoại không đúng định dạng, mời bạn nhập lại!"); </script>';
    }
}
?>
<div class="row" style="background: url('https://lakita.vn/styles/images/logo.png') center center no-repeat; min-height: 500px">
    <div class="col-md-8 col-md-offset-1">
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document" style="float: none;">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center" style="font-family: sans-serif;"> Mời bạn nhập số điện thoại để tiếp tục</h3>
                                <div class="col-md-offset-2 col-md-8">
                                    <form id="target" action="<?php echo base_url(); ?>guest/fbrequire" method="post">
                                        <div class="form-group">
                                            <label for="Username"></label>
                                            <input type="text" required class="form-control" id="phone_number" name= "phone_number" placeholder="Số điện thoại">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block" id="login">Đăng nhập</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>    
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>styles/v2.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>styles/v2.0/css/bootstrap-theme.min.css" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('#myModal').modal({show: true});
    });
</script>  

