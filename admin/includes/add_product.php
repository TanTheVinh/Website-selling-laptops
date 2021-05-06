
<div class="form_box">
    <script>
        const check_password = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            if (password == confirm_password) {
                document.getElementById('kiemtramk').style.color = 'green';
                document.getElementById('kiemtramk').innerHTML = 'Trùng khớp';
            } else {
                document.getElementById('kiemtramk').style.color = 'red';
                document.getElementById('kiemtramk').innerHTML = 'Không trùng khớp';
            }
        }

        const check_number_phone = function () {
            let phone = document.getElementById('sdt').value;
            if(!isNaN(phone)){
                document.getElementById('kiemtrasdt').innerHTML = '';
            } else {
                document.getElementById('kiemtrasdt').style.color = 'red';
                document.getElementById('kiemtrasdt').innerHTML = 'Phải là số';
            }
        }

        const Check_all = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            let phone = document.getElementById('sdt').value;
            if(password != confirm_password){
                alert("Mật khẩu và xác nhận mật khẩu bắt buộc phải giống nhau!");
                return false;
            }
            else if(isNaN(phone)){
                alert("Số điện thoại bắt buộc phải là số!");
                return false;
            }
        }
    </script>
    <h2>Thêm Sản phẩm</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form onsubmit="return Check_all()" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Mã sản phẩm:</b></td>
                <td><input type="text" name="masp" id="masp"  required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Mã loại sản phẩm:</b></td>
                <td>
                    <select id="maloaisp" name="maloaisp">
                        <option value="loaisp">chọn loại</option>
                        <?php
                        $sql_all_cat = "SELECT * FROM  LOAISP";
                        $res_all_cat = Check_db($sql_all_cat);
                        while ($row = mysqli_fetch_assoc($res_all_cat)) {
                        $maloaisp = $row['MALOAISP'];
                        echo "<option>$maloaisp</option>";    
                        }       
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td valign="top"><b>Mã giảm giá: </b></td>
                <td>
                    <select id="magiamgia" name="magiamgia">
                        <option value='null'>Không </option>
                        <?php 
                            $sql_all_discount = "SELECT * FROM GIAMGIA";
                            $res_all_discount = Check_db($sql_all_discount);
                            while ($row = mysqli_fetch_array($res_all_discount)) {
                            $magiamgia = $row['MAGIAMGIA'];
                            echo "<option value= '$magiamgia' >$magiamgia</option>";
                            }
                        ?>
                    </select> 
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Mã nhà sản xuất: </b></td>
                <td>
                    <select id="mansx" name="mansx">
                        <option value="masnx"> chọn nhà sản xuất </option>
                        <?php
                            $sql_all_nsx = "SELECT * FROM NHASANXUAT";
                            $res_all_nsx = Check_db($sql_all_nsx);
                            while ($row = mysqli_fetch_array($res_all_nsx)) {
                            $mansx = $row['MANSX'];
                            echo "<option>$mansx<option>";
                            }
                        
                        ?>
                    </select> 
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Tên sản phẩm:</b></td>
                <td><input type="text" name="tensp" id="tensx" size = 60 required/>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Mô tả sản phẩm: </b></td>
                <td><input type="text" name="motasp" id="motasp" size = 60 required/></td>
            </tr>

            <tr>
                <td valign="top"><b>Ram:</b></td>
                <td>
                    <input type="text" name="ram" id="ram" required/>
                </td>
            </tr>

            <tr>
                <td valign="top"><b>Vi xử lý:</b></td>
                <td><input type="text" name="vixuly" id="vixuly" required/></td>
            </tr>
            <tr>
                <td valign="top"><b>Kích thước màn hình:</b></td>
                <td><input type="text" name="kichthuocmh" id="kichthuocmh"></td>
            </tr>

            <tr>
                <td valign="top"><b>Giá:</b></td>
                <td><input type="text" name="gia" id="gia"></td>
            </tr>
            <tr>
                <td valign="top"><b>Số lượng còn:</b></td>
                <td><input type="text" name="soluongcon" id="soluongcon"></td>
            </tr>
            <tr>
                <td valign="top"><b>Ngày sản xuất:</b></td>
                <td><input type="date" name="ngaysx" id="ngaysx"></td>
            </tr>

            <tr>
                <td><b>Hình ảnh: </b></td>
                <td><input type="file" name="files[]"  multiple require /></td>
            </tr>
                            
            <tr>

                <td colspan="13" class="text-center"> 
                    <input type="submit" class="btn-submit" name="themsanpham" value="Thêm Sản Phẩm">
                </td>
            </tr>
            
        </table>
    </form>

</div>
<?php


    function Check_product($masp){
        $sql = "SELECT * FROM SANPHAM WHERE masp = '$masp';";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            return true;
        }
        else{
            return false;
        }
    }
        if (isset($_POST['themsanpham'])){
            $masp = Get_value($_POST["masp"]);
            $maloaisp = Get_value($_POST["maloaisp"]);
            $magiamgia = Get_value($_POST["magiamgia"]);
            $mansx = Get_value($_POST["mansx"]);
            $tensp = Get_value($_POST["tensp"]);
            $motasp = Get_value($_POST["motasp"]);
            $ram = Get_value($_POST["ram"]);
            $vixuly = Get_value($_POST["vixuly"]);
            $kichthuocmh = Get_value($_POST["kichthuocmh"]);
            $gia = Get_value($_POST["gia"]);
            $soluongcon = Get_value($_POST["soluongcon"]);
            $ngaysx = Get_value($_POST["ngaysx"]);
           // $Hinh  = $_FILES['Hinh']['name'];
           // $product_image_tmp = $_FILES['Hinh']['tmp_name'];
           // move_uploaded_file($product_image_tmp, "product_images/$Hinh");

       
            if(!Check_product($masp)){
                if($magiamgia==''){
                    $sql = "INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) 
                    VALUES ('$masp', '$maloaisp','$mansx', '$tensp', '$motasp', '$ram', '$vixuly', '$kichthuocmh', '$gia', '$soluongcon', '$ngaysx');";                     
            }else{
            $sql = "INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) 
            VALUES ('$masp', '$maloaisp', '$magiamgia','$mansx', '$tensp', '$motasp', '$ram', '$vixuly', '$kichthuocmh', '$gia', '$soluongcon', '$ngaysx');";       
                }
                echo $sql;
            $conn = Connect();
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
                $uploads_dir = '/uploads';
                foreach ($_FILES["files"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["files"]["tmp_name"][$key];
                    $name = basename($_FILES["files"]["name"][$key]);
                    move_uploaded_file($tmp_name, "product_images/$name");
                    $sql_hinh = "INSERT INTO HINHANH (masp, link) VALUES ('$masp', '$name');";
                    $conn = Connect();
                   $themhinh= mysqli_query($conn, $sql_hinh);
                    mysqli_close($conn);}
        if($themhinh){
            echo "<script>alert(\"<?php echo $sql_hinh ?>\");</script>";      
        } else {
            echo "<script>alert(\"echo $magiamgia\");</script>"; 

        }
    }   
}
?>