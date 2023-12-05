
<?php include '../components/student_header.php'; 
    $sv_id = $_SESSION['student_id'];
?>
<?php @include '../components/config.php';
    if(isset($_GET['xoa'])){
        //$id = $_GET['xoa'];
        
        $check = mysqli_query($conn, "SELECT trangthai from dangkydetai where sinhvien = '$sv_id'");
        if(mysqli_num_rows($check) > 0){
            while($row = mysqli_fetch_assoc($check)){
            $check1 = $row['trangthai'];
                if($check1 == 'Đã Duyệt'){
                //header('location:dangky.php');
            }
            else{
                $insert = "DELETE FROM dangkydetai where sinhvien = '$sv_id' ";
                mysqli_query($conn, $insert);
                //header('location:dangky.php');
            }
            }
        }
        
        
    }
    if(isset($_GET['xoadx'])){
        $id_dx = $_GET['xoadx'];
        $check = mysqli_query($conn, "SELECT dx_tt from dexuat where dx_id = '$id_dx'");
        if(mysqli_num_rows($check) > 0){
                while($row = mysqli_fetch_assoc($check)){
                $check1 = $row['dx_tt'];
            }
            if($check1 == 'Đã Duyệt'){
                //header('location:dangky.php');
            }
            else{
                mysqli_query($conn, "DELETE FROM dexuat WHERE dx_id = '$id_dx' ");
                //header('location:dangky.php');
            }
        }
        
    }
?>
<?php
    @include '../components/config.php';
    $sql = "SELECT * FROM `dangkydetai`, `detai`, `giangvien`, `loaidetai` WHERE `sinhvien` = '$sv_id' and `detai` = `dt_id` and `giangvien` = `gv_id` and `loaidetai` = `ldt_id`;";
    $select8 = mysqli_query($conn, $sql);
    $select2 = mysqli_query($conn, "SELECT * FROM dexuat, nhomnienluan, loainienluan, giangvien  WHERE dx_sv = '$sv_id' and dx_nnl = nnl_id AND giangvien = gv_id and loainienluan = lnl_id");

 ?>
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-12 rounded h-100 p-4">
                                <h5 class="mb-4">Danh Sách Đề Tài Đăng Ký</h5>                     
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
                                            <center>Mô Tả</center>
                                        </th>
                                        <th scope="col">
                                            <center>GV Hướng Dẫn</center>
                                        </th>
                                        <th scope="col">
                                            <center>Loại Đề Tài</center>
                                        </th>
                                        
                                        <th scope="col">
                                            <center>Trạng Thái</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tác vụ</center>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($select8)){?>
                                        
                                            <tr>
                                                
                                                <th scope="row">
                                                    <?php $id_dt = $row['dt_id']; ?>
                                                    <input type="hidden" name="detai" value = "<?php echo $id_dt;  ?>">
                                                    <center><?php echo $id_dt;  ?></center>
                                                </th>
                                                <td style="width: 200px;"> <center> <?php echo $row['dt_ten']; ?> </center> </td>
                                                <td style="width: 250px;"> <center> <?php echo $row['dt_mota']; ?> </center> </td>
                                                <td style="width: 180px;"> <center> <?php echo $row['ten']; ?> </center> </td>
                                                <td style="width: 140px;"> <center> <?php echo $row['ldt_ten']; ?> </center> </td>
                                                <td style="width: 110px;"> <center> <?php echo $row['trangthai']; ?> </center> </td>
                                                    
                                                    
                                                
                                                <td> <center>
                                                <a href="dangky.php?xoa=<?php echo $row['sinhvien']; ?>"><button type="submit" name="delete" class="btn btn-primary"><i class="bi bi-vector-pen"></i>Hủy</button></a>
                                                
                                                    </center> </td>
                                            </tr>
                                                                    
                                    <?php } ?>                  
                                    </tbody>
                                    </table>
                            </div>

                            <div class="col-12 rounded h-100 p-4">
                            <h5 class="mb-4">Danh Sách Đề Xuất</h5>                     
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
                                            <center>Mô Tả</center>
                                        </th>
                                        <th scope="col">
                                            <center>GV Hướng Dẫn</center>
                                        </th>
                                        <th scope="col">
                                            <center>Loại Đề Tài</center>
                                        </th>
                                        <th scope="col">
                                            <center>Trạng Thái</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tác Vụ</center>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php while($row = mysqli_fetch_assoc($select2)){?>
                                            <tr> <?php $id = $row['dx_id']; ?>
                                            <th scope="row">
                                                <center> <?php echo $id; ?> </center>  
                                            </th>
                                            <td style="width: 200px;"> <center> <?php echo $row['dx_ten']; ?> </center> </td>
                                            <td style="width: 250px;"> <center> <?php echo $row['dx_mota']; ?> </center> </td>
                                            <td style="width: 180px;"> <center> <?php echo $row['ten']; ?> </center> </td>
                                            <td style="width: 140px;"> <center> <?php echo $row['lnl_ten']; ?> </center> </td>
                                            <td style="width: 110px;"> <center> <?php echo $row['dx_tt']; ?> </center> </td>
                                            
                                            <td> <center>
                                                <a href="dangky.php?xoadx=<?php echo $id; ?>"><button type="submit" name="deletedx" class="btn btn-primary"><i class="bi bi-vector-pen"></i>Hủy</button></a>
                                                    </center> </td>
                                            </tr>
                                            <?php } ?> 
                                        
                                               
                                    </tbody>
                                    </table>
                        </div>
            
                    
                </div>
            </div>

<?php include '../components/footer.php'; ?>