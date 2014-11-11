<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>email</title>
    </head>
    <body>
        <div style="border:solid #666">
            <div style="background-color:#000;color:#FFF;text-align:center;">
                <img src="{base_url}/assets/template/images/logo.png" style="border-width:0px; padding: 4px 0px 1px 9px;">
                <h1 style="margin:0px;line-height:70px;font-style:italic; font-weight:normal;">KGT VERIFICATION CODE</h1>
            </div>
            <div style="background-color:#FFF;color:#000;">
                <h3 style="margin: 32px 20px 29px 20px; font-weight:normal;">Dear <?php echo $name; ?> ,</h3>
            </div>
            <div>
                <h3 style="margin: 32px 20px 29px 20px; font-weight:normal;">Your KGT Verification Code is:<span style="color:red"><?php echo $dynamic_code; ?></span>
                </h3>
            </div>
            <div style="background-color:#FFF;color:#000;padding-left:20px;font-size:24px;line-height:10px">
                <p style="font-size:12px;" >Regards,<br><br>KGT HR Department</p>
            </div>
        </div>
    </body>
</html>
