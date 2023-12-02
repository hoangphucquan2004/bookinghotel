<?php
session_start();
include "model/pdo.php";
include "model/phong.php";
include "model/taikhoan.php";
include "model/order.php";

include "./global.php";
$phongnew  = load_all_phong_home();

if (isset($_GET['act']) && ($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'choo':
            include "./view/choo.php";
            break;
        case 'booking':
            if (isset($_GET['idphong']) && ($_GET['idphong'] > 0)) {
                $phong = load_one_phong($_GET['idphong']);
            }
            include "./view/booking.php";
            break;
        case 'datphong':
            if (isset($_POST['datphong']) && ($_POST['datphong'])) {
                $idphong = $_POST['idphong'];
                $namekh = $_POST['namekh'];
                $phonenumber = $_POST['phonenumber'];
                $email = $_POST['email'];
                $cmt = $_POST['cmt'];
                $songuoi = $_POST['songuoi'];
                $ngaybatdau = $_POST['ngaybatdau'];
                $ngayketthuc = $_POST['ngayketthuc'];
                // echo $namekh,$idphong,$hoadon,$ngaybatdau,$ngayketthuc,$songuoi;
                dat_phong($namekh, $idphong, $ngaybatdau, $ngayketthuc, $songuoi);
                $thongbao = "Đặt phòng thành công!";
            }
            $phong = load_one_phong($_POST['idphong']);
            include "./view/datphong.php";
            break;
        case 'timphong':
            if (isset($_POST['timphong']) && $_POST['timphong']) {
                $keyw = $_POST['keyw'];
                $giaphong = $_POST['giaphong'];
            } else {
                $keyw = "";
                $giaphong = 0;
            }
            $listphong = search_phong($keyw, $giaphong);
            include "./view/timphong.php";
            break;
        case 'xacnhantt':
            $phong = load_one_phong($_GET['idphong']);
            include "./view/datphong.php";
            break;
        case 'thanhtoan':
            $phong = load_one_phong($_GET['idphong']);
            include "./view/thanhtoan.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            exit();
            break;
        case "listCart":
            // Kiểm tra xem giỏ hàng có dữ liệu hay không
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');

                // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
                $idList = implode(',', $productId);

                // Lấy sản phẩm trong bảng sản phẩm theo id
                $dataDb = loadone_phongCart($idList);
                // var_dump($dataDb);
            }
            include "view/listCartOrder.php";
            break;
        case "success":
            if (isset($_SESSION['success'])) {
                include 'view/success.php';
            } else {
                header("Location: index.php");
            }
            break;
        case "order":
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                // print_r($cart);
                if (isset($_POST['order_confirm'])) {
                    $txthoten = $_POST['txthoten'];
                    $txttel = $_POST['txttel'];
                    $txtemail = $_POST['txtemail'];

                    $pttt = $_POST['pttt'];
                    // date_default_timezone_set('Asia/Ho_Chi_Minh');
                    // $currentDateTime = date('Y-m-d H:i:s');
                    if (isset($_SESSION['user'])) {
                        $id_user = $_SESSION['user']['id'];
                    } else {
                        $id_user = 0;
                    }
                    $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $_SESSION['resultTotal'], $pttt);
                    foreach ($cart as $item) {
                        addOrderDetail($idBill, $item['id'], $item['giaPhong'], $item['quantity'], $item['giaPhong'] * $item['quantity']);
                    }
                    unset($_SESSION['cart']);
                    $_SESSION['success'] = $idBill;
                    header("Location: index.php?act=success");
                }
                include "view/order.php";
            } else {
                header("Location: index.php?act=listCart");
            }
            break;
        default:
            include "./view/header.php";
            include "./view/home.php";
            include "./view/footer.php";
    }
} else {
    include "./view/header.php";
    include "./view/home.php";
    include "./view/footer.php";
}
