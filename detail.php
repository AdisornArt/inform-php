<?php

	$str_hostname = "localhost";
	$str_username = "root";
	$str_password = "";
	$str_dbname = "alertdb";

	$obj_con = mysqli_connect($str_hostname,$str_username,$str_password,$str_dbname);

	if(!$obj_con) {
		header("location:error.php");
		exit();
	}
	
	mysqli_query($obj_con,"SET NAMES UTF8");

	$str_sql = "SELECT id,topic,name,positon,image,detail,status FROM history_tb ";
	$obj_rs = mysqli_query($obj_con,$str_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="top"></div>
    <div class="header">
        <div class="wrap">
            <div class="menu">
                <a href="index.html"><img src="images/alarm.png" alt=""></a>
                <h1>ระบบแจ้งเหตุร้องเรียน</h1>
            </div>
        </div>
    </div>
    <div class="detail">
        <div class="wrap">
            <h2>รายละเอียด</h2>
            <table>
                <tr>
                    <th>ลำดับ</th>
                    <th>เรื่อง</th>
                    <th>ชื่อผู้แจ้ง</th>
                    <th>จุดเกิดเหตุ</th>
                    <th>รูปภาพ</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                </tr>

            <?php while( $obj_row = mysqli_fetch_array($obj_rs) ) { ?>
                <tr>
                    <td><?= $obj_row['id'] ?> </td>
                    <td><?= $obj_row['topic'] ?> </td>
                    <td><?= $obj_row['name'] ?> </td>
                    <td><?= $obj_row['positon'] ?> </td>
                    <td><img src="images/<?= $obj_row['image'] ?>" alt=""></td>
                    <td><?= $obj_row['detail'] ?> </td>
                    <td><?= $obj_row['status'] ?> </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>