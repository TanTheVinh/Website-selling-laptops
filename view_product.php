<!DOCTYPE html>


<?php
echo  $_SESSION['taikhoan'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
<<<<<<< HEAD
// <<<<<<< HEAD
//     if (isset($_SESSION['taikhoan'])) {
//         $MASP = $_GET['masp'];
//         include('./cart/tsx_SP_gio.php');
//         themSP_gio($MASP);
//         header('Location: view.php?tenbien=' . $MASP);
//     } else header('Location: login.php');
// =======
=======
>>>>>>> e394964c80a33e0789b0dfcfe46e26409cc48d73
    if(isset( $_SESSION['taikhoan'])){
         $MASP=$_GET['masp'];
        include('./cart/tsx_SP_gio.php');
        themSP_gio($MASP);
        header('Location: view_product.php?masp='.$MASP);
    }else header('Location: login.php');
<<<<<<< HEAD
   
// >>>>>>> 6e578c4a264b56f067c8ffad4180455069c3fb12
=======

>>>>>>> e394964c80a33e0789b0dfcfe46e26409cc48d73
}

?>
<?php
$MASP = $_GET['masp'];
require_once('./includes/include.php');
require_once('./includes/conn.php');
require_once('./includes/product.php');
// require_once('.cart/tsx_SP_gio.php');

$sql = "SELECT * FROM sanpham where MASP='$MASP'";
$res = Check_db($sql);
$row = mysqli_fetch_assoc($res);
$mansx = $row['MANSX'];
$masp = $row['MASP'];
$tensp = $row['TENSP'];
$gia = $row['GIA'];
$phantram = View_Discount_Of_Product($masp);
$kichthuocmh = $row['KICHTHUOCMH'];
$vixuly = $row['VIXULY'];
$ram = $row['RAM'];
$motasp = $row['MOTASP'];
$ngaysx = $row['NGAYSX'];
if ($gia - $gia * $phantram / 100 != $gia) {
    $giamoi = $gia - $gia * $phantram / 100;
} else {
    $giamoi = "";
}
?>
<html lang="en">

<?php include('./includes/head.php') ?>


<body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
    <!-- url link -->
    <section class="url">
        <div class="container">
            <div class="row">
                <a href="./index.html">Trang chủ ></a>

                <a href="#" name="TenNSX">&nbsp;<?php echo $mansx ?>></a>

                <a href="#" name="TenLoaiSP">&nbsp;<?php echo $tensp ?></a>
            </div>
        </div>
    </section>
    <!-- about item -->
    <section class="about_item">
        <div class="container">
            <div class="row about_item-title">
                <?php echo " <h2>" . $tensp . "</h2>" ?>
            </div>
            <div class="row about_item-intro">
                <div class="col-md-4">
                    <section class="carousel">
                        <div class="container">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="./FE/image/Slide-Galaxy-Buds-Live-2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./FE/image/Slide-Mi-11-5G-1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./FE/image/Slide-oppo-reno5.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                    </section>
                </div>
                <div class="col-md-4">
                    Giá <?php
                        if ($phantram != 0) {
                            echo "
                        <p class='card-text'>" . $gia . " " . $giamoi . " -" . $phantram . "%</p>";
                        }
                        ?>
                </div>
                <div class="col-md-4">
                    <form action="" method="POST">
                        <button style="padding: 0;"><a style="display: block; padding: 10px;">Thêm vào giỏ hàng</a></button>
                    </form>
                </div>
            </div>
            <div class="row about_item-info">
                <div class="col-md-8">
                    <p><?php echo $motasp ?></p>
                </div>
                <div class="col-md-4">
                    <h2>Thông số kỹ thuật</h2>
                    <ul>
                        <hr>
                        <li>RAM: <?php echo $ram ?> GB</li>
                        <hr>
                        <li>Vi xử lý: <?php echo $vixuly ?></li>
                        <hr>
                        <li>Kích thước màn hình: <?php echo $kichthuocmh ?></li>
                        <hr>
                        <li>Ngày sản xuất: <?php echo $ngaysx ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php include('./includes/item.php') ?>

    <!-- footer -->
    <?php include('./includes/footer.php') ?>
    <!-- script -->

    <?php include('./includes/script.php') ?>
</body>