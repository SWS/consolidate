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
                <h1 style="margin:0px;line-height:70px;font-style:italic">New Product Enquiry </h1>
            </div>
            <div style="background-color:#FFF;color:#000;">
                <h3 style="margin-left:20px;line-height:50px;">Dear Admin,</h3>
                <div style="background-color:#999;color:#FFF;padding:20px">
                    A new product Inquiry has been received in the website.
                    <h2>Requester Information</h2>
                    <table>
                        <tr><td>Name</td><td><?php echo $name; ?></td></tr>
                        <tr><td>Part Number</td><td><?php echo $enquirypart_number; ?></td></tr>
                        <tr><td>Phone</td><td><?php echo $telephone; ?></td></tr>
                        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                    </table>
                </div>
                <div style="background-color:#FFF;color:#000;padding-left:20px;font-size:24px;line-height:10px">
                    <p  style="font-size:12px;font-weight:bold">Regards,<br><br>KGT HR Department</p>
                </div>
            </div>
        </div>
    </body>
</html>