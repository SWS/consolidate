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
                <img src="<?php echo base_url() . 'assets/template/images/logo.png'; ?>" style="border-width:0px; padding: 4px 0px 1px 9px;">
            </div>
            <div style="background-color:#000;color:#FFF;text-align:center;">
                <h1 style="margin:0px;line-height:70px;font-style:italic;font-weight:normal;">New download request</h1>
            </div>
            <div style="background-color:#FFF;color:#000;">
                <h3 style="margin-left:20px;line-height:50px;font-weight:normal;">Dear Marketing Manager,</h3>
                <p style="margin-left:20px;font-size:14px;font-weight:bold;">We are interested to download the current file to know more about KGT products and services. Please review and send us a code and link at the earliest possible. </p>
            </div>
            <div style="padding:20px">
                <table width="100%" border="1px">
                    <tr><td style="width:40%;padding:5px;">My name and surname: </td><td style="width:60%;padding:5px; color:red;"><?php echo $name; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">My email address : </td><td style="width:60%;padding:5px;color:red;"><?php echo $email; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">My company: </td><td style="width:60%;padding:5px;color:red;"><?php echo $company; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">My telephone number:</td><td style="width:60%;padding:5px;color:red;"><?php echo $contact; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">My country:</td><td style="width:60%;padding:5px;color:red;"><img src="<?php echo base_url() . 'assets/template/flags/' . $flag_name .'.png'; ?>"/><?php echo $country; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">KGT Branch</td><td style="width:60%;padding:5px;color:red;"><img src="<?php echo base_url() . 'assets/template/flags/' . $branch_flag .'.png'; ?>"/><?php echo $branch; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">My designation within your company: </td><td style="width:60%;padding:5px;color:red;"><?php echo $designation; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">My message to us: </td><td style="vertical-align:top;width:60%;padding:5px; text-align: justify;color:red;"><?php echo $message; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">File name</td><td style="width:60%;padding:5px;color:red;"><?php echo $productname; ?></td></tr>
                    <tr><td style="width:40%;padding:5px;">File code</td><td style="width:60%;padding:5px;color:red;"><?php echo $user_code; ?></td></tr>
                </table>
            </div>
            <div style="background-color:#FFF;color:#000;padding-left:20px;font-size:24px;line-height:10px">
                <p  style="font-size:15px; font-weight:bold;">Regards,<br><br><?php echo $name; ?></p>
            </div>
        </div>
    </body>
</html>
