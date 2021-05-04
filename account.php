<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    $taikhoan = $_SESSION['taikhoan'];
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $TENND = ($_POST["tennd"]);
          $GIOITINH=($_POST['gioiTinh']);
          $EMAIL=$_POST['email'];
          $SDT=$_POST['sdt'];
          $DIACHI=$_POST['diaChi'];
         // echo $GIOITINH."".$EMAIL."".$SDT;
          $conn = Connect();
          $sql1="UPDATE nguoidung SET TENND='$TENND',GIOITINH='$GIOITINH', EMAIL='$EMAIL',SDT='$SDT',DIACHI='$DIACHI' WHERE TAIKHOAN='$taikhoan'";
          if($conn->query($sql1)){
          }else{
            echo "error: ".$sql1."<br>".$conn->error;
          }
          $conn->close();
        }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CT250</title>

    <!-- BS4 CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <!-- FONT AWESOME  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />

    <!-- FONT GOOGLE -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="./css/main.css" />
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
                      <div class="left-nav">
                          <a class="navbar-brand" href="./index.html">
                              <img src="./image/logo-fix.png" alt="">
                          </a>
                          <form class="">
                              <div class="input-group navbar-search">
                                  <div class="input-group-prepend">
                                      <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                                  </div>
                                  <input type="text" class="form-control" placeholder="" aria-label=""
                                      aria-describedby="basic-addon1" style="border-radius: 0 5px 5px 0;">
                              </div>
                          </form>
                      </div>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse header-navbar--content col-md-6 col-sm-9" id="navbarSupportedContent">
                          <div class="navbar-select">
                                  <ul class="navbar-nav">
                                      <li class="nav-item">
                                          <a class="nav-link active" aria-current="page" href="./index.html#laptop">Laptop</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./index.html#sales">Sales</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./index.html#bestseller">Bestseller</a>
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
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  </header>
    <!-- account info -->
    <section id="account">
      <div class="container">
        <h4>Tài khoản</h4>
        <div class="row">
          <div id="account__left">
            <ul id="setting__menu">
              <li class="active" id="TTTK" onclick="activeTTTK()">
                <a href="#">Thông tin tài khoản</a>
              </li>
              <li id="TTDH" onclick="activeTTDH()">
                <a href="#">Trạng thái đơn hàng</a>
              </li>
              <li id="LSMH" onclick="activeLSMH()">
                <a href="#">Lịch sử mua hàng</a>
              </li>
              <li id="DMK" onclick="activeDMK()">
                <a href="#">Đổi mật khẩu</a>
              </li>
              <li id="DX"><a href="#">Đăng xuất</a></li>
            </ul>
          </div>
          <div id="account__right">
            <div id="myAccount">
              <div id="thongTinTaiKhoan">
              <?php 
                        $sql_account = "SELECT * FROM nguoidung where taikhoan = '$taikhoan'";
                        $res_account = Check_db($sql_account);
                        $temp = 0;
                        if(mysqli_num_rows($res_account)){
                            while ($row = mysqli_fetch_assoc($res_account)) {
                                $tennd = $row['TENND'];
                                $gioitinh = $row['GIOITINH'];
                                $sdt = $row['SDT'];
                                $email = $row['EMAIL'];
                                $diachi = $row['DIACHI'];
                                
                ?>
                <form action="" method="POST">
                  <table>
                    <tr>
                      <th>
                        <label for="firstName">Họ tên</label>
                      </th>
                      <td>
                        <input type="text" name="tennd" id="userFistName" value="<?php echo $tennd?>"/>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label for="lastName">Giới tính</label>
                      </th>
                      <td>
                        <input type="radio" name="gioiTinh" id='nam'value="Nam" >
                        <label for="gioiTinh">Nam</label>
                        <input type="radio" name="gioiTinh" id="nu" value="Nữ">
                        <label for="gioiTinh">Nữ</label>
                        <?php if($gioitinh=='Nữ'){?>
                        <script>document.getElementById('nu').checked=true;</script>
                        <?php } if($gioitinh=='Nam'){?>
                        <script>document.getElementById('nam').checked=true;</script>
                        <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label for="email">Email</label>
                      </th>
                      <td>
                        <input type="email" name="email" id="userEmail" value="<?php echo $email?>"/>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label for="sdt">Số điện thoại</label>
                      </th>
                      <td>
                        <input type="tel" name="sdt" id="" value="<?php echo $sdt?>" />
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label for="diaChi">Địa chỉ</label>
                      </th>
                      <td>
                        <input type="text" name="diaChi" id="" value="<?php echo $diachi?>"/>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <button type="submit" name="capnhat_tt">Cập nhật</button>
                      </td>
                    </tr>
                  </table>
                </form>
                <?php } }?>
                <div id="account__img">
                  <img src="./image/laptop.jpg" alt="" />
                  <i class="fa fa-camera"></i>
                </div>
              </div>
            </div>
            <div id="trangThaiDonHang">
              <table id="trangThaiDonHang_tblItem" class="table">
                <thead id="trangThaiDonHang_tblHead">
                  <tr>
                    <th>Hình Ảnh Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số lượng</th>
                    <th>Số Tiền</th>
                  </tr>
                </thead>
                <tbody id="trangThaiDonHang_tblBody">
                  <tr>
                    <td>
                      <a href="#" class="trangThaiDonHang_product">
                        <img src="./image/laptop.jpg" alt="" />
                      </a>
                    </td>
                    <td>
                      <div class="trangThaiDonHang_product--intro">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                      </div>
                    </td>
                    <td>
                      <span>1</span>
                    </td>
                    <td>5.000.000VND</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="lichSuMuaHang">
              <div class="lichSuMuaHang">
                <table id="tblItem" class="table">
                  <thead id="tblHead">
                    <tr>
                      <th>Hình Ảnh Sản Phẩm</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Số lượng</th>
                      <th>Số Tiền</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody id="tblBody">
                    <tr>
                      <td>
                        <a href="#" class="cartItem__product">
                          <img src="./image/laptop.jpg" alt="" />
                        </a>
                      </td>
                      <td>
                        <div class="cartItem__product--intro">
                          <h4>Title</h4>
                          <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                      </td>
                      <td>
                        <span>1</span>
                      </td>
                      <td>5.000.000VND</td>
                      <td>
                        <span>Đã nhận</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div id="doiMatKhau">
              <form action="" id="formDoiMatKhau">
                <table id="tblDoiMatKhau">
                  <tr>
                    <th>
                      <label for="matKhauCu">Mật khẩu cũ:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>
                      <label for="matKhauMoi">Mật khẩu mới:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>
                      <label for="confirmMatKhauMoi"
                        >Nhập lại mật khẩu mới:</label
                      >
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="submit" value="Đổi mật khẩu" />
                    </td>
                  </tr>
                </table>
              </form>
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
      <hr />
      <div class="bottom">
        <p>copyright</p>
      </div>
    </footer>
    <!-- script -->
    <!-- jquery  -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>

    <!-- popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>

    <!-- BS4 -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <!-- active -->
    <script>
      var links = document.querySelectorAll("#setting__menu li");
      links.forEach(function (element) {
        element.addEventListener("click", function (e) {
          e.preventDefault();
          links.forEach(function (element) {
            element.classList.remove("active");
          });
          this.classList.add("active");
        });
      });
      function activeTTTK() {
        $("#myAccount").css("display","block");
        $("#trangThaiDonHang").css("display","none");
        $("#lichSuMuaHang").css("display","none");
        $("#doiMatKhau").css("display","none");
      }
      function activeTTDH() {
        $("#TTDH").addClass("active");
        $("#myAccount").css("display","none");
        $("#trangThaiDonHang").css("display","block");
        $("#lichSuMuaHang").css("display","none");
        $("#doiMatKhau").css("display","none");
      }
      function activeLSMH() {
        $("#LSMH").addClass("active");
        $("#myAccount").css("display","none");
        $("#trangThaiDonHang").css("display","none");
        $("#lichSuMuaHang").css("display","block");
        $("#doiMatKhau").css("display","none");
      }
      function activeDMK() {
        $("#DMK").addClass("active");
        $("#myAccount").css("display","none");
        $("#trangThaiDonHang").css("display","none");
        $("#lichSuMuaHang").css("display","none");
        $("#doiMatKhau").css("display","block");
      }
    </script>
    <!-- MAIN JS -->
    <!-- <script src="./js/main.js"></script> -->
    
  </body>
</html>
