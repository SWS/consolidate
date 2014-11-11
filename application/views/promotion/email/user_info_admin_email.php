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
                    <h1 style="margin:0px;line-height:70px;font-style:italic; font-weight:normal;">User Information</h1>
        </div>
                    <div style="background-color:#FFF;color:#000;">
                        <h3 style="margin-left:20px;line-height:50px; font-weight:normal;">Dear admin,</h3>
                    <p style="margin-left:20px;font-size:12px">This email ID successfully verified by KGT. This user sent inquiry. Please Revert to them.</p>
                    </div>
                    <div style="padding:20px">
                    <h2 style="font-weight:normal;">User Information</h2>
                    <table>
                    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
                    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                    <tr><td>Company</td><td><?php echo $company; ?></td></tr>
                    <tr><td>Contact</td><td><?php echo $contact; ?></td></tr>
                    <tr><td>Country</td><td><?php echo $country; ?></td></tr>
                    <tr><td>Branch</td><td><?php echo $branch; ?></td></tr>
                    <tr><td>Designation</td><td><?php echo $designation; ?></td></tr>
                    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
                    </table>
                    </div>
        <div style="background-color:#FFF;color:#000;padding-left:20px;font-size:24px;line-height:10px">
            <p  style="font-size:12px;">Regards,<br><br>KGT HR Department</p>
                    </div>
    </div>
</body>
</html>
