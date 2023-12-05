<?php  ?>
<?php
    @include '../components/config.php';
    //add
    if(isset($_POST['btn_add'])){
        
        $bomon = mysqli_real_escape_string($conn, $_POST['bomon']);
        $khoa = $_POST['khoa'];

        $select2 = " SELECT * FROM bomon WHERE bomon_name = '$bomon' ";
        $result = mysqli_query($conn, $select2);
        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!';
        }else{
            $insert = "INSERT INTO bomon(bomon_name, khoa_id) VALUES('$bomon','$khoa')";
            mysqli_query($conn, $insert);
            //header('location:home.php');
        }
    }
    //delete
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        mysqli_query($conn, "DELETE FROM bomon WHERE bomon_id = $id");
        header('location:bomon.php');
    }
    include '../components/admin_header.php';
    //select
    $select = mysqli_query($conn, "SELECT * FROM bomon, khoa where khoa_id = id");
    $select1 = mysqli_query($conn, "SELECT *FROM KHOA");
?>

                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-12 rounded h-100 p-4">
                            <h5 class="mb-4">Quản Lý Bộ Môn</h5>                     
                                    <table class="table table-bordered ">
                                    <thead>
                                        <tr class="table-warning" >
                                        <th scope="col">
                                            <center>STT</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tên Bộ Môn</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tên Khoa</center>
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
                                            <center> <?php echo $row['bomon_id']; ?> </center>
                                        </th>
                                        <td> <center> <?php echo $row['bomon_name']; ?> </center> </td>
                                        <td> <center> <?php echo $row['name']; ?> </center> </td>
                                        <td> <center> <a href="bomon.php?xoa=<?php echo $row['bomon_id']; ?>"><button type="button" class="btn btn-primary"><i class="bi bi-trash"></i>Xóa</button></a>
                                                    <a href="bomon_sua.php?sua=<?php echo $row['bomon_id'];  ?>"><button type="button" class="btn btn-primary"><i class="bi bi-vector-pen"></i>Sửa</button></a>
                                            </center> </td>
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
                                                <td colspan="5">
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <input type="text" name="bomon" class="form-control" id="floatingInput"
                                                                placeholder="name@example.com">
                                                            <label for="floatingInput">Tên Bộ Môn</label>                                               
                                                        </div>
                                                    </center>
                                                    
                                                </td>
                                                <td colspan="3">
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <select class="form-select" name="khoa" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <?php while($row = mysqli_fetch_assoc($select1)){ 
                                                                    $bm = $row["id"];
                                                                    $nbm = $row["name"];
                                                                    echo "<option selected value=' ".$bm." '> ".$nbm." </option> </br>";                                       
                                                                
                                                                } ?>
                                                            </select>
                                                            <label for="floatingSelect">Khoa</label>
                                                        </div>   
                                                    </center>
                                                                                                        
                                                </td>
                                                <td colspan="4">                                                   
                                                    <center><button type="submit" name="btn_add" class="btn btn-success m-2">Thêm Đề Tài</button></center>                                                   
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

