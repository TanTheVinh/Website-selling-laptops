<?php 
    function View_All_Customer(){
        $sql = "SELECT * FROM NGUOIDUNG WHERE MAQUYEN = 'KH'";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $taikhoan = $row['TAIKHOAN'];
                $matkhau = $row['MATKHAU'];
                $gioitinh = $row['GIOITINH'];
                $tennd = $row['TENND'];
                $sdt = $row['SDT'];
                $diachi = $row['DIACHI'];
                $email = $row['EMAIL'];
                $ngaysinh = $row['NGAYSINH'];
            }
        }
        else{
            echo "khong tim duoc khach hang nao";
        }
    }
?>