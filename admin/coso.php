<?php include '../components/admin_header.php'; ?>
<?php
    @include '../components/config.php';
    //add
    if(isset($_POST['btn_add'])){
        
        $nnl = mysqli_real_escape_string($conn, $_POST['nnl']);
        $gv = $_POST['gv'];
        $hk = $_POST['hk'];

        $select3 = " SELECT * FROM nhomnienluan WHERE nnl_ten = '$nnl' ";
        $result = mysqli_query($conn, $select3);
        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!';
        }else{
            $insert = "INSERT INTO nhomnienluan(nnl_ten, hocky, giangvien, loainienluan) VALUES('$nnl','$hk', '$gv', 1)";
            mysqli_query($conn, $insert);
            //header('location:home.php');
        }
    }

    //delete
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        mysqli_query($conn, "DELETE FROM nhomnienluan WHERE nnl_id = $id");
        header('location:bomon.php');
    }

    @include '../components/config.php';
    $select = mysqli_query($conn, "SELECT *, s.ten as tensv FROM nhomnienluan, loainienluan, sinhvien s, giangvien g, hocky where loainienluan = lnl_id and lnl_ten = 'Niên Luận Cơ Sở' and nnl_id = nhomnienluan and giangvien = gv_id and hocky = hk_id");

    $select1 = mysqli_query($conn, "SELECT *FROM giangvien");
    $select2 = mysqli_query($conn, "SELECT *FROM hocky");
?>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-12 rounded h-100 p-4">
                            <h5 class="mb-4">Quản Lý Nhóm Niên Luận Cơ Sở</h5>                     
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
                                        <th scope="col">
                                            <center>Tác vụ</center>
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
                                        <td> <center> <a href="coso.php?xoa=<?php echo $row['nnl_id']; ?>"><button type="button" class="btn btn-primary"><i class="bi bi-trash"></i>Xóa</button></a>
                                            </center> </td>
                                        </tr>
                                        </tr>
                                    <?php } ?>
                                   
                                    </tbody>
                                    </table>
                        </div>

                        <div class="col-12 rounded h-80 p-2">                         
                                <!-- Form thêm đề tài -->
                            <form action="" method = "post">
                                <div class="table-responsive">
                                    <table class="table " style="border-style: none;">                                       
                                        <tbody>                                            
                                            <tr>
                                                <td >
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <input type="text" name="nnl" class="form-control" id="floatingInput"
                                                                placeholder="name@example.com">
                                                            <label for="floatingInput">Tên Nhóm Niên Luận Cơ Sở</label>                                               
                                                        </div>
                                                    </center>
                                                    
                                                </td>
                                                <td >
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <select class="form-select" name="gv" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <?php while($row = mysqli_fetch_assoc($select1)){ 
                                                                    $bm = $row["gv_id"];
                                                                    $nbm = $row["ten"];
                                                                    echo "<option selected value=' ".$bm." '> ".$nbm." </option> </br>";                                       
                                                                
                                                                } ?>
                                                            </select>
                                                            <label for="floatingSelect">GV Hướng Dẫn</label>
                                                        </div>   
                                                    </center>
                                                                                                        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td >
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <select class="form-select" name="hk" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <?php while($row = mysqli_fetch_assoc($select2)){ 
                                                                    $bm = $row["hk_id"];
                                                                    $nbm = $row["hk_ten"];
                                                                    echo "<option selected value=' ".$bm." '> ".$nbm." </option> </br>";                                       
                                                                
                                                                } ?>
                                                            </select>
                                                            <label for="floatingSelect">Học Kỳ</label>
                                                        </div>   
                                                    </center>
                                                                                                        
                                                </td>
                                                <td >                                                   
                                                    <center><button type="submit" name="btn_add" class="btn btn-success m-2">+ Thêm Nhóm NLCS</button></center>                                                   
                                                </td>                                                                                 
                                            </tr>                                                                                                                      
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>                                                
                </div> 
<?php include '../components/footer.php'; ?>