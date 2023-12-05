<?php
@include '../components/config.php';

    // Chấm điểm đề tài đã được xét duyệt
    if(isset($_POST['sua'])){
        
        $diem = $_POST['solg'];

        if(isset($_GET['sua'])){
            $id = $_GET['sua'];
            $update_data = "UPDATE dangkydetai SET diem = '$diem' WHERE sinhvien = '$id'";
            $result = mysqli_query($conn, $update_data);
            if($result){                    
                header('location:diem.php');
            }
        }
        if(isset($_GET['suadx'])){
            $id1 = $_GET['suadx'];
            
            $update_data = "UPDATE dexuat SET dx_diem = '$diem' WHERE dx_id = '$id1'";
            
    
            $result = mysqli_query($conn, $update_data);
    
            if($result){                    
                header('location:diem.php');
            }
        };
        
    };
    
?>

<?php include '../components/teacher_header.php'; 
        $gv_id = $_SESSION['teacher_id'];
?>
 
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 justify-content-md-center">
                    <div class="col-sm-12 col-xl-6 justify-content-center">
                        <div class="bg-light rounded h-100 p-4 ">
                            <h5 class="mb-4">Nhập Điểm</h5>
                        <form action="" method="post">
                        
                            
                            
                            <div class="form-floating mb-3">
                            <input type="int" name="solg" class="form-control"  id="floatingInput" 
                                    placeholder="name@example.com">
                                <label for="floatingTextarea">Điểm</label>
                            </div>

                            
                            
                            <div class="form-floating mb-3 justify-content-center">
                                <a href="diem.php"><button type="button" class="btn btn-warning justify-content-center"><i class="bi bi-arrow-clockwise"></i>Trở Lại</button></a>
                            

                            <button type="submit" name="sua" class="btn btn-info"><i class="bi bi-journal-check"></i>Lưu Điểm</button>
                            </div>
                        </form>                           
                        </div>
                    </div>
                </div>
            </div>
<?php include '../components/footer.php'; ?>