<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
    <style>
       .border666{border:solid #666;} 
       .blackbg{background-color:#000;color:#FFF;text-align:center;}
       .heading1{margin:0px;line-height:70px;font-style:italic;}
       .font15px{font-size: 15px;}
       .noborder1{border-width:0px; padding: 4px 0px 1px 9px;}
       .padding5px{padding: 5px;}
       .font12px{font-size:12px;}
       .width70percent{width:70%; padding: 5px !important; color:red;}
       .font15pxbold1{font-size:15px; font-weight: bold;}
       .red1{color:red;}
       
    </style>
</head>
<body>
<div class="border666">
    <div class="blackbg">
        <h1 class="heading1">user Information</h1></div>
    <div class="whitebg"><h3 class="heading3">Dear admin,</h3>

        <p class="font12pxa">The following is a new contact us form verified by KGT. Please review
            and act accordingly.</p></div>
    <div class="bg999">
        <h2>User Information</h2>
        <table>
            <tr>
                <td>Name</td>
                <td>'.$user_data1['name'].'</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>'.$user_data1['email'].'</td>
            </tr>
            <tr>
                <td>Company</td>
                <td>'.$user_data1['company'].'</td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>'.$user_data1['contact'].'</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>'.$user_data1['country'].'</td>
            </tr>
            <tr>
                <td>Branch</td>
                <td>'.$user_data1['branch'].'</td>
            </tr>
            <tr>
                <td>Designation</td>
                <td>'.$user_data1['designation'].'</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>'.$user_data1['message'].'</td>
            </tr>
        </table>
    </div>
    <div class="kgt6"><p
            class="font12pxbold">Regards,<br><br>KGT HR Department</p>
    </div>
</div>
</body>
</html>

	
					