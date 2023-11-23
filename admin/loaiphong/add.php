
<div class="row">
            <div class="row formtitle">
                <h1>Thêm mới loại phòng</h1>
            </div>
            <div class="row formcontent">
                <form action="./index.php?act=adddm" method="post">
                    <div class="row mb10">
                        Mã phòng <br>
                        <input type="text" name="maloai" disabled>
                    </div>
                    <div class="row mb10">
                        Tên loại phòng <br>
                        <input type="text" name="name">
                    </div>
                    <div class="row mb10">
                        Trạng Thái<br>
                        <select name="trangThai">
                            <option value="Còn Phòng">Còn Phòng</option>
                            <option value="Hết Phòng">Hết Phòng</option>
                        <!-- Trạng thái <br>
                        <select name="trangthai">
                            <option value="0">Còn phòng</option>
                            <option value="1">Hết phòng</option> -->
                        </select>
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=lisdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                    ?>
                </form>
            </div>
        </div>
    </div>