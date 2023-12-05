<?php include '../components/admin_header.php'; ?>

<?php 
    @include '../components/config.php';
    $select = mysqli_query($conn, "SELECT *, s.ten as tensv FROM nhomnienluan, loainienluan, sinhvien s, giangvien g, hocky where loainienluan = lnl_id and lnl_ten = 'Niên Luận Ngành' and nnl_id = nhomnienluan and giangvien = gv_id and hocky = hk_id");
?>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-12 rounded h-100 p-4">
                            <h5 class="mb-4">Quản Lý Nhóm Niên Luận Ngành</h5>                     
                                    <table class="table table-bordered ">
                                    <thead>
                                    <tr class="table-warning" >
                                        <th scope="col">
                                            <center>STT</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tên Nhóm Niên Luận</center>
                                        </th>
                                        <th scope="col">
                                            <center>GV Hướng Dẫn</center>
                                        </th>
                                        <th scope="col">
                                            <center>Học Kỳ</center>
                                        </th>
                                        <th scope="col">
                                            <center>SV Đăng Ký</center>
                                        </th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($select)){?>
                                        <tr>
                                        <th scope="row">
                                            <center> <?php echo $row['nnl_id']; ?> </center>
                                        </th>
                                        <td> <center> <?php echo $row['nnl_ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['hk_ten']; ?> </center> </td>
                                        <td> <center> <?php echo $row['tensv']; ?> </center> </td>
                                        
                                        </tr>
                                    <?php } ?>            
                                    </tbody>
                                    </table>
                        </div>
                    </div>                                                
                </div> 

<?php include '../components/footer.php'; ?>