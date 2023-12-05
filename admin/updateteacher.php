<?php
@include '../components/config.php';
$id = $_GET['edit'];
    if(isset($_POST['btn_update'])){

        $ten = mysqli_real_escape_string($conn, $_POST['ten']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = ($_POST['pass']);
        $bomon = $_POST['bomon'];
        $loaitaikhoan = $_POST['loaitaikhoan'];
        if($bomon != null){
            $update_data = "UPDATE giangvien SET ten='$ten', email='$email', pass='$pass', bomon='$bomon', loaitaikhoan ='$loaitaikhoan' WHERE gv_id = '$id'";
            $select = " SELECT * FROM giangvien WHERE email = '$email' && pass = '$pass' ";

            $result = mysqli_query($conn, $update_data);

            if($result){                    
                header('location:home.php');
            }
        }
        else{
            header('location:home.php');
        }
    };
?>
<?php include '../components/admin_header.php'; ?>
<?php
   $select = mysqli_query($conn, "SELECT * FROM giangvien, bomon where gv_id = '$id' and bomon = bomon_id ");
   $select1 = mysqli_query($conn, "SELECT *FROM bomon");
?>
    <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Cập Nhật Tài Khoản Giảng Viên</h6>
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
                                <select class="form-select" name="bomon" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected value="<?php $row['bomon'] ?>"><?php echo $row['bomon_name']; ?></option>
                                    
                                    <?php while($row = mysqli_fetch_assoc($select1)){
                                        $bm = $row["bomon_id"];
                                        $nbm = $row["bomon_name"];
                                        echo "<option value=' ".$bm." '> ".$nbm." </option> </br>"; 
                                    }
                                    
                                    ?>

                                </select>
                                <label for="floatingSelect">Bộ Môn</label>
                            </div>
                            <?php } ?>
                                <button type="submit" name="btn_update" class="btn btn-success m-2">Lưu Tài Khoản</button>                          
                        </form>                         
                    </div>         
                </div>
            </div>                                              
        <!-- Table End -->

<?php include '../components/footer.php'; ?>