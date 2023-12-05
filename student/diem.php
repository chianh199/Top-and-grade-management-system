<?php include '../components/student_header.php'; 
    $sv_id = $_SESSION['student_id'];
?>

<?php
    @include '../components/config.php';
    $sql = "SELECT * FROM `dangkydetai`, `detai`, `giangvien`, `loaidetai` WHERE `sinhvien` = '$sv_id' and `detai` = `dt_id` and `giangvien` = `gv_id` and `loaidetai` = `ldt_id`;";
    $select8 = mysqli_query($conn, $sql);
    $select2 = mysqli_query($conn, "SELECT * FROM dexuat, nhomnienluan, loainienluan, giangvien  WHERE dx_sv = '$sv_id' and dx_nnl = nnl_id AND giangvien = gv_id and loainienluan = lnl_id");
    if(isset($_POST['delete'])){
        $trangthai = $_POST['trangthai'];
        echo $trangthai;
        $dt_id = $_POST['detai'];
        if($trangthai == "Đã Duyệt"){
            header('location:dangky.php');
        }
        else{
            $insert = "DELETE FROM dangkydetai where detai = '$dt_id' ";
            mysqli_query($conn, $insert);
            //header('location:dangky.php');
        }
    }
    
 ?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    

                            <div class="col-12 rounded h-100 p-4">
                                <h5 class="mb-4">Xem Điểm</h5>                     
                                    <table class="table table-bordered ">
                                    <thead>
                                        <tr class="table-warning" >
                                        <th scope="col">
                                            <center>STT</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tên Đề Tài</center>
                                        </th>
                                        <th scope="col">
                                            <center>GV Hướng Dẫn</center>
                                        </th>
                                        <th scope="col">
                                            <center>Trạng Thái</center>
                                        </th>
                                        <th scope="col">
                                            <center>Điểm</center>
                                        </th>
                                        <th scope="col">
                                            <center>Loại Đề Tài</center>
                                        </th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($select8)){?>
                                        <form action="" method="post">
                                            <tr>
                                                <th scope="row">
                                                    <?php $id_dt = $row['dt_id'];
                                                       
                                                    ?>
                                                    <input type="hidden" name="detai" value = "<?php echo $id_dt;  ?>">
                                                    <center> <?php echo $id_dt;  ?> </center>
                                                </th>
                                                <td> <center> <?php echo $row['dt_ten']; ?> </center> </td>
                                                <td> <center> <?php echo $row['ten']; ?> </center> </td>
                                                <td> <center> <?php echo $row['trangthai']; ?> </center> </td>
                                                <input type="hidden" name="trangthai" value = "<?php $row['trangthai']; ?>">

                                                <td> <center> <?php echo $row['diem']; ?> </center> </td>
                                                
                                                <td> <center> <?php echo $row['ldt_ten']; ?> </center> </td>
                                                
                                            </tr>
                                        </form>                            
                                    <?php } ?>                  
            
                                        <form action="">
                                            <?php while($row = mysqli_fetch_assoc($select2)){?>
                                            <tr>
                                            <th scope="row">
                                                <center> <?php echo $row['dx_id']; ?> </center>  
                                            </th>
                                            <td> <center> <?php echo $row['dx_ten']; ?> </center> </td>
                                                              
                                            <td> <center> <?php echo $row['ten']; ?> </center> </td>
                                            
                                            <td> <center> <?php echo $row['dx_tt']; ?> </center> </td>

                                            <td> <center> <?php echo $row['dx_diem']; ?> </center> </td>

                                            <td> <center> <?php echo $row['lnl_ten']; ?> </center> </td>
                                            
                                            <?php } ?> 
                                        </form>
                                               
                                    </tbody>
                                    </table>
                        </div>
            
                    
                </div>
            </div>

<?php include '../components/footer.php'; ?>