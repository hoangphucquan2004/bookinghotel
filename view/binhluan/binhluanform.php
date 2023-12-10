<?php
    $idPhong=$_REQUEST['idPhong'];
    include "../../model/pdo.php";
    include "../../model/binhluan.php";

    session_start();
    $dsbl=loadall_binhluan($idPhong);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/binhluan/bl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
    <title>Document</title>
    
</head>
<body>
    
    
<div class="binhluan">
                    <div class="titlebl">
                        Bình luận... 
                        <i class='bx bxs-edit-alt'></i>
                        </div>
                    <div class="bl">
                <table>
                   <?php
                    
                            foreach($dsbl as $bl){
                                extract($bl);                 
                                echo '<tr><td> '.$noidung.' </td>';
                                echo '<td> '.$name.' </td>';
                                echo '<td> '.$ngaybinhluan.' </td> </tr>';
                            }
                        ?> 
                 </table>
                    </div>
                    <div class="boxbl">
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="idPhong" value="<?php echo $idPhong?>">
                            <input type="text" name="noidung">
                            <input type="submit" name="guibinhluan" value="Gửi bình luận">
                        </form>
                    </div>
                    <?php
                    if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
                        
                        $noidung=$_POST['noidung'];
                        $idPhong=$_POST['idPhong'];
                        $name=$_SESSION['name']['id'];
                        $ngaybinhluan=date('h:i:sa d/m/Y');
                        insert_binhluan($noidung,$name,$idPhong,$ngaybinhluan);
                        header("Location: " .$_SERVER['HTTP_REFERER']);
                    }
                    
                    ?>

                </div>

</body>
</html>