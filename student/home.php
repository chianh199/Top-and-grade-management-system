<?php include '../components/student_header.php'; 
    $sv_id = $_SESSION['student_id'];
?>
<?php
    @include '../components/config.php';
   if(isset($_POST['dangky'])){
        $dt_id = $_POST['detai'];
        $insert = "INSERT INTO dangkydetai(diem, trangthai, sinhvien, detai) VALUES('0','Chưa Được Duyệt','$sv_id', '$dt_id')";
        mysqli_query($conn, $insert);
    };
?>
<?php
    @include '../components/config.php';
    $select5 = mysqli_query($conn, "SELECT * FROM sinhvien s, lop l, bomon b, khoa k where s.sv_id = '$sv_id' && s.lop = l.lop_id && l.bomon = b.bomon_id && b.khoa_id = k.id ");
    $sql = "SELECT * FROM `nhomnienluan` n, `sinhvien`, `detai` d, `loaidetai`, `giangvien` WHERE `sv_id` = '$sv_id' and `nhomnienluan` = `nnl_id` AND n.`giangvien` = d.`giangvien` AND `loainienluan` = `loaidetai` and `loaidetai` = `ldt_id` and n.`giangvien` = `gv_id`;";
    $select8 = mysqli_query($conn, $sql);

    
 ?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Thông Tin Sinh Viên</h6>
                            <dl class="row mb-0">
                            <?php while($row = mysqli_fetch_assoc($select5)){?>
                                <dd class="col-sm-6"><?php echo $row['ten']; ?></dd>
                                

                                <dd class="col-sm-6">Khóa : <?php echo $row['sv_khoa']; ?></dd>
                                <dd class="col-sm-12">Khoa <?php echo $row['name']; ?></dd>

                                
                                <dd class="col-sm-12">Email : <?php echo $row['email']; ?></dd>

                            </dl>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Thông Tin Sinh Viên</h6>
                            <dl class="row mb-0">
                            
                                
                                <dd class="col-sm-8">Bộ Môn : <?php echo $row['bomon_name']; ?></dd>

                                
                                <dd class="col-sm-8"> Lớp : <?php echo $row['lop_name']; ?></dd>
                            <?php } ?>
                            </dl>
                        </div>
                    </div>

                    <div class="col-12 rounded h-100 p-4">
                            <h5 class="mb-4">Danh Sách Đề Tài Gợi Ý</h5>                     
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
                                            <center>SLSV</center>
                                        </th>
                                        <th scope="col">
                                            <center>SL Còn Lại</center>
                                        </th>
                                        <th scope="col">
                                            <center>Loại Đề Tài</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tác vụ</center>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($select8)){?>
                                        <form action="" method="post">
                                            <tr>
                                                <th scope="row">
                                                    <?php $id_dt = $row['dt_id'];
                                                        @include '../components/config.php';
                                                        $select = mysqli_query($conn, "SELECT detai from dangkydetai where detai = '$id_dt'");
                                                        $row1 = mysqli_num_rows($select);
                                                    ?>
                                                    <input type="hidden" name="detai" value = "<?php echo $id_dt;  ?>">
                                                    <center> <?php echo $id_dt;  ?> </center>
                                                </th>
                                                <td style="width: 17%;"> <center> <?php echo $row['dt_ten']; ?> </center> </td>
                                                <td style="width: 20%;"> <center> <?php echo $row['dt_mota']; ?> </center> </td>
                                                <td style="width: 18%;"> <center> <?php echo $row['ten']; ?> </center> </td>
                                               
                                                <td> <center> <?php echo $row['dt_soluongsv']; ?> </center> </td>

                                                <td> <center> <?php echo ($row['dt_soluongsv'] - $row1) ; ?> </center> </td>
                                                
                                                <td> <center> <?php echo $row['ldt_ten']; ?> </center> </td>
                                                <td> <center> 
                                                            <button type="submit" name="dangky" class="btn btn-primary"><i class="bi bi-vector-pen"></i>Đăng Ký</button>
                                                    </center> </td>
                                            </tr>
                                        </form>                            
                                    <?php } ?>                  
                                    </tbody>
                                    </table>
                                    <a href="dexuat.php"><button type="submit" name="btn_add" class="btn btn-success m-2">+ Đề Xuất Đề Tài</button></a>
                        </div>
                        
                        

                <!-- Table Start -->
            
                    
                </div>
            </div>

<?php include '../components/footer.php'; ?>