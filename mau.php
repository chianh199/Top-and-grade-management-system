<?php
    @include 'components/config.php';
    $check = mysqli_query($conn, "SELECT trangthai from dangkydetai where sinhvien = 3");
    while($row = mysqli_fetch_assoc($check)){
        $check1 = $row['trangthai'];
        echo $check1;
    }
?>
                               