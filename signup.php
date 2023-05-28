<?php
session_start();
include('includes/config.php');
error_reporting(0);


if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = 1;

    $sql = "INSERT INTO tblstudents(FullName, MobileNumber, EmailId, Password, Status) 
            VALUES(:fname, :mobileno, :email, :password, :status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        $studentId = 'SID' . str_pad($lastInsertId, 3, '0', STR_PAD_LEFT);
        
        // Cập nhật StudentId vào bản ghi mới tạo
        $sql = "UPDATE tblstudents SET StudentId = :studentId WHERE StudentId = ''";
        $query = $dbh->prepare($sql);
        $query->bindParam(':studentId', $studentId, PDO::PARAM_STR);
        $query->execute();
        
        echo "<script>alert('Đăng ký thành công! Mã user của bạn là " . $studentId . "');</script>";
        echo "<br><a href='index.php'>Quay lại trang chủ</a></br>";
        exit;
    } else {
        echo "<script>alert('Đăng ký thất bại, Vui lòng thử lại');</script>";
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
    <title>Hệ thống quản lý thư viện | Đăng ký người dùng</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function validateForm() {
            if (document.signup.password.value !== document.signup.confirmpassword.value) {
                alert("Mật khẩu và mật khẩu xác nhận không trùng khớp!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <!-- MENU SECTION START -->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Đăng ký người dùng</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            ĐĂNG KÝ
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onsubmit="return validateForm();">
                                <div class="form-group">
                                    <label>Nhập tên người dùng</label>
                                    <input class="form-control" type="text" name="fullname" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại:</label>
                                    <input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Nhập địa chỉ Email</label>
                                    <input class="form-control" type="email" name="email" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Nhập mật khẩu</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                                </div>
                                <button type="submit" name="signup" class="btn btn-danger" id="submit">ĐĂNG KÝ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END -->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
