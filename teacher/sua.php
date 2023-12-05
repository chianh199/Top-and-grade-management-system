<?php
@include '../components/config.php';
$id = $_GET['sua'];
echo $id;
    if(isset($_POST['sua'])){

        $tendt = mysqli_real_escape_string($conn, $_POST['tendt']);
        $mota = $_POST['mota'];
        $solg = $_POST['solg'];
        
        $ldt = $_POST['ldt'];

        $update_data = "UPDATE detai SET dt_ten='$tendt', dt_mota='$mota', dt_soluongsv='$solg', loaidetai='$ldt' WHERE dt_id = '$id'";
        

        $result = mysqli_query($conn, $update_data);

        if($result){                    
            header('location:home.php');
        }
    };
?>

<?php include '../components/teacher_header.php'; 
        $gv_id = $_SESSION['teacher_id'];
?>

<?php
    @include '../components/config.php';  
    $select = mysqli_query($conn, "SELECT * FROM `detai` , `loaidetai` where `dt_id` = '$id' && `loaidetai` = `ldt_id` ; ");
    $select1 = mysqli_query($conn, "SELECT * FROM loaidetai ");
?>  
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 justify-content-md-center">
                    <div class="col-sm-12 col-xl-6 justify-content-center">
                        <div class="bg-light rounded h-100 p-4 ">
                            <h5 class="mb-4">Cập Nhật Lại Đề Tài</h5>
                        <form action="" method="post">
                        <?php while($row = mysqli_fetch_assoc($select)){ ?>
                            <div class="form-floating mb-3">
                                <input type="text" name="tendt" class="form-control"  id="floatingInput" value="<?php echo $row['dt_ten']; ?>"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Tên Đề Tài</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="mota" class="form-control"  id="floatingInput" value="<?php echo $row['dt_mota']; ?>"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Mô Tả</label>
                            </div>                                                                                            
                            
                            <div class="form-floating mb-3">
                            <input type="int" name="solg" class="form-control"  id="floatingInput" value="<?php echo $row['dt_soluongsv']; ?>"
                                    placeholder="name@example.com">
                                <label for="floatingTextarea">Số Lượng SV</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" name="ldt" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected value=" <?php echo $row['ldt_id']; ?> "><?php echo $row['ldt_ten']; ?></option>
                                 
                                    <?php while($row1 = mysqli_fetch_assoc($select1)){
                                            $l = $row1["ldt_id"];
                                            $l1 = $row1["ldt_ten"];
                                            echo "<option value=' ".$l." '> ".$l1." </option> </br>";                                       
                                        
                                    } ?>
                                </select>
                                <label for="floatingSelect">Loại Đề Tài</label>
                            </div>
                            <?php } ?>
                            <div class="form-floating mb-3 justify-content-center">
                                <a href="home.php"><button type="button" class="btn btn-warning justify-content-center"><i class="bi bi-arrow-clockwise"></i>Trở Lại</button></a>
                            

                            <button type="submit" name="sua" class="btn btn-info"><i class="bi bi-journal-check"></i>Lưu Đề Xuất</button>
                            </div>
                        </form>                           
                        </div>
                    </div>
                </div>
            </div>
<?php include '../components/footer.php'; ?>