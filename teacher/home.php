<?php include '../components/teacher_header.php'; 
        $gv_id = $_SESSION['teacher_id'];
?>
<?php
    @include '../components/config.php';
    if(isset($_POST['btn_add'])){
        
        $tendetai = mysqli_real_escape_string($conn, $_POST['tendetai']);
        $loaidetai = $_POST['loaidetai'];
        $solg = $_POST['solg'];
        $mota = $_POST['mota'];
        $select = " SELECT * FROM giangvien g, detai d WHERE g.gv_id = d.giangvien && g.gv_id = '$gv_id' && d.dt_ten = '$tendetai' ";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!';
        }else{
            $insert = "INSERT INTO detai(dt_ten, dt_mota, giangvien, loaidetai, dt_soluongsv) VALUES('$tendetai', '$mota', '$gv_id','$loaidetai', '$solg')";
            mysqli_query($conn, $insert);
            //header('location:home.php');
        }
    }
    if(isset($_GET['deletedt'])){
        $id = $_GET['deletedt'];
        mysqli_query($conn, "DELETE FROM detai WHERE dt_id = $id");
        
     };
 ?>
<?php
    @include '../components/config.php';  
    $select = mysqli_query($conn, "SELECT * FROM `giangvien` , `detai` , `loaidetai` where `giangvien` = '$gv_id' && `loaidetai` = `ldt_id` && `giangvien` = `gv_id`; ");
    $select1 = mysqli_query($conn, "SELECT * FROM loaidetai ");
?>          
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Form Start -->
                        <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Form Thêm Đề Tài</h6>

                                <!-- Form thêm đề tài -->

                            <form action="" method = "post">
                                <div class="table-responsive">
                                    <table class="table">                                       
                                        <tbody>                                            
                                            <tr>
                                                <th scope="row">
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <input type="text" name="tendetai" class="form-control" id="floatingInput"
                                                                placeholder="name@example.com">
                                                            <label for="floatingInput">Tên Đề Tài</label>                                               
                                                        </div>
                                                    </center>
                                                    
                                                </th>
                                                <td scope="row">
                                                    <center>
                                                        <div class="form-floating mb-4">
                                                            <input type="int" name="solg" class="form-control" id="floatingInput"
                                                                placeholder="name@example.com">
                                                            <label for="floatingInput">Số Lượng SV</label>                                               
                                                        </div>
                                                    </center>
                                                    
                                                </td>
                                                <td>
                                                    <center>
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" name="loaidetai" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <?php while($row = mysqli_fetch_assoc($select1)){ 
                                                                    $bm = $row["ldt_id"];
                                                                    $nbm = $row["ldt_ten"];
                                                                    echo "<option selected value=' ".$bm." '> ".$nbm." </option> </br>";                                       
                                                                
                                                                } ?>
                                                            </select>
                                                            <label for="floatingSelect">Loại Đề Tài</label>
                                                        </div>   
                                                    </center>
                                                </td>
                                            </tr>                                                         
                                                
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="mota" placeholder="Leave a comment here"
                                                                id="floatingTextarea" style="height: 60px;"></textarea>
                                                            <label for="floatingTextarea">Mô Tả</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    
                                                    <center><button type="submit" name="btn_add" class="btn btn-success m-2">Thêm Đề Tài</button></center>                                                   
                                                    </td>     
                                                </tr>
                                                                                                                            
                                                                                                                                                                  
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                                
                            </div>
                        </div>
                    <!-- Form End -->   
                    
                <!-- Table Start -->
            
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Danh Sách Đề Tài</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col"> <center>Tên Đề Tài</center> </th>
                                            <th scope="col" > <center>Mô Tả</center> </th>
                                            <th scope="col"> <center>SLSV</center> </th>
                                            <th scope="col"> <center>SL Còn Lại</center> </th>
                                            <th scope="col"> <center>Loại Đề Tài</center> </th>
                                            <th scope="col"> <center>Tác Vụ</center>  </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($select)){ ?>
                                        <tr>
                                                    <?php $id_dt = $row['dt_id'];
                                                        @include '../components/config.php';
                                                        $select2 = mysqli_query($conn, "SELECT detai from dangkydetai where detai = '$id_dt'");
                                                        $row1 = mysqli_num_rows($select2);
                                                    ?>
                                            <td style="width: 5%;"> <center><?php echo $row['dt_id']; ?></center>  </td>
                                            <td style="width: 20%;"> <center><?php echo $row['dt_ten']; ?></center>  </td>
                                            <td style="width: 20%;"> <center><?php echo $row['dt_mota']; ?></center>  </td>
                                            <td style="width: 10%;"> <center><?php echo $row['dt_soluongsv']; ?></center>  </td>

                                            <td style="width: 10%;"> <center> <?php echo ($row['dt_soluongsv'] - $row1) ; ?> </center> </td>

                                            <td style="width: 20%;"> <center><?php echo $row['ldt_ten']; ?></center>  </td>   
                                            
                                                <td style="width: 20%;">
                                                    <center>
                                                        <a href="home.php?deletedt=<?php echo $row['dt_id']; ?>" ><button type="button" class="btn btn-danger">Xóa</button></a>
                                                        <a href="sua.php?sua=<?php echo $row['dt_id']; ?>" ><button type="button" class="btn btn-danger">Sửa</button></a>
                                                    </center>
                                                    
                                                </td>  
                                                                                
                                        </tr>
                                        <?php } ?>                                                                                
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
<?php include '../components/footer.php'; ?>