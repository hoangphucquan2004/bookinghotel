<?php
function insert_binhluan($noidung,$name,$idPhong,$ngaybinhluan){
    $sql="insert into binhluan(noidung,name,idPhong,ngaybinhluan) values('$noidung','$name','$idPhong','$ngaybinhluan') ";
    pdo_execute($sql);
}
function loadall_binhluan($idPhong){
    $sql="select * from binhluan where 1";
    if($idPhong>0)
       $sql.=" AND idPhong='".$idPhong."'";
    
    $sql.=" order by id desc";
    $listbl=pdo_query($sql);
    return  $listbl;
}
function delete_binhluan($id){
    $sql="delete from binhluan where id=".$id ;
    pdo_execute($sql);
}

?>