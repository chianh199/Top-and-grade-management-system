<?php
@include '../components/config.php';
    if(isset($_POST['btn_add'])){

        $ten = mysqli_real_escape_string($conn, $_POST['ten']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = ($_POST['pass']);
        $bomon = $_POST['bomon'];
        $loaitaikhoan = $_POST['loaitaikhoan'];

        $select = " SELECT * FROM giangvien WHERE email = '$email' && pass = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $error[] = 'user already exist!';

        }else{

            $insert = "INSERT INTO giangvien(ten, email, pass, bomon, loaitaikhoan) VALUES('$ten','$email','$pass','$bomon', '$loaitaikhoan')";
            mysqli_query($conn, $insert);
            header('location:home.php');
        }
    };
?>
<?php include '../components/admin_header.php'; ?>
<?php
   $select = mysqli_query($conn, "SELECT * FROM bomon ");   
?>
    <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Thêm Tài Khoản Giảng Viên</h6>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="ten" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Tên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="pass" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="loaitaikhoan" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Loại Tài Khoản</label>
                            </div>
                            <div class="form-floating mb-3">
                                
                                <select class="form-select" name="bomon" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    
                                        <?php while($row = mysqli_fetch_assoc($select)){ 
                                            $bm = $row["bomon_id"];
                                            $nbm = $row["bomon_name"];
                                            echo "<option selected value=' ".$bm." '> ".$nbm." </option> </br>";                                       
                                        
                                        } ?>    
                                    
                                                                   
                                </select>
                                <label for="floatingSelect">Bộ Môn</label>
                            </div>
                            
                                <button type="submit" name="btn_add" class="btn btn-success m-2">Thêm Tài Khoản</button>                          
                        </form>                         
                    </div>         
                </div>
            </div>                                              
        <!-- Table End -->

<?php include '../components/footer.php'; ?>