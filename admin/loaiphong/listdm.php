<div class="row">
            <div class="row formtitle">
                <h1>Quản lí loại hàng hóa</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ PHÒNG</th>
                            <th>TÊN PHÒNG</th>
                            <th>TRẠNG THÁI</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach($listloaiphong as $loaiphong){
                                extract($loaiphong);
                                $suadm = "index.php?act=suadm&id=".$id;
                                $xoadm = "index.php?act=xoadm&id=".$id;
                                echo '   <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$trangThai.'</td>
                                <td> 
                                <a href="'.$suadm.'"> <input type="button" name="" value="Sửa"></a>   <a href="'.$xoadm.'"><input type="button" name="" value="Xóa"></a> 
                                </td>';
                            }
                        ?>
                        <!-- <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>0001</td>
                            <td>Đồng hồ</td>
                            <td> 
                                <input type="button" name="" value="Sửa"> <input type="button" name="" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>0001</td>
                            <td>Đồng hồ</td>
                            <td> 
                                <input type="button" name="" value="Sửa"> <input type="button" name="" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>0001</td>
                            <td>Đồng hồ</td>
                            <td> 
                                <input type="button" name="" value="Sửa"> <input type="button" name="" value="Xóa">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>0001</td>
                            <td>Đồng hồ</td>
                            <td> 
                                <input type="button" name="" value="Sửa"> <input type="button" name="" value="Xóa">
                            </td>
                        </tr> -->
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>