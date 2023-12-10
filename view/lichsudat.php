
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/css/giohang.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    img{
        width: 220px;
        height: 120px;
    }
</style>
<body>
<?php
      if (isset($_SESSION['name'])) {
        extract($_SESSION['name']);
      }
?>
<h1>Phòng đặt của <?=$name?></h1>
    <table border="1" width="100%" style="margin: 0 auto;">
        <thead>
            <tr align="center">
                
                <td>Tên phòng</td>
                <td>Ảnh</td>
                <td>Giá</td>
                <td>Ngày nhận phòng</td>
                <td>Ngày trả phòng</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <?php 
        if (isset($_SESSION['name'])) {
            foreach ($lichsu as $key =>$ls) {
                $so = 1;
                extract($ls);
                $hinh = $img_path . $img;
                echo '
                <tbody id="order">
                <tr align="center">
                 
                    <td> '.$ls['name'].' </td>
                    <td> <img src="'. $hinh.'" alt=""></td>
                    <td>'.$ls['giaPhong'].'</td>
                    <td>'.$ls['ngayBatDau'].'</td>
                    <td>'.$ls['ngayKetThuc'].'</td>
                    <td></td>
                </tr>
                <!-- <tr>
                    <td colspan="5" align="center">
                        <h2>Tổng tiền hàng:</h2>
                    </td>
                    <td colspan="2" align="center">
                        <h2>
                            <span>
                            </span>
                        </h2>
                    </td>
                </tr> -->
            </tbody>
                ';
            }
            
        } 
        ?>
    </table>
    <br>
</body>

</html>