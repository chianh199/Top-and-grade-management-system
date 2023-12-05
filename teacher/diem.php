<?php include '../components/teacher_header.php'; 
        $gv_id = $_SESSION['teacher_id'];
?>
<?php @include '../components/config.php';

if(isset($_GET['duyet'])){
    $sv_id = $_GET['duyet'];
    mysqli_query($conn, "UPDATE dangkydetai SET trangthai = 'Chưa Được Duyệt' where detai = '$sv_id' ");
 };
 

 if(isset($_GET['duyetdx'])){
    $sv_id = $_GET['duyetdx'];
    mysqli_query($conn, "UPDATE dexuat SET dx_tt = 'Chưa Được Duyệt' where dx_id = '$sv_id' ");
 };
 
 
?>
<?php
    @include '../components/config.php';
    $sql = "SELECT * FROM `dangkydetai`, `sinhvien`, `detai`, `bomon`, `lop`, `loaidetai`  WHERE `trangthai` = 'Đã Duyệt' and `sinhvien` = `sv_id` and `detai` = `dt_id` AND `giangvien` = '$gv_id' and `loaidetai` = `ldt_id` and `lop` = `lop_id` and `bomon` = `bomon_id`;";
    $sql1 = "SELECT * FROM `dexuat`, `sinhvien`, `nhomnienluan`, `bomon`, `lop`, `loainienluan`  WHERE `dx_tt` = 'Đã Duyệt' and `dx_sv` = `sv_id` and `nhomnienluan` = `nnl_id` AND `giangvien` = '$gv_id' and `loainienluan` = `lnl_id` and `lop` = `lop_id` and `bomon` = `bomon_id`;";

    $select = mysqli_query($conn, $sql);
    $select2 = mysqli_query($conn, $sql1);
    $select1 = mysqli_query($conn, "SELECT * FROM loaidetai "); 
?>                    
        <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-12 rounded h-100 p-4">
                            <h5 class="mb-4">Danh Sách Nhập Điểm</h5>                     
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
                                            <center>SV Đăng Ký</center>
                                        </th>
                                        <th scope="col">
                                            <center>Điểm</center>
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
                                    <?php while($row = mysqli_fetch_assoc($select)){?>
                                        <tr>
                                        <th scope="row">
                                            <center> <?php echo $row['dt_id']; ?> </center>
                                        </th>
                                        <td> <center> <?php echo $row['dt_ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['diem']; ?> </center> </td>
                                        <td> <center> <?php echo $row['ldt_ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['trangthai']; ?> </center> </td>
                                        <td> <center>
                                            <a href="diem.php?duyet= <?php echo $row['dt_id']; ?> "><button type="button" class="btn btn-primary"><i class="bi bi-vector-pen"></i>Hủy</button></a>
                                            <a href="chamdiem.php?sua=<?php echo $row['sv_id']; ?>" ><button type="button" class="btn btn-danger">Nhập Điểm</button></a>
                                            
                                            </center> </td>
                                        </tr>
                                    <?php } ?>            
                                    
                                    <?php while($row = mysqli_fetch_assoc($select2)){?>
                                        <tr>
                                        <th scope="row">
                                            <center> <?php echo $row['dx_id']; ?> </center>
                                        </th>
                                        <td> <center> <?php echo $row['dx_ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['dx_diem']; ?> </center> </td>
                                        <td> <center> <?php echo $row['lnl_ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['dx_tt']; ?> </center> </td>
                                        <td> <center> 
                                        <a href="diem.php?duyetdx= <?php echo $row['dx_id']; ?> "><button type="button" class="btn btn-primary"><i class="bi bi-vector-pen"></i>Hủy</button></a>
                                        <a href="chamdiem.php?suadx=<?php echo $row['dx_id']; ?>" ><button type="button" class="btn btn-danger">Nhập Điểm</button></a>
                                            </center> </td>
                                        </tr>
                                    <?php } ?>            
                                    </tbody>
                                    </table>
                        </div>

                    </div>                                                
                </div>                  
<?php include '../components/footer.php'; ?>
