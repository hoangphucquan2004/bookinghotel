<?php
include "model/pdo.php";
include "model/phong.php";
include "model/taikhoan.php";
include "./global.php";
$phongnew  = load_all_phong_home();

if(isset($_GET['act']) && ($_GET['act'])){
    $act = $_GET['act'];
    switch($act){
        case 'booking':
            if(isset($_GET['idphong']) && ($_GET['idphong']>0)){
                $phong = load_one_phong($_GET['idphong']);
            }
            include "./view/booking.php";
            break;
        // case 'book':
        //     if(isset($_GET['idphong']) && ($_GET['idphong']>0)){
        //         $phong = load_one_phong($_GET['idphong']);
        //     }
        //     include "./view/booking.php";
        //     break;
        case 'ttcanhan':
            if(isset($_GET['idphong']) && ($_GET['idphong']>0)){
                $phong = load_one_phong($_GET['idphong']);
            }
            include "./view/thongtincanhan.php";
            break;        
        default:
        include "./view/header.php";
        include "./view/home.php";
        include "./view/footer.php";
    }
}
else{
    include "./view/header.php";
    include "./view/home.php";
    include "./view/footer.php";
}


