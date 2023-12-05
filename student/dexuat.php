
<?php
    @include '../components/config.php';
    if(isset($_POST['dexuat'])){
    $sv_id = $_POST['sv_id'];
    $tendx = $_POST['tendx'];
    $motadx = $_POST['motadx'];
    $select = mysqli_query($conn, "SELECT nhomnienluan from sinhvien where sv_id = '$sv_id'");
    $row = mysqli_fetch_assoc($select);
    $nnl = $row['nhomnienluan'];
    
    $insert = "INSERT INTO dexuat(dx_ten, dx_sv, dx_nnl, dx_mota, dx_tt, dx_diem) VALUES('$tendx','$sv_id','$nnl', '$motadx', 'Chưa Được Duyệt',0)";
    mysqli_query($conn, $insert);
    header('location:home.php');
    }
?>
<?php include '../components/student_header.php'; 
    $sv_id = $_SESSION['student_id'];
?>
             <!-- Form Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="row g-4 justify-content-md-center">
                    <div class="col-sm-12 col-xl-6 justify-content-center">
                        <div class="bg-light rounded h-100 p-4 ">
                            <h5 class="mb-4">Form Đề Xuất</h5>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="tendx" class="form-control"  id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Tên Đề Tài Đề Xuất</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                            <input type="text" name="motadx" class="form-control"  id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingTextarea">Mô tả</label>
                            </div>

                            <div class="form-floating mb-3 justify-content-center">
                                <a href="home.php"><button type="button" class="btn btn-warning justify-content-center"><i class="bi bi-arrow-clockwise"></i>Trở Lại</button></a>
                            
                            <input type="hidden" name="sv_id" value="<?php echo $sv_id; ?>">
                            <button type="submit" name="dexuat" class="btn btn-info"><i class="bi bi-journal-check"></i>Lưu Đề Xuất</button>
                            </div>
                        </form>                           
                        </div>
                    </div>
                </div>
            </div>
<?php include '../components/footer.php'; ?>