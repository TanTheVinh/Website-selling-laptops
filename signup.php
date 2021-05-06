<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php') ?>

<body>
  <!-- header -->
  <?php include('./includes/header.php') ?>
  <!-- banner -->

  <section class="signup">
    <div class="container">
      <div class="signupCenter" style="width: 40%; margin: 0 auto">
        <h2 style="text-align: center; margin-bottom: 50px">
          Đăng ký tài khoản
        </h2>
        <form method="POST" action="" onsubmit="return DangKy()">
          <table style="padding: 10px; text-align: left">
            <tr>
              <th style="width: 40%">Họ và tên:</th>
              <td style="width: 10%"></td>
              <td style="display: inline-block; width: 40%">
                <input type="text" name="TENND" id="HoTen" />
              </td>
              <td style="width: 20%"></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th style="width: 40%">Tên đăng nhập:</th>
              <td style="width: 10%"></td>
              <td style="display: inline-block; width: 40%">
                <input type="text" name="TAIKHOAN" id="tenDangNhap" />
              </td>
              <td style="width: 20%"></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>Mật khẩu:</th>
              <td></td>
              <td>
                <input type="password" name="MATKHAU" id="matKhau" />
              </td>
              <td></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>Gõ lại mật khẩu:</th>
              <td></td>
              <td>
                <input type="password" id="nhapLaiMatKhau" name="NHAPLAIMK" />
              </td>
              <td></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>Giới tính:</th>
              <td></td>
              <td id="gioiTinh">
                <input type="radio" name="GIOITINH" value="Nam" checked />
                <label for="nam">Nam</label>
                <input type="radio" name="GIOITINH" value="Nữ" />
                <label for="nu">Nữ</label>
              </td>
              <td></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>Email:</th>
              <td></td>
              <td>
                <input type="email" name="EMAIL" id="Email" placeholder="email@email.com" />
              </td>
              <td></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>Số điện thoại:</th>
              <td></td>
              <td>
                <input type="text" name="SDT" id="SDT" placeholder="0123456789" />
              </td>
              <td></td>
            </tr>
            <tr>
              <th style="height: 15px"></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th></th>
              <td></td>
              <td>
                <input type="submit" style="
                      padding: 0 10px;
                      border-radius: 3px;
                      border: 1px solid;
                    " value="Đăng ký" name="btnDangKy">
                <button type="reset" style="
                      padding: 0 10px;
                      border-radius: 3px;
                      border: 1px solid;
                    ">
                  Làm lại
                </button>
              </td>
              <td></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </section>
  <!-- footer -->
  <?php include('./includes/footer.php') ?>
  <!-- script -->
  <?php include('./includes/script.php') ?>
  <!-- jquery  -->
  <!-- MAIN JS -->
  <script src="./FE/js/validation.js"></script>
  <script src="./FE/js/main.js"></script>

  <?php
  require_once('./includes/conn.php');
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TAIKHOAN = $_POST["TAIKHOAN"];
    $MATKHAU = $_POST["MATKHAU"];
    $TENND = ($_POST["TENND"]);
    $NHAPLAIMK = ($_POST["NHAPLAIMK"]);
    $GIOITINH = ($_POST['GIOITINH']);
    $EMAIL = $_POST['EMAIL'];
    $SDT = $_POST['SDT'];
    echo $GIOITINH . "" . $EMAIL . "" . $SDT;
    $conn = Connect();
    $sql1 = "SELECT * FROM nguoidung WHERE TAIKHOAN='$TAIKHOAN'";
    $request = $conn->query($sql1);

    if (mysqli_num_rows($request) > 0) {
      echo "<script>alert('tai khoan da ton tai!')</script>";
      echo "<script>window.open('signup.php','_self')</script>"; 
    } else {
      $MATKHAU = md5($MATKHAU);
      $sql = "INSERT INTO nguoidung(TAIKHOAN,MAQUYEN,MATKHAU,TENND,GIOITINH,SDT,EMAIL) VALUE ('$TAIKHOAN','KH','$MATKHAU','$TENND','$GIOITINH','$SDT','$EMAIL')";
      if ($conn->query($sql) == true) {
        echo "<script>alert('Đăng ký thành công!')</script>";
        echo "<script>window.open('login.php','_self')</script>"; //link toi site dang nhap
      } else {
        echo "error: " . $sql . "<br>" . $conn->error;
      }
    }
    $conn->close();
  }


  ?>
</body>

</html>