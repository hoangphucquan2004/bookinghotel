<div class="row">
    <div class="row formtitle mb">
        <h1>Danh sách phòng</h1>
    </div>
    <div class="row mb10">
        <a href="index.php?act=addphong"><input type="button" value="Nhập thêm phòng"></a>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formdsloai">
            <table>
                <tr>
                    <th>MÃ PHÒNG</th>
                    <th>TÊN PHÒNG</th>
                    <th>GIÁ PHÒNG</th>
                    <th>TRẠNG THÁI</th>
                    <th>ẢNH</th>
                    <th>MÔ TẢ</th>
                    <th>ID LOẠI PHÒNG</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listphong as $phong) {
                    extract($phong);
                    // if ($trangThai == 1) {
                    //     echo "Còn phòng";
                    // } else {
                    //     echo "Hết phòng";
                    // }
                    $suasp = "index.php?act=suaphong&id=" . $id;
                    $xoasp = "index.php?act=xoaphong&id=" . $id;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height = '80'>";
                    } else {
                        $hinh = "No photo";
                    }
                    echo '   <tr>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $giaPhong . '</td>
                                <td>' . $trangThai . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $mota . '</td>
                                <td>' . $idLoaiPhong . '</td>
                                <td> 
                                <a href="' . $suasp . '"> <input type="button" name="" value="Sửa"></a>   <a href="' . $xoasp . '"><input type="button" name="" value="Xóa"></a> 
                                </td>';
                }
                ?>
            </table>
        </div>
    </div>
</div>