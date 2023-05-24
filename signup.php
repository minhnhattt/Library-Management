<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
    //Code cho mã sinh viên
    $count_my_page = ("studentid.txt");
    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp); 
    $StudentId = $hits[0];   
    $hoTen = $_POST['hoTen'];
    $soDienThoai = $_POST['soDienThoai'];
    $email = $_POST['email']; 
    $matKhau = md5($_POST['matKhau']); 
    $trangThai = 1;
    $sql = "INSERT INTO tblstudents(StudentId, HoTen, SoDienThoai, EmailId, MatKhau, TrangThai) VALUES(:StudentId, :hoTen, :soDienThoai, :email, :matKhau, :trangThai)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':StudentId', $StudentId, PDO::PARAM_STR);
    $query->bindParam(':hoTen', $hoTen, PDO::PARAM_STR);
    $query->bindParam(':soDienThoai', $soDienThoai, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':matKhau', $matKhau, PDO::PARAM_STR);
    $query->bindParam(':trangThai', $trangThai, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo '<script>alert("Đăng ký thành công. Mã sinh viên của bạn là '.$StudentId.'")</script>';
    }
    else 
    {
        echo "<script>alert('Đã xảy ra lỗi. Vui lòng thử lại');</script>";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Hệ thống Quản lý Thư viện Trực tuyến | Đăng ký Sinh viên</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function valid() {
            if(document.signup.matKhau.value != document.signup.xacNhanMatKhau.value) {
                alert("Mật khẩu và Xác nhận mật khẩu không khớp!");
                document.signup.xacNhanMatKhau.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
<<<<<<< HEAD
                    <h4 class="header-line">Đăng ký tài khoản người dùng</h4>
=======
                    <h4 class="header-line">Đăng ký Người dùng</h4>
>>>>>>> a160ee96249dd6c0d6e567ffe25d6c5623be270d
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
<<<<<<< HEAD
                             ĐĂNG KÝ
=======
<<<<<<< HEAD
                            Thông tin đăng ký
=======
                            FORM ĐĂNG KÝ
>>>>>>> a160ee96249dd6c0d6e567ffe25d6c5623be270d
>>>>>>> 93b77902936635608fdf8b287bc050cb32d1113c
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
                                <div class="form-group">
<<<<<<< HEAD
                                    <label>Họ và tên</label>
                                    <input class="form-control" type="text" name="fullanme" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
                                </div>       
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
=======
                                    <label>Nhập Họ và Tên</label>
                                    <input class="form-control" type="text" name="hoTen" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Số Điện Thoại:</label>
                                    <input class="form-control" type="text" name="soDienThoai" maxlength="10" autocomplete="off" required />
                                </div>       
                                <div class="form-group">
                                    <label>Nhập Email</label>
                                    <input class="form-control" type="email" name="email" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Nhập Mật khẩu</label>
                                    <input class="form-control" type="password" name="matKhau" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận Mật khẩu</label>
                                    <input class="form-control" type="password" name="xacNhanMatKhau" autocomplete="off" required />
>>>>>>> a160ee96249dd6c0d6e567ffe25d6c5623be270d
                                </div>                               
                                <button type="submit" name="signup" class="btn btn-danger" id="submit">Đăng ký ngay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
