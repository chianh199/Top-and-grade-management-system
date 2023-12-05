<?php @include '../components/config.php';

    // delete
    if(isset($_GET['deletegv'])){
        $id = $_GET['deletegv'];
        mysqli_query($conn, "DELETE FROM giangvien WHERE gv_id = $id");
        header('location:home.php');
     };
     if(isset($_GET['deletesv'])){
        $id = $_GET['deletesv'];
        mysqli_query($conn, "DELETE FROM sinhvien WHERE sv_id = $id");
        header('location:home.php');
     };
?>
<?php include '../components/admin_header.php'; ?>
<?php
    //selecte
   $select = mysqli_query($conn, "SELECT * FROM giangvien g, bomon b where g.bomon = b.bomon_id");
   $select1 = mysqli_query($conn, "SELECT * FROM sinhvien s, lop l, bomon b where s.lop = l.lop_id && l.bomon = b.bomon_id");  
?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">                    
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Danh Sách Giảng Viên</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        
                                        <tr>
                                        <th scope="col"><center>STT</center></th>
                                            <th scope="col"><center>Tên</center></th>
                                            
                                            <th scope="col"><center>Email</center></th>                                           
                                            <th scope="col"><center>Bộ Môn</center></th>
                                            
                                            <th scope="col"><center>Loại Tài Khoản</center></th>
                                            <th scope="col"><center>Tác Vụ</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($select)){ ?>
                                        <tr>
                                            <th scope="row"><center><?php echo $row['gv_id']; ?></center></th>
                                            <td><center><?php echo $row['ten']; ?></center></td>

                                            <td><center><?php echo $row['email']; ?></center></td>
                                            <td><center><?php echo $row['bomon_name']; ?></center></td>
                                            <td><center><?php echo $row['loaitaikhoan']; ?></center></td>
                                            
                                            <td>
                                            <center>
                                              <div class="btn-group" role="group">
                                                
                                                <a href="updateteacher.php?edit=<?php echo $row['gv_id']; ?>"><button type="button" class="btn btn-danger">Sửa</button></a>
                                                <a href="home.php?deletegv=<?php echo $row['gv_id']; ?>" ><button type="button" class="btn btn-danger">Xóa</button></a>
                                                
                                                </div>  
                                            </center>
                                            
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <a href="addteacher.php" > <button type="button" class="btn btn-success m-2">Thêm Giảng Viên</button></a>                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">                    
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Danh Sách Sinh Viên</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        
                                        <tr>
                                            <th scope="col"><center>STT</center></th>
                                            <th scope="col"><center>Tên</center></th>
                                            
                                            <th scope="col"><center>Email</center></th>                                           
                                            <th scope="col"><center>Bộ Môn</center></th>
                                            <th scope="col"><center>Lớp</center></th>
                                            <th scope="col"><center>Loại Tài Khoản</center></th>
                                            <th scope="col"><center>Tác Vụ</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_assoc($select1)){ ?>
                                        <tr>
                                            <th scope="row"><center><?php echo $row['sv_id']; ?></center></th>
                                            <td><center><?php echo $row['ten']; ?></center></td>

                                            <td><center><?php echo $row['email']; ?></center></td>
                                            <td><center><?php echo $row['bomon_name']; ?></center></td>
                                            <td><center><?php echo $row['lop_name']; ?></center></td>
                                            <td><center><?php echo $row['loaitaikhoan']; ?></center></td>
                                            
                                            <td>
                                            
                                                <center>
                                                    <div class="btn-group" role="group">
                                                    <a href="updatestudent.php?edit=<?php echo $row['sv_id']; ?>"><button type="button" class="btn btn-danger">Sửa</button></a>
                                                    <a href="home.php?deletesv=<?php echo $row['sv_id']; ?>" ><button type="button" class="btn btn-danger">Xóa</button></a>
                                                    </div>
                                                </center>
                                                
                                           
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <a href="addstudent.php" > <button type="button" class="btn btn-success m-2">Thêm Sinh Viên</button></a>                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
<?php include '../components/footer.php'; ?>

            