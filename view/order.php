
<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="./view/css/order.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        </head>

        <body>
<div class="page-order">
    <div class="form-order">
        <form action="" method="post">
            <h2>Thông tin khách hàng</h2>
            <div><input type="text" name="txthoten" id="" placeholder="Họ và tên" required></div>
            <div><input type="tel" name="txttel" id="" placeholder="Số điện thoại" required></div>
            <div><input type="email" name="txtemail" id="" placeholder="Email" required></div>
            <!-- <div><input type="text" name="txtaddress" id="" placeholder="Địa chỉ" required></div> -->
            <h3>Phương thức thanh toán</h3>
            <p><input type="radio" name="pttt" id="" value="1" required> Thanh toán khi giao hàng</p>
            <p><input type="radio" name="pttt" id="" value="2" required> Chuyển khoản ngân hàng</p>
            <input type="submit" value="Xác nhận đặt hàng" name="order_confirm">
        </form>
    </div>
    <div class="sub-order">
        <h2>Thông tin phòng</h2>
        <table >
            <tr>
                <th>Phòng</th>
                <th>Thành tiền</th>
            </tr>
            <?php 
                // print_r($cart);
                foreach ($cart as $item) {
            ?>
            <tr>
                <td>
                    <?php echo $item['name'];?><br>
                    <small>SL: <?php echo $item['quantity'];?></small>
                </td>
                <td><?php echo number_format($item['quantity']*$item['giaPhong'], 0, ",", "."); ?> ₫</td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td><b>Tổng tiền</b></td>
                <td><b><?php echo number_format($_SESSION['resultTotal'], 0, ",", "."); ?> ₫</b></td>
            </tr>
        </table>
    </div>
</div></body>

</html>