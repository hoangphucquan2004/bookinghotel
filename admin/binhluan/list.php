<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h3 class="page-title">Danh sách phòng</h3>
                <div class="ml-auto text-right">
                    <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav> -->
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            
            
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                <table>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Nội dung bình luận</th>
                            <th>Name</th>
                            <th>IdPhong</th>
                            <th>Ngày bình luận</th>
                           
                            <th></th>
                        </tr>
                        <?php
                            foreach($listbinhluan as $binhluan){
                                    extract($binhluan);
                                $suabl="index.php?act=suabl&id=".$id;
                                $xoabl="index.php?act=xoabl&id=".$id;
                                
                                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$noidung.'</td>
                                <td>'.$name.'</td>
                                <td>'.$idPhong.'</td>
                                <td>'.$ngaybinhluan.'</td>
                                
                                <td><a href="'.$suabl.'"><input type="button" value="Sửa"></a> <a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                        }

                        ?>
   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>