<?php
// include "../model/loaiphong.php";
include "../model/taikhoan.php";
include "../model/pdo.php";
include "../model/phong.php";
include "../model/loaiphong.php";
include "./header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //  Caaph nhật danh mục
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $trangThai = $_POST['trangThai'];
                insert_loaiphong($name, $trangThai);
                $thongbao = "Thêm thành công";
            }
            include "loaiphong/add.php";
            break;
            // Xóa
            // Sửa
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $loaiphong = loadone_loaiphong($_GET['id']);
            }
            include "loaiphong/update.php";
            break;
            //Cập nhật
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name = $_POST['name'];
                $trangThai = $_POST['trangThai'];
                $id = $_POST['id'];
                update_loaiphong($id, $name, $trangThai);
                $thongbao = "Cập nhật thành công";
            }
            $listloaiphong = loadall_loaiphong();
            include "loaiphong/listdm.php";
            break;
        case 'lisdm':
            $listloaiphong = loadall_loaiphong();
            include "loaiphong/listdm.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_loaiphong($_GET['id']);
            }
            $listloaiphong = loadall_loaiphong();
            include "loaiphong/listdm.php";

            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $trangthai = $_POST['trangthai'];
                insert_loaiphong($tenloai, $trangthai);
            }
            include "./loaiphong/add.php";
            break;
        case 'addphong':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                // $maphong = $_POST['maphong'];
                $tenphong = $_POST['tenphong'];
                $giaphong = $_POST['giaphong'];
                $trangthai = $_POST['trangthai'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                $mota = $_POST['mota'];
                $idloaiphong = $_POST['idloaiphong'];
                $sql =  insert_phong($tenphong, $giaphong, $trangthai, $hinh, $mota, $idloaiphong);
            }
            include "./phong/add.php";
            break;
        case 'listphong':
            $listphong = load_all_phong();
            include "./phong/listphong.php";
            break;
        case 'suaphong':
            if ($_GET['id'] && $_GET['id'] > 0) {
                $phong =  load_one_phong($_GET['id']);
            }
            include "./phong/update.php";
            break;
        case 'updatephong':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenphong = $_POST['tenphong'];
                $giaphong = $_POST['giaphong'];
                $trangthai = $_POST['trangthai'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                $mota = $_POST['mota'];
                $idloaiphong = $_POST['idloaiphong'];
                $id = $_POST['id'];
                update_phong($id, $tenphong, $giaphong, $trangthai, $hinh, $mota, $idloaiphong);
            }
            $listphong = load_all_phong();
            include "./phong/listphong.php";
            break;
        case 'xoaphong':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_phong($_GET['id']);
            }
            $listphong = load_all_phong();
            include "./phong/listphong.php";
            break;
        case 'dskh':
            $listnguoidung = loadall_nguoidung();
            include "./taikhoan/list.php";
            break;
        case 'xoakh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                dalete_nguoidung($_GET['id']);
            }
            $sql = "select * from nguoidung order by id desc";
            $listnguoidung = loadall_nguoidung("", 0);
            include "./taikhoan/list.php";
            break;
    }
} else {
    include './home.php';
}




include "./footer.php";
