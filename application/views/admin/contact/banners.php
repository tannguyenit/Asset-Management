<?php
$bg_array = array("#CEED9D","#ECED9D","#EDCF9D","#EC9CA7","#ED9DD0","#EE9DE2","#D69DEC","#9E9CEC");
$bg = array_rand($bg_array,1);
?>
<style type="text/css">
	.box-chat {position: fixed; bottom: 0; width: 100%; border-top: 1px solid #e5e5e5;}
#formSendMsg input[type=text] {width: calc(100% - 20px); padding: 10px; font-size: 15px; color: #555; border: 0;}
 
/* Show chat */
 .msg-user {width: 100%; text-align: right; margin-bottom: 10px;}
 .msg-user p {background-color: #428bca; color: #fff; display: inline-block; padding: 10px; font-size: 15px;}
 .msg {width: 100%; text-align: left; margin-bottom: 10px;}
 .msg p {background-color: #f1f1f1; color: #555; display: inline-block; padding: 10px; font-size: 15px;}
 .msg-user .info-msg-user,
 .msg .info-msg {font-size: 13px; color: #666; margin-top: 5px;}
 .banner{
 	height: 250px;
 	overflow: scroll;
 }
</style>
<div class="banner" style="background-color:<?php echo $bg_array[$bg];?>;" >
<?php
foreach ($arMessage as $key => $value) {
	$date_sent = $value['date_sent'];
    $day_sent = substr($date_sent, 8, 2); // Ngày gửi
    $month_sent = substr($date_sent, 5, 2); // Thánh gửi
    $year_sent = substr($date_sent, 0, 4); // Năm gửi
    $hour_sent = substr($date_sent, 11, 2); // Giờ gửi
    $min_sent = substr($date_sent, 14, 2); // Phút gửi

	 if ($value['user_from'] == "admin") {
        echo '<div class="msg-user">
                        <p>' . $value['body'] . '</p>
                        <div class="info-msg-user">
                                Bạn - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '
                        </div>
                </div>';
    }
    // Ngược lại người gửi không phải là $user thì hiển thị khung tin nhắn màu xám
    else {
        echo '  <div class="msg">
                        <p>' . $value['body'] . '</p>
                        <div class="info-msg">
                                ' . $value['user_from'] . ' - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '
                        </div>
                </div>';
    }
}




?>

</div>