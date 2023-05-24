<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >
                <img src="assets/img/logo.png" />
            </a>
        </div>

        <?php if($_SESSION['login']) { ?> 
            <div class="right-div">
<<<<<<< HEAD
                <a href="logout.php" class="btn btn-danger pull-right">Đăng xuất</a>
=======
                <a href="logout.php" class="btn btn-danger pull-right">ĐĂNG XUẤT</a>
>>>>>>> a160ee96249dd6c0d6e567ffe25d6c5623be270d
            </div>
        <?php } ?>
    </div>
</div>
<!-- ĐẦU HEADER LOGO KẾT THÚC-->

<?php if($_SESSION['login']) { ?>    
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
<<<<<<< HEAD
                            <li><a href="dashboard.php" class="menu-top-active">Trang chủ</a></li>
                           
                          
   <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Quản lý tài khoản <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">Thông tin cá nhân</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Đổi mật khẩu</a></li>
                                </ul>
                            </li>
                            <li><a href="issued-books.php">Sách đã mượn</a></li>
                          

=======
                            <li><a href="dashboard.php" class="menu-top-active">BẢNG ĐIỀU KHIỂN</a></li>
                           
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Tài khoản <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">Hồ sơ của tôi</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Thay đổi mật khẩu</a></li>
                                </ul>
                            </li>
                            <li><a href="issued-books.php">Sách đã mượn</a></li>
>>>>>>> a160ee96249dd6c0d6e567ffe25d6c5623be270d
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
<<<<<<< HEAD
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
                            <li><a href="adminlogin.php">Admin</a></li>
                            <li><a href="signup.php">Đăng ký</a></li>
                            <li><a href="index.php">Đăng nhập</a></li>
=======
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="adminlogin.php">Đăng nhập quản trị</a></li>
                            <li><a href="signup.php">Đăng ký người dùng</a></li>
                            <li><a href="index.php">Đăng nhập người dùng</a></li>
                            <li><a href="index.php">Đăng nhập Nhân Viên</a></li>
>>>>>>> a160ee96249dd6c0d6e567ffe25d6c5623be270d

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
