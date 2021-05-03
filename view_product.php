<!DOCTYPE html>
<?php 
    $_SESSION['TAIKHOAN']='bichngan';
    $MASP=$_GET['masp'];
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
    if($gia - $gia*$phantram/100 != $gia){
        $giamoi = $gia - $gia*$phantram/100;
    }
    else {
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
            <?php echo" <h2>".$tensp."</h2>"?>
            </div>
            <div class="row about_item-intro">
                <div class="col-md-4">
                <section class="carousel">
                    <!-- them mui ten -->
        <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="./FE/image/Slide-Galaxy-Buds-Live-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./FE/image/Slide-Mi-11-5G-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./FE/image/Slide-Galaxy-Buds-Live-2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
    </section>
                </div>
                <div class="col-md-4">
                    Giá <?php
                    if($phantram!=0){
                        echo "
                        <p class='card-text'>".$gia." ".$giamoi." -".$phantram."%</p>";
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <form action="">
                        <?php echo"<a href='cart.php?masp=".$MASP."'>Thêm vào giỏ hàng</a>
                        <a href='cart.php?masp=$MASP'>Mua hàng</a>"?>
                        <button style="padding: 0;"><a href="http://localhost/weblaptop/cart/view.php?tenbien=SP02" style="display: block; padding: 10px;">Thêm vào giỏ hàng</a></button>
                        <button>Mua hàng</button>
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
                        <li><?php echo $ram ?> GB</li>
                        <hr>
                        <li><?php echo $vixuly ?></li>
                        <hr>
                        <li><?php echo $kichthuocmh ?></li>
                        <hr>
                        <li>nsx <?php echo $ngaysx ?></li>
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