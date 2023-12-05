<?php

@include 'components/config.php';

session_start();

if(isset($_POST['btn_login'])){  
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['pass']);
   $loaitaikhoan = $_POST['loaitaikhoan'];
    if($loaitaikhoan == "admin"){
        if($email == "admin@gmail.com" && $pass == "123"){
            $_SESSION['admin_name'] = "Admin";
            header('location:admin/home.php');
        }       
    }
    else if($loaitaikhoan == "teacher"){
        $select = " SELECT * FROM giangvien WHERE email = '$email' && pass = '$pass' ";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['teacher_name'] = $row['ten'];
            $_SESSION['teacher_id'] = $row['gv_id'];
            header('location:teacher/home.php');
        }
    }
    else{
        $select = " SELECT * FROM sinhvien WHERE email = '$email' && pass = '$pass' ";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['student_name'] = $row['ten'];
            $_SESSION['student_id'] = $row['sv_id'];
            header('location:student/home.php');
        }
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./public/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>Sign In</h3>
                        <form action="" method="post" id="form_login">
                            </div>
                                <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <select class="form-select" name="loaitaikhoan" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected value="student">student</option>
                                    <option value="teacher">teacher</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <button type="submit" name="btn_login" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>                       
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./public/lib/chart/chart.min.js"></script>
    <script src="./public/lib/easing/easing.min.js"></script>
    <script src="./public/lib/waypoints/waypoints.min.js"></script>
    <script src="./public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./public/lib/tempusdominus/js/moment.min.js"></script>
    <script src="./public/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="./public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="./public/js/main.js"></script>
</body>

</html>