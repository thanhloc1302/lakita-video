<?php
$upload = array(
    "name" => "img",
    "size" => "25",
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Freetuts.net</title>
    </head>

    <body>
        <form action="<?php echo base_url(); ?>Student2/studying/action_upload" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <label>Avartar: </label><input type="file" name="excel" size="25">
                <br><label> </label><input type="submit" name="ok" value="Upload">
                        </form>
                        </body>
                        </html>