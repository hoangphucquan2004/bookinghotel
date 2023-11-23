<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <form action="dkdn.php?act=dangnhap" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Tên đăng nhập" required>
                <i class='bx bx-user'></i>
            </div>
        
            <div class="input-box">
                <input type="password" name="pass" placeholder="Mật khẩu" required>
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="remember">
               <label>
                <input type="checkbox">Ghi nhớ</label>
                <a href="#">Quên mật khẩu</a>
            </div>
            <input type="submit" value="Đăng Nhập" name="dangnhap"  >
            
        </form>
        <h2 class="thongbao">
                            <?php

                                if(isset($thongbao)&&($thongbao!="")){
                                    echo $thongbao;
                                }

          ?>  
      </h2>
    </div>
    
</body>
</html>