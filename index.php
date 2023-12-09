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
            $phongnew  = load_all_phong_home();
            include "./view/choo.php";
            break;
        case 'booking':
            if (!isset($_SESSION['name'])) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
                echo '<input type="hidden" value="a">';
                // header('location:index.php');
                echo "<script>
                Swal.fire({
                    title: 'Thông báo',
                    text: 'Hãy đăng nhập để đặt phòng ',
                    confirmButtonText: 'ok'
                });
                
              </script>";
                // header('location:http://localhost/php/du_an_one/dkdn.php?act=dangnhap');
            } elseif (isset($_SESSION['name']) && isset($_GET['idphong']) && ($_GET['idphong'] > 0)) {
                $phong = load_one_phong($_GET['idphong']);
                include "./view/booking.php";
            }

            break;
        case 'xacnhantt':
            $phong = load_one_phong($_GET['idphong']);
            include "./view/datphong.php";
            break;
        case 'datphong':
            if (isset($_POST['datphong']) && ($_POST['datphong'])) {
                $tong = $_SESSION['tong'];
                $idphong = $_POST['idphong'];
                $namekh = $_POST['namekh'];
                $phonenumber = $_POST['phonenumber'];
                $email = $_POST['email'];
                $cmt = $_POST['cmt'];
                $songuoi = $_POST['songuoi'];
                $ngaybatdau = $_POST['ngaybatdau'];
                $ngayketthuc = $_POST['ngayketthuc'];

                dat_phong($namekh, $idphong, $ngaybatdau, $ngayketthuc, $songuoi);
                $thongbao = "Đặt phòng thành công!";
                $phong = load_one_phong($_POST['idphong']);
                include "./view/datphong.php";
            }

            if (isset($_POST['redirect'])) {
                $tong = $_SESSION['tong'];
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/php/du_an_one/index.php";
                $vnp_TmnCode = "CGXZLS0Z"; //Mã website tại VNPAY 
                $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật
                $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Noi dung thanh toan';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $tong * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            }
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
        case 'lichsudat':
            // $tk = loadtk_đh($_GET['nameuser']);
            $lichsu = load_lichsu();
            include 'view/lichsudat.php';
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
                if (isset($_POST['order_confirm'])) {
                    $txthoten = $_POST['txthoten'];
                    $txttel = $_POST['txttel'];
                    $txtemail = $_POST['txtemail'];

                    $pttt = $_POST['pttt'];
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
        case 'ttonl':
            if (isset($_POST['order_confirm']) && ($_POST['order_confirm'])) {
                $pttt = $_POST['pttt'];
                $txthoten = $_POST['txthoten'];
                $txttel = $_POST['txttel'];
                $txtemail = $_POST['txtemail'];
                if ($pttt == 2) {
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/php/du_an_one/index.php";
                    $vnp_TmnCode = "CGXZLS0Z"; //Mã website tại VNPAY 
                    $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật

                    $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Noi dung thanh toan';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = 1000000 * 100;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if (isset($_POST['order_confirm'])) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
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
