    < <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="./view/css/style.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        </head>

        <body>
            <div class="container">
                <form action="dkdn.php?act=dangky" method="post">
                    <h1>Đăng ký</h1>
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Tên tài khoản" required>
                        <i class='bx bx-user'></i>
                    </div>

                    <div class="input-box">
                        <input type="password" name="pass" placeholder="Mật khẩu" required>
                        <i class='bx bx-lock-alt'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required>
                        <i class='bx bx-envelope'></i>
                    </div>
                    <div class="input-box">
                        <input type="number" name="sdt" placeholder="Số điện thoại" required>
                        <i class='bx bx-phone'></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" value="Đăng ký" name="dangky">
                    </div>
                    <div class="input-box">
                 </div>
                </form>
                <h2 class="thongbao">
                    <?php

                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }

                    ?>
                </h2>

            </div>

        </body>

        </html>