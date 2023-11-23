<?php
function insert_phong($tenphong,$giaphong,$trangthai,$hinh,$mota,$idloaiphong){
    $sql = "insert into phong(name,giaPhong,trangThai,img,mota,idLoaiPhong) values ('$tenphong','$giaphong','$trangthai','$hinh','$mota','$idloaiphong')";
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
function update_phong($id,$tenphong,$giaphong,$trangthai,$hinh,$mota,$idloaiphong){
    if($hinh != ""){
    $sql = "UPDATE phong SET name = '$tenphong',giaPhong = '$giaphong ',trangThai = '$trangthai',img = '$hinh', mota= '$mota ',idLoaiPhong = '$idloaiphong' where id=".$id;
    }
    else{
    $sql = "UPDATE phong SET name = '$tenphong',giaPhong = '$giaphong ',trangThai = '$trangthai', mota= '$mota ',idLoaiPhong = '$idloaiphong' where id=".$id;
    }
    pdo_execute($sql);
}
function delete_phong($id){
    $sql = "DELETE FROM phong where id=".$id;
    pdo_execute($sql);
}



?>