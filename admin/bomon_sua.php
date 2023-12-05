<?php
@include '../components/config.php';
$id = $_GET['sua'];
    if(isset($_POST['bomon'])){

        $tenbm = mysqli_real_escape_string($conn, $_POST['tenbm']);
         
        $khoa = $_POST['khoa'];
        $update_data = "UPDATE bomon SET bomon_name='$tenbm', khoa_id = '$khoa' WHERE bomon_id = '$id'";
        

        $result = mysqli_query($conn, $update_data);

        if($result){                    
            header('location:bomon.php');
        }
    };
?>
<?php include '../components/admin_header.php'; ?>
<?php 
    $select = mysqli_query($conn, "SELECT *from bomon, khoa where bomon_id = '$id' and khoa_id = id ");
    $select1 = mysqli_query($conn, "SELECT *from khoa");
?>

<!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 justify-content-md-center">
                    <div class="col-sm-12 col-xl-6 justify-content-center">
                        <div class="bg-light rounded h-100 p-4 ">
                            <h5 class="mb-4">Form Sửa Bộ Môn</h5>
                        <form action="" method="post">
                            <?php while($row = mysqli_fetch_assoc($select)){ ?>
                            <div class="form-floating mb-3">
                                <input type="text" name="tenbm" class="form-control"  id="floatingInput"
                                    placeholder="name@example.com" value="<?php echo $row['bomon_name'] ?>">
                                <label for="floatingInput">Tên Bộ Môn</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                            <select class="form-select" name="khoa" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected value=" <?php echo $row['khoa_id']; ?> "><?php echo $row['name']; ?></option>
                            <?php while($row = mysqli_fetch_assoc($select1)){ 
                                $bm = $row["id"];
                                $nbm = $row["name"];
                                echo "<option value=' ".$bm." '> ".$nbm." </option> </br>";                                       
                                                                
                                } ?>
                            </select>
                            </div>

                            <div class="form-floating mb-3 justify-content-center">
                                <a href="bomon.php"><button type="button" class="btn btn-warning justify-content-center"><i class="bi bi-arrow-clockwise"></i>Trở Lại</button></a>
                            

                            <button type="submit" name="bomon" class="btn btn-info"><i class="bi bi-journal-check"></i>Lưu Bộ Môn</button>
                            </div>
                            <?php } ?>
                        </form>                           
                        </div>
                    </div>
                </div>
            </div>

<?php include '../components/footer.php'; ?>