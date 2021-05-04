<!DOCTYPE html>
<?php 
    
    $_SESSION['TAIKHOAN']='bichngan';
    $MASP=$_GET['tenbien'];
    require_once('../includes/include.php');
    require_once('../includes/conn.php');
    require_once('../includes/product.php');
    require_once('./tsx_SP_gio.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CT250</title>


    <!-- BS4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- FONT GOOGLE -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="row header-banner">
                <img src="./image/banner_TOP.png" alt="">
            </div>
            <div class="row header-navbar">
                <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
                    <div class="container nav-left-right">
                        <div class="left-nav d-flex">
                            <a class="navbar-brand" href="./index.html">
                                <img src="./image/logo-fix.png" alt="">
                            </a>
                            <form class="">
                                <div class="input-group navbar-search">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">Button</button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="basic-addon1">
                                </div>
                            </form>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse header-navbar--content" id="navbarSupportedContent">
                            <div class="navbar-select">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#laptop">Laptop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales">Sales</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#bestseller">Bestseller</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./cart.html">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./login.html">Login</a>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- url link -->
    <section class="url">
        <div class="container">
            <div class="row">
                <a href="./index.html">Trang chủ</a>
                >
                <a href="#">laptop</a>
            </div>
        </div>
    </section>
    <!-- about item -->
    <?php 
        $sql = "SELECT * FROM sanpham where MASP='$MASP'";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $masp = $row['MASP'];
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = View_Discount_Of_Product($masp);
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
                $motasp = $row['MOTASP'];
                $ngaysx = $row['NGAYSX'];
                $giam=$gia*(100-$phantram)/100;
            }
        }
    ?>
    <section class="about_item">
        <div class="container">
            <div class="row about_item-title">
            <?php echo" <h2>".$tensp."</h2>"?>
            </div>
            <div class="row about_item-intro">
                <div class="col-md-4">
                    <img src="./image/laptop.jpg" alt="">
                </div>
                <div class="col-md-4">
                    Giá<?php echo currency_format($gia,' đ');
                    if($phantram!=0){
                        echo "
                        <p class='card-text'>".currency_format($giam,'đ')." ".currency_format($gia,'đ')." -".$phantram."%</p>";
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <form action="">
                        <?php echo"<a href='them.php?mas=".$MASP."'>Thêm vào giỏ hàng</a>
                        <a href='them.php?mas=$MASP'>Mua hàng</a>"?>
                    </form>
                </div>
            </div>
            <div class="row about_item-info">
                <div class="col-md-8">
                    <p><?php echo $motasp?></p>
                </div>
                <div class="col-md-4">
                    <h2>Thông số kỹ thuật</h2>
                    <ul>
                        <hr>
                        <li></li>
                        <hr>
                        <li></li>
                        <hr>
                        <li></li>
                        <hr>
                        <li></li>
                        <hr>
                        <li></li>
                        <hr>
                        <li></li>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLong">
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit, voluptas
                                        harum laboriosam totam maxime doloremque sunt, distinctio porro hic nihil culpa
                                        quia quam eum nulla nostrum fugit, rerum et assumenda consequuntur dolores a
                                        labore tenetur illum in? Vel a sit fugiat culpa ducimus reiciendis maiores
                                        repellendus? Corporis optio vel error explicabo repellat cumque nemo placeat
                                        accusamus numquam possimus maxime consequatur provident minus itaque quis,
                                        doloribus eius sequi hic laudantium accusantium nobis illum? Vero, dolorum
                                        fugiat sequi dolorem velit veritatis sit maxime et quos soluta tenetur modi eum
                                        optio. Iure nihil modi sapiente provident ipsa accusamus nesciunt perspiciatis
                                        dicta incidunt deserunt odio architecto tenetur nostrum pariatur nobis atque
                                        recusandae eius voluptas sunt, repellendus eum inventore vero. Similique saepe
                                        odio minus sunt corporis molestiae nostrum adipisci omnis illum fugiat, sed
                                        officia asperiores vitae cum, sit est tenetur veniam beatae amet unde voluptate
                                        enim commodi. Itaque, beatae ipsam. Exercitationem, neque vel error magnam harum
                                        cum id mollitia voluptatum deserunt officia quidem, cupiditate voluptate
                                        adipisci laborum ullam doloremque, itaque quaerat nobis eligendi nihil. Placeat
                                        enim magnam repudiandae voluptates libero distinctio reprehenderit, laboriosam
                                        iste veniam est doloribus ullam saepe in veritatis? Quaerat dolores perferendis
                                        rem. Consequatur qui quasi rerum? Doloribus facilis exercitationem quisquam in
                                        modi a reprehenderit, eum explicabo voluptatibus incidunt, officia iusto?
                                        Eveniet obcaecati ullam sed voluptates quam architecto fuga deleniti fugiat!
                                        Eius reiciendis voluptatem nulla aliquam officia. Est dolorem vero nesciunt
                                        dolorum, explicabo provident, veritatis repellat nulla eum similique earum
                                        veniam eligendi enim aliquid quisquam. Nesciunt voluptas illo accusantium
                                        dolores sunt eum hic labore! Deleniti distinctio porro ullam perspiciatis
                                        sapiente obcaecati iure, amet cumque dolorum, quas veritatis aliquam culpa
                                        quaerat ipsam ratione qui doloribus ducimus a, ipsa repellendus itaque
                                        reiciendis. Porro excepturi laborum delectus, velit laboriosam temporibus vitae
                                        beatae rerum quasi, aperiam quis voluptatem at aliquid est reprehenderit
                                        assumenda, quas explicabo eos sapiente!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="item">
        <div class="container">
            <div class="row item-title">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="row item-content">
                <div class="row">
                    <div class="card-group col-md-3 col-sm-6">
                        <div class="card">
                            <a href="./view.html">
                                <div class="card-header">
                                    <img src="./image/laptop.jpg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                    <button type="submit">Mua ngay</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-group col-md-3 col-sm-6">
                        <div class="card">
                            <a href="./view.html">
                                <div class="card-header">
                                    <img src="./image/laptop.jpg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                    <button type="submit">Mua ngay</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-group col-md-3 col-sm-6">
                        <div class="card">
                            <a href="./view.html">
                                <div class="card-header">
                                    <img src="./image/laptop.jpg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                    <button type="submit">Mua ngay</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-group col-md-3 col-sm-6">
                        <div class="card">
                            <a href="./view.html">
                                <div class="card-header">
                                    <img src="./image/laptop.jpg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                    <button type="submit">Mua ngay</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-group col-md-3 col-sm-6">
                        <div class="card">
                            <a href="./view.html">
                                <div class="card-header">
                                    <img src="./image/laptop.jpg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                    <button type="submit">Mua ngay</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="bottom">
            <p>copyright</p>
        </div>
    </footer>
    <!-- script -->
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

    <!-- popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <!-- BS4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- OWL JS     -->
    <script src="./js/owl.carousel.min.js"></script>
    <script>
        $('.courses__carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
    <!-- MAIN JS -->
    <script src="./js/main.js"></script>
</body>