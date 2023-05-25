<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "DELETE FROM tblcategory WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Category deleted successfully";
        header('location:manage-categories.php');
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
    <title>HỆ THỐNG QUẢN LÝ THƯ VIỆN | Quản lý Danh mục</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Quản lý Danh mục sách</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php if ($_SESSION['error'] != "") { ?>
                            <div class="alert alert-danger">
                                <strong>Error:</strong> <?php echo htmlentities($_SESSION['error']); ?>
                                <?php echo htmlentities($_SESSION['error'] = ""); ?>
                            </div>
                        <?php } ?>
                        <?php if ($_SESSION['msg'] != "") { ?>
                            <div class="alert alert-success">
                                <strong>Success:</strong> <?php echo htmlentities($_SESSION['msg']); ?>
                                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                            </div>
                        <?php } ?>
                        <?php if ($_SESSION['updatemsg'] != "") { ?>
                            <div class="alert alert-success">
                                <strong>Success:</strong> <?php echo htmlentities($_SESSION['updatemsg']); ?>
                                <?php echo htmlentities($_SESSION['updatemsg'] = ""); ?>
                            </div>
                        <?php } ?>
                        <?php if ($_SESSION['delmsg'] != "") { ?>
                            <div class="alert alert-success">
                                <strong>Success:</strong> <?php echo htmlentities($_SESSION['delmsg']); ?>
                                <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Quản lý danh mục
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên danh mục</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày thêm</th>
                                            <th>Ngày sửa</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tblcategory";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                        ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                    <td class="center"><?php echo htmlentities($result->CategoryName); ?></td>
                                                    <td class="center">
                                                        <?php if ($result->Status == 1) { ?>
                                                            <a href="#" class="btn btn-success btn-xs">Hoạt động</a>
                                                        <?php } else { ?>
                                                            <a href="#" class="btn btn-danger btn-xs">Ngưng hoạt động</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="center"><?php echo htmlentities($result->CreationDate); ?></td>
                                                    <td class="center"><?php echo htmlentities($result->UpdationDate); ?></td>
                                                    <td class="center">
                                                        <a href="edit-category.php?catid=<?php echo htmlentities($result->id); ?>">
                                                            <button class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</button>
                                                        </a>
                                                        <a href="manage-categories.php?del=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Xác nhận xóa sách?');">
                                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Xoá</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $cnt = $cnt + 1;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
