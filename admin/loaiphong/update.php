<?php
if(is_array($loaiphong)){
    extract($loaiphong);
}
?>
<div class="row">
            <div class="row formtitle">
                <h1>Cập nhật loại hàng hóa</h1>
            </div>
            <div class="row formcontent">
                <form action="./index.php?act=updatedm" method="post">
                    <div class="row mb10">
                        Mã loại <br>
                        <input type="text" name="maloai" disabled >
                    </div>
                    <div class="row mb10">
                        Tên loại <br>
                        <input type="text" name="name" value="<?php if(isset($name) && $name != "") echo "$name" ?>">
                    </div>
                    <div class="row mb10">
                        Tên loại <br>
                        <input type="text" name="trangThai" value="<?php if(isset($trangThai) && $trangThai != "") echo "$trangThai" ?>">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($id) && $id != "") echo "$id" ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                    if(isset($thongbao)&&$thongbao!=""){
                        echo $thongbao;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>