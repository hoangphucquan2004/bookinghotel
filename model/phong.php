<?php
function insert_phong($tenphong,$giaphong,$hinh,$mota,$idloaiphong){
    $sql = "insert into phong(name,giaPhong,img,mota,idLoaiPhong) values ('$tenphong','$giaphong','$hinh','$mota','$idloaiphong')";
    pdo_execute($sql);
}
function load_all_phong(){
    $sql = "SELECT * FROM phong";
    $listphong = pdo_query($sql);
    return $listphong;
}
function load_all_phong_home(){
    $sql = "SELECT * FROM phong ORDER BY id desc limit 3,9";
    $listphong = pdo_query($sql);
    return $listphong;
}
function load_one_phong($id){
    $sql = "SELECT * FROM phong where id =".$id;
    $phong = pdo_query_one($sql);
    return $phong;
}
function update_phong($id,$tenphong,$giaphong,$hinh,$mota,$idloaiphong){
    if($hinh != ""){
    $sql = "UPDATE phong SET name = '$tenphong',giaPhong = '$giaphong',img = '$hinh', mota= '$mota ',idLoaiPhong = '$idloaiphong' where id=".$id;
    }
    else{
    $sql = "UPDATE phong SET name = '$tenphong',giaPhong = '$giaphong ', mota= '$mota ',idLoaiPhong = '$idloaiphong' where id=".$id;
    }
    pdo_execute($sql);
}
function delete_phong($id){
    $sql = "DELETE FROM phong where id=".$id;
    pdo_execute($sql);
}
//Đặt phòng
function dat_phong($namekh,$idphong,$ngaybatdau,$ngayketthuc,$songuoi){
    $sql = "insert into datphong(namekh,idPhong,ngayBatDau,ngayKetThuc,soLuong) values ('$namekh','$idphong','$ngaybatdau','$ngayketthuc','$songuoi')";
    pdo_execute($sql);
}
//Tìm Phòng
function search_phong($keyw,$giaphong){
    $sql = "SELECT * FROM phong where 1";
    if($keyw != ""){
        $sql .= " and name like '%".$keyw."%'";
    }
    if($giaphong>0){
        $sql .= " and giaPhong like '%".$giaphong."%'";
    }
    $sql .= " ORDER BY id DESC";
    $listphong = pdo_query($sql);
    return $listphong;
}
function loadone_phongCart ($idList) {
    $sql = 'SELECT * FROM phong WHERE id IN ('. $idList . ')';
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function load_lichsu() {
   $sql = "SELECT phong.name,phong.giaPhong,phong.img, datphong.ngayBatDau, datphong.ngayKetThuc FROM phong inner join datphong on phong.id = datphong.idPhong
--    inner join nguoidung on datphong.iduser=nguoidung.id";
   $lichsu = pdo_query($sql);
   return $lichsu;
}
?>