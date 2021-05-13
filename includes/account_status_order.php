<thead id="trangThaiDonHang_tblHead">
                  <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <!--th>HT thanh toán</th-->
                    <th>Địa chỉ nhận</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody id="trangThaiDonHang_tblBody">
                  <?php 
                    $sql_order = "SELECT * FROM `donhang` WHERE TAIKHOAN='$taikhoan' and TRANGTHAI !='đã giao'";
                    $res_order = Check_db($sql_order);
                    if (mysqli_num_rows($res_order)) {
                      while ($row = mysqli_fetch_assoc($res_order)) {
                        $madh=$row['MADH'];
                        $ngaydat=$row['NGAYDAT'];
                        $trangthai=$row['TRANGTHAI'];
                        $httt=$row['HTTHANHTOAN'];
                        $diachi=$row['DIACHINHAN'];
                        $tongtien=$row['TONGTIEN'];
                  ?>
                        <tr>
                          <td><?php echo $madh?></td>
                          <td>
                            <div class="trangThaiDonHang_product--intro">
                              <p><?php echo $ngaydat?></p>
                            </div>
                          </td>
                          <td><?php echo $diachi?></td>
                          <td><?php echo $tongtien?></td>
                          <td><?php echo $trangthai?></td>
                          <td>
                            <a class="btn btn-danger btn-submit btn-sm" style="margin: 0" href="./account.php?action=account_detail_order&madh=<?php echo $madh?>">Chi tiết</a>
                            <a class="btn btn-danger btn-submit btn-sm" style="margin: 0" href="#">Hủy</a>
                          </td>
                        </tr>
                  <?php 
                      }
                    }
                  ?>
                </tbody>