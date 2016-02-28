<?php
if(isset($_POST["event_title"])) {
    $eventtitle = $_POST['event_title'];
	$hostname=$_POST['event_host_name'];
	$eventstartdate=$_POST["event_start"];
	$eventenddate=$_POST["event_end"];
	$eventstarttime=$_POST["event_start_time"];
	$eventendtime=$_POST["event_end_time"];
	$eventloc=$_POST["event_location"];
	$eventaddr=$_POST["event_address"];
	$eventph=$_POST["event_phone"];
	$email=explode(",",$_POST['emailid']);
	$img="http://bindgap.com/evite/".$_POST['imgpath'];
	$subject = 'Invitation:'.$_POST["event_title"];
	$message='
	<div align="center">
		<div style="width:100%;min-height:38px;background-color:#dcdcdc" align="left">
                <img src="" alt="" style="float:left;margin-top:10px;margin-left:10px" class="CToWUd">
         </div>
        <div style="width:100%;min-height:auto;color:#005190;margin-top:40px">
           <table cellspacing="0" cellpadding="15" border="0" style="width:100%">
                <tbody>
                 <tr style="display:table-cell">
                  <td valign="top" style="display:block;width:90%;float:left">
                             <table style="width:100%">
                                    <tbody>
                                        <tr><td style="width:100%">
										<a href="#" target="_blank">
										<img src="'.$img.'" alt="" style="width:80%;min-height:auto;margin:auto 10%" class="">
										</a>
										</td>
										</tr>
                                        <tr><td style="width:80%;text-align:center"><a href="#" target="_blank">View Invitation Details</a></td></tr>
                                    </tbody>
                                </table>
                            </td>
                            <td valign="top" style="display:block;width:90%;float:left">
                                <div>
                                    <p style="font-family:Arial;font-size:13px;color:#000;line-height:15px;margin-top:10px;font-weight:bold;text-align:center">username invited you to</p>
                                    <p style="color:#000;font-size:18px;font-weight:bold;line-height:24px;margin-top:5px;margin-bottom:5px;text-align:center"><a style="color:#0181bd;text-decoration:none" href="#" target="_blank">'.$eventtitle.'</a></p>
                                </div>
                                <div>
                                    <p style="font-family:Arial,sans-serif;font-size:14px;color:#666;font-weight:bold;margin-top:0px;text-align:center">On '.$eventstartdate.' '.$eventstarttime.' to '.$eventenddate.' '.$eventendtime.'</p>
                                </div>
                                <p style="margin:10px auto;width:202px;text-align:center"><span style="font-size:10px;color:#000;text-transform:capitalize;font-weight:bold;font-size:12px;font-family:Arial,sans-serif">Will you attend?</span><br> </p>
                                <p style="margin:auto;width:204px"><a href="#" style="display:inline-block;display:inline;padding:4px 10px 4px;background-color:#0181bd;color:#ffffff;text-decoration:none;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;width:200px;text-align:center;border:1px solid #ccc" target="_blank">Respond to this Invitation</a></p>
                            </td>
                            <td valign="top" style="padding:0px;display:block;width:90%;float:left"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
	';
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <no-reply@bindgap.com>' . "\r\n";
	$headers .= 'Cc: ' . "\r\n";
	foreach($email as $emailaddr){
		mail($emailaddr,$subject,$message,$headers);
	}
echo "1";
}
else { echo "2"; }
?>