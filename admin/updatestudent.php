<?php
@include '../components/config.php';
$id = $_GET['edit'];

    if(isset($_POST['btn_update'])){

        $ten = mysqli_real_escape_string($conn, $_POST['ten']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = ($_POST['pass']);
        $lop = $_POST['lop'];
        $nnl = $_POST['nnl'];
        
        $loaitaikhoan = $_POST['loaitaikhoan'];
        
        if( ($lop != null && $nnl != null) ){
            
            $update_data = "UPDATE sinhvien SET ten='$ten', email='$email', pass='$pass', loaitaikhoan ='$loaitaikhoan', lop = '$lop', nhomnienluan = '$nnl' WHERE sv_id = '$id' ";
            $result = mysqli_query($conn, $update_data);
        }else if( ($lop != null && $nnl == null) ){
            $update_data = "UPDATE sinhvien SET ten='$ten', email='$email', pass='$pass', loaitaikhoan ='$loaitaikhoan', lop = '$lop' WHERE sv_id = '$id' ";
            $result = mysqli_query($conn, $update_data);
            header('location:home.php');
        }else if( ($lop == null && $nnl != null) ){
            $update_data = "UPDATE sinhvien SET ten='$ten', email='$email', pass='$pass', loaitaikhoan ='$loaitaikhoan', nhomnienluan = '$nnl' WHERE sv_id = '$id' ";
            $result = mysqli_query($conn, $update_data);
        }else{
            header('location:home.php');
        }
            

        if($result){                    
            header('location:home.php');
        }
    };
?>
<?php include '../components/admin_header.php'; ?>
<?php
   
   $select = mysqli_query($conn, "SELECT * FROM sinhvien, lop, nhomnienluan, bomon where sv_id = '$id' && lop = lop_id && bomon = bomon_id  && nhomnienluan = nnl_id ");
   $select1 = mysqli_query($conn, "SELECT * FROM lop");
   $select2 = mysqli_query($conn, "SELECT *FROM nhomnienluan");
   
?>
    <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Cập Nhật Tài Khoản Sinh Viên</h6>
                        <form action="" method="post">

                            <?php while($row = mysqli_fetch_assoc($select)){ ?>

                                <div class="form-floating mb-3">
                                    <input type="text" name="ten" class="form-control" id="floatingInput" value="<?php echo $row['ten']; ?>"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Tên</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="floatingInput" value="<?php echo $row['email']; ?>"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="pass" class="form-control" id="floatingPassword" value="<?php echo $row['pass']; ?>"
                                        placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="loaitaikhoan" class="form-control" id="floatingPassword" value="<?php echo $row['loaitaikhoan']; ?>"
                                        placeholder="Password">
                                    <label for="floatingPassword">Loại Tài Khoản</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="lop" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        
                                        <option selected  value="<?php $row['lop_id']; ?>"><?php echo $row['lop_name']; ?></option>
                                    
                                        <?php while($row1 = mysqli_fetch_assoc($select1)){
                                                $l = $row1["lop_id"];
                                                $l1 = $row1["lop_name"];
                                                echo "<option value=' ".$l." '> ".$l1." </option> </br>";                                       
                                            
                                        } ?>
                                    </select>
                                    <label for="floatingSelect">Lớp</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="nnl" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <?php   $check = $row['nhomnienluan'];
                                                $check1 = $row['nnl_ten'];
                                                if($check != null){
                                                    echo "<option selected value=' ".$check." '>".$check1."</option>";
                                                }else{
                                                    echo " ";
                                                } ?>
                                        
                                    
                                        <?php while($row1 = mysqli_fetch_assoc($select2)){
                                                $l = $row1["nnl_id"];
                                                $l1 = $row1["nnl_ten"];
                                                echo "<option value=' ".$l." '> ".$l1." </option> </br>";                                       
                                            
                                        } ?>
                                    </select>
                                    <label for="floatingSelect">Nhóm Niên Luận</label>
                                </div>

                            <?php } ?>
                                    <button type="submit" name="btn_update" class="btn btn-success m-2">Lưu Tài Khoản</button>                          
                        </form>                         
                    </div>         
                </div>
            </div>                                              
        <!-- Table End -->

<?php include '../components/footer.php'; ?>